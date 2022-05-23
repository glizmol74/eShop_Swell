<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Productos;
use App\Models\Sys\Tienda\Documentos;
use App\Models\Sys\Tienda\Documentos_detalles;
use App\Models\Sys\Tienda\Clientes;
use App\Http\Controllers\Sys\Backend\ProductosAtributosController;

class DocumentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/documentos');
    }

    public function index(Request $request)
    {
        //$doc = array();
        if ( $request->ajax()) {
            
                $doc = Documentos::join('clientes as c', 'c.id', '=', 'doc_cliente')
                            ->select('documentos.id','doc_tipo', 'doc_fecha', 'doc_fecha_entrega','doc_estado', 'doc_cliente', 'doc_subtotal',
                                     'doc_descuento_p', 'doc_descuento_v', 'doc_tax', 'doc_iva', 'doc_total', 'doc_costo_envio',
                                     'doc_observacion', 'doc_total_pago', 'doc_numero_tempo', 'doc_cae', 'doc_fechavtocae',
                                     'doc_barcode', 'doc_numero', 'cli_razon')
                            ->orderby('doc_tipo', 'ASC')
                            ->orderby('doc_fecha', 'DESC' )
                            ->get();
            return $doc;
        } else {
            return view('web.backend.listadodocumentos');
        }
    }

    public function edit($id)
    {
        $detalle = Documentos_detalles::join('productos_atributos as pa', 'pa.id', '=', 'ddt_prod_id')
                                ->leftjoin('productos as p', 'p.id', '=', 'pat_prod' )
                                ->leftjoin('atributos as a', 'a.id', '=', 'pat_attr')
                                ->leftjoin('bibliotecas as b', 'b.id', '=', 'pat_imagen')
                                ->where('ddt_doc_id', '=', $id)
                                ->select('p.id', 'atr_es_name as attr_es_name', 'atr_en_name as attr_en_name', 'ddt_cantidad as cantidad', 'pat_cod_tempo as cod_tempo',
                                         'pro_es_nombre as es_name', 'pro_en_nombre as en_name', 'pa.id as id_attr', 'bib_url as image', 'ddt_tax as tax',
                                         'ddt_precio as precio', )
                                ->get();
        $cliente = Clientes::join('documentos as d', 'doc_cliente', '=', 'clientes.id')
                            ->leftjoin('users as u', 'u.id', 'doc_cliente' )
                            ->leftjoin('localidads as l', 'l.id', '=', 'cli_cod_postal')
                            ->leftjoin('provincias as p', 'p.id', 'cli_provincia')
                            ->select('cli_cuit as cuit', 'cli_razon as razon', 'cli_whatsapp as telefono', 'email as correo',
                                     'cli_direccion as address', 'loc_nombre', 'loc_codigo_postal as postal', 'pro_nombre as provincia')->first();

        $data = array();
        $data['detalle'] = $detalle;
        $data['cliente'] = $cliente;

        return $data;
    }

    public function store(Request $request)
    {
        $data = array();
        $id = $request->id;
        // modificacion de pedido
        if ( $request->sw == 1) {
            if ( $request->tipo == 'PED') {
                if ( $request->estado != 7 ) {
                    $data[1] = 'Se Modifico el Pedido Correctamente';
                } else {
                    $data[1] = 'Se Anuló el Pedido Correctamente';
                }
                $doc = Documentos::where('id', '=', $id)->first();
                if ( $request->campo == 1 ) {
                    $doc->doc_estado = $request->estado;
                } else if ( $request->campo == 2 ) {
                    $doc->doc_numero_tempo = $request->tempo;
                }
                $doc->update();
                $data[0] = 1;
                $data[2] = $this->index($request);
            } else {
                $calcular = 0;
                if ( $request->estado != 2){
                    $data[1] = 'Se Modifico el Documento Correctamente';
                } else {
                    $data[1] = 'Se Anuló el Documento Correctamente';
                }
                $doc = Documentos::where('id', '=', $id)->first();
                if ( $request->campo == 1 ) {
                    if ( $doc->doc_estado == 2 || $request->estado == 2) {
                        $doc->doc_total_pago = $doc->doc_total;
                        $calcular = 1;
                    }
                    $doc->doc_estado = $request->estado;
                } else {
                    $doc->doc_numero_tempo = $request->tempo;
                }
                $doc->update();
                $data[0] = 1;
                $data[2] = $this->index($request);
                if ( $calcular == 1) {
                    $documentos = Documentos::where('doc_tipo', 'like', 'FC%')
                                        ->orwhere('doc_tipo', 'like', 'NC%')
                                        ->where('doc_cliente', '=', $request->cliente)
                                        ->select('id', 'doc_total', 'doc_tipo', 'doc_total_pago')->get();
                }
            }
    
        }
        
        return $data;
    }
}