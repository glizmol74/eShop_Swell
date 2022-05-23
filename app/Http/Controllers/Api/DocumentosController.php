<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Productos;
use App\Models\Sys\Tienda\Documentos;
use App\Models\Sys\Tienda\Documentos_detalles;
use App\Models\Sys\Tienda\Productos_atributos;
use App\Models\Sys\Tienda\Clientes;
use Illuminate\Support\Facades\DB;

class DocumentosController extends Controller
{
    public function consultaProductos(Request $request)
    {
        $productos = Productos_atributos::join('productos as p', 'p.id', '=', 'pat_prod')
                                    ->leftjoin('atributos as a', 'a.id', '=', 'pat_attr')
                                    ->where('pat_cod_tempo', '!=', 'NULL')
                                    ->select('productos_atributos.id as prod_id', 'pro_es_nombre as es_name', 
                                             'atr_es_name',  'pat_cod_tempo as cod_tempo' )->get();
        return response()->json([
            'status' => true,
            'data' => json_encode($productos),
            'message' => 'Ok'
        ]);
    }
    public function consultaDocumentos(Request $request)
    {
        $doc = Documentos::join('clientes as c', 'c.id', '=', 'doc_cliente')
                        ->where('doc_tipo', 'like', 'NC%')
                        ->orwhere('doc_tipo', 'like', 'FC%')
                        ->where('doc_cliente', '=', $request->cliente)
                        ->select('documentos.id', 'doc_tipo', 'doc_numero', 'doc_fecha', 'doc_fecha_entrega', 'doc_estado', 'cli_cod', 'doc_cliente', 'cli_razon',
                                'doc_subtotal', 'doc_descuento_p', 'doc_descuento_v', 'doc_tax', 'doc_iva', 'doc_total', 'doc_costo_envio', 'doc_total_pago',
                                'doc_observacion', 'doc_numero_tempo', 'doc_cae', 'doc_fechavtocae', 'doc_barcode', 'doc_ok')
                        ->orderby('cli_cod', 'ASC')
                        ->orderby('doc_tipo', 'ASC')
                        ->orderby('doc_fecha', 'ASC')->get();
        return response()->json([
            'status' => true,
            'data' => json_encode($doc),
            'message' => 'Ok'
        ]);
        
    }

    public function doc_detalle($id, $items)
    {
        $primero = 0;
        foreach( $items as $key => $value) {
            
            $ddt = Documentos_detalles::where('ddt_doc_id', '=', $id)
                                    ->where('ddt_cod_tempo', '=', $value['cod_tempo'])->first();
            if ( !isset( $ddt->id )) {
                $ddt = new Documentos_detalles();
                $ddt->ddt_doc_id = $id;
                $ddt->ddt_cantidad = $value['cantidad'];
                $ddt->ddt_precio = $value['precio'];
                $ddt->ddt_tax = $value['tax'];
                $ddt->ddt_cod_tempo = $value['cod_tempo'];
                $ddt->ddt_prod_id = $value['prod_id'];
                $ddt->ddt_descripcion = $value['es_name'];
                $ddt->save();
                if ($primero == 0 )
                    $primero = $ddt->id;
            } 
        }
        
        $detalle = Documentos_detalles::where('ddt_doc_id', '=', $id)->where('id', '>=', $primero)->get();
        return $detalle;
    }

    public function detalle_doc(Request $request)
    {
        //return $request;
        $datos = $request->only('id', 'idioma', 'items', 'sw', 'total');

        $items = json_decode($request->items, true);

        $detalle = $this->doc_detalle($request->id, $items);

        $total = Documentos_detalles::where('ddt_doc_id', '=', $request->id)->sum(DB::raw('ddt_precio * ddt_cantidad '));

        $doc = Documentos::where('id', '=', $request->id)->first();
        $dif =  round($request->total,2,PHP_ROUND_HALF_DOWN) - round($total,2,PHP_ROUND_HALF_DOWN);
        if ($dif < 1) {
            $doc->doc_ok = 1;
            $doc->update();
        } else {
            $doc->doc_ok = 0;
            $doc->update();
        }
        
        return response()->json([
            'status' => true,
            'data' => json_encode($detalle),
            'message' => "Ok"
        ]);
    }

    public function documento(Request $request)
    {
        //return $request;
        $datos = $request->only('tipo', 'numero', 'fecha', 'fecha_entrega', 'estado', 'cliente', 'subtotal', 'descuento_p', 'descuento_v', 'tax', 'iva', 'total',
                            'envio', 'pago', 'obs', 'tempo', 'cae', 'vtocae', 'barcode', 'idioma');
        $sw = 0;
        
        
        $doc = Documentos::where('doc_numero_tempo', '=', $request->tempo)
                        ->where('doc_tipo', '=', $request->tipo)->first();
        
        if ( !isset( $doc->id ) ) {
            $numero = Documentos::where('doc_tipo', '=', $request->tipo)->max('doc_numero');
            if ( isset( $numero ) )
                $numero+= 1;
            else
                $numero = 1;
            $doc = new Documentos();
            $doc->doc_tipo = $request->tipo;
            $doc->doc_numero = $numero;
            $doc->doc_fecha = $request->fecha;
            $doc->doc_fecha_entrega = $request->fecha_entrega;
            $doc->doc_estado = $request->estado;
            $doc->doc_cliente = $request->cliente;
            $doc->doc_subtotal = $request->subtotal;
            $doc->doc_descuento_p = $request->descuento_p;
            $doc->doc_descuento_v = $request->descuento_v;
            $doc->doc_tax = $request->tax;
            $doc->doc_iva = $request->iva;
            $doc->doc_total = $request->total;
            $doc->doc_costo_envio = $request->envio;
            $doc->doc_total_pago = $request->pago;
            $doc->doc_observacion = $request->obs;
            $doc->doc_numero_tempo = $request->tempo;
            $doc->doc_cae = $request->cae;
            $doc->doc_fechavtocae = $request->vtocae;
            $doc->doc_barcode = $request->barcode;
            $doc->save();
        } else {
            $doc->doc_fecha = $request->fecha;
            $doc->doc_fecha_entrega = $request->fecha_entrega;
            $doc->doc_estado = $request->estado;
            $doc->doc_cliente = $request->cliente;
            $doc->doc_subtotal = $request->subtotal;
            $doc->doc_descuento_p = $request->descuento_p;
            $doc->doc_descuento_v = $request->descuento_v;
            $doc->doc_tax = $request->tax;
            $doc->doc_iva = $request->iva;
            $doc->doc_total = $request->total;
            $doc->doc_costo_envio = $request->envio;
            $doc->doc_total_pago = $request->pago;
            $doc->doc_observacion = $request->obs;
            $doc->doc_numero_tempo = $request->tempo;
            $doc->doc_cae = $request->cae;
            $doc->doc_fechavtocae = $request->vtocae;
            $doc->doc_barcode = $request->barcode;
            $doc->update();
            $sw = 1;
        }
        
        return response()->json([
            'status' => true,
            'data' => json_encode($doc),
            'message' => "Ok"
        ]);
    }

    
}
