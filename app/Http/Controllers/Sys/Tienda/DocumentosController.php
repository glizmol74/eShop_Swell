<?php

namespace App\Http\Controllers\Sys\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Sys\Tienda\Documentos;
use App\Models\Sys\Tienda\Documentos_detalles;
use App\Models\Sys\Tienda\Clientes;
use App\Models\Sys\Tienda\Empresas;
use App\Mail\EmailPedido;
use App\Mail\EmailPedidoSwell;


class DocumentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:cliente/documentos');
    }

    public function index(Request $request)
    {
        $doc = array();
        if ( $request->ajax()) {
            if ( isset( $request->cliente) )
                $doc = Documentos::where('doc_cliente', '=', $request->cliente)
                            ->select('id','doc_tipo', 'doc_fecha', 'doc_fecha_entrega','doc_estado', 'doc_cliente', 'doc_subtotal',
                                     'doc_descuento_p', 'doc_descuento_v', 'doc_tax', 'doc_iva', 'doc_total', 'doc_costo_envio',
                                     'doc_observacion', 'doc_total_pago', 'doc_numero_tempo', 'doc_cae', 'doc_fechavtocae',
                                     'doc_barcode', 'doc_numero')
                            ->orderby('doc_tipo', 'ASC')
                            ->orderby('doc_fecha', 'DESC' )
                            ->get();
            return $doc;
        } else {
            return view('web.documento');
        }
    }

    public function show($id)
    {
        $doc = Documentos::where('doc_cliente', '=', $id)
                            ->select('id','doc_tipo', 'doc_fecha', 'doc_fecha_entrega','doc_estado', 'doc_cliente', 'doc_subtotal',
                                    'doc_descuento_p', 'doc_descuento_v', 'doc_tax', 'doc_iva', 'doc_total', 'doc_costo_envio',
                                    'doc_observacion', 'doc_total_pago', 'doc_numero_tempo', 'doc_cae', 'doc_fechavtocae',
                                    'doc_barcode', 'doc_numero')
                            ->orderby('doc_tipo', 'ASC')
                            ->orderby('doc_fecha', 'DESC' )
                            ->get();
        return $doc;
    }

    public function store(Request $request)
    {
        $data = array();
        $id = $request->id;
        $message = array();
        $tipo = 0;
        $data[0] = 0;
        $data[1] = $id;
        $data[2] = $request->idioma;
        //return $data;

        $cliente = Clientes::where('clientes.id','=',$request->cliente)
                        ->join('users as u', 'u.id', '=', 'cli_user')
                        ->select('email', 'cli_razon', 'cli_cuit', 'cli_cod')
                        ->first();
        if ( $id == 'new') {
            $numero = Documentos::where('doc_tipo','=',  $request->tipo)->max('doc_numero');
            if ( isset($numero) )
                $numero+=1;
            else
                $numero = 1;
            $doc = new Documentos();
            $doc->doc_tipo = $request->tipo ; 
            $doc->doc_numero = $numero;
            $doc->doc_fecha = NOW();
            $doc->doc_estado = 0;
            $doc->doc_total_pago =0;
            $doc->doc_cliente = $request->cliente;
            
            $data[1] = 'Se Agregó el Pedido Correctamente';
            if ( $request->idioma == 'es') {
                $message[0][0] = 'Nuevo Pedido desde el sitio WEB...';
                $message[0][2] = 'Hemos recibido un nuevo pedido a su nombre...';

                $message[1][0] = 'Nuevo Pedido desde el sitio WEB...';
                $message[1][2] = 'Hemos recibido un nuevo pedido del Cliente: ';
            } else {
                $message[0][0] = 'New Order from the WEB site ...';
                $message[0][2] = 'we have receives an order in you name...';

                $message[1][0] = 'Nuevo Pedido desde el sitio WEB...';
                $message[1][2] = 'Hemos recibido un nuevo pedido del Cliente: ';
            }
        } else {
            $doc = Documentos::where('doc_tipo', '=', $request->tipo)
                            ->where('id', '=', $id)
                            ->first();
            $doc->doc_estado = $request->estado;
            $tipo = 1;
            if ($request->estado != 7)
                $data[1] = 'Se Modificó el Pedido Correctamente';
            else
                $data[1] = 'Se Anulo el Pedido Correctamente';
            if ( $request->idioma == 'es') {
                if ($request->estado != 7) {
                    $message[0][0] = 'Modificación de Pedido';
                    $message[0][2] = 'Hemos recibido la modificación del pedido a su nombre...';

                    $message[1][0] = 'Modificación de Pedido';
                    $message[1][2] = 'Hemos recibido la modificación del pedido del Cliente: ';
                } else {
                    $message[0][0] = 'Anulación de Pedido';
                    $message[0][2] = 'Hemos recibido la Anulación del pedido a su nombre...';

                    $message[1][0] = 'Anulación de Pedido';
                    $message[1][2] = 'Hemos recibido la Anulación del pedido del Cliente: ';
                }
            } else {
                if ($request->estado != 7) {
                    $message[0][0] = 'Order Modification';
                    $message[0][2] = 'We have received the modification of the order in your name ...';

                    $message[1][0] = 'Modificación de Pedido';
                    $message[1][2] = 'Hemos recibido la modificación del pedido del Cliente: ';
                } else {
                    $message[0][0] = 'Cancel Order';
                    $message[0][2] = 'We have received the cancellatio of the order in your name';

                    $message[1][0] = 'Anulación de Pedido';
                    $message[1][2] = 'Hemos recibido la Anulación del pedido del Cliente: ';
                }
            }
        }
        $doc->doc_fecha_entrega =  $request->entrega;
        $doc->doc_subtotal = $request->subtotal;
        $doc->doc_cliente = $request->cliente;
        $doc->doc_descuento_p = $request->descuento_p;
        $doc->doc_descuento_v = $request->descuento_v;
        $doc->doc_iva = $request->iva;
        $doc->doc_tax = $request->tax;
        $doc->doc_total = $request->total;
        $doc->doc_costo_envio = $request->costo_envio;
        $doc->doc_observacion = $request->obsv;
        $doc->doc_ok = 1;
        $doc->save();

        if ( $request->idioma == 'es') {
            $message[0][1] = 'Hola ';
            $message[0][3] = '';
            $message[0][4] = '';
            $message[0][5] = '';
            $message[0][6] = 'Su número de pedido es  ';
            $message[0][7] = 'Código';
            $message[0][8] = 'Descripción';
            $message[0][9] = 'Cantidad';
            $message[0][10] = 'Unitario';
            $message[0][11] = 'Importe';
            $message[0][12] = 'IVA';
            $message[0][13] = 'Final';
            $message[0][14] = 'Para acceder al panel de cliente, y ver un mayor detalle, presione el botón ';
            $message[0][15] = 'INGRESAR';
            $message[0][16] = 'Gracias por Preferirnos';
            $message[0][17] = 'Visite nuestro sitio web y encuentra todas las ofertas que tenemos para usted.';
            $message[0][18] = 'VISITAR Sitio';
            $message[0][19] = 'No dejes de seguirnos en las redes sociales..';

            $message[1][1] = 'Hola ';
            $message[1][3] = 'Código Tempo : ';
            $message[1][4] = 'Nombre ó Razón Social: ';
            $message[1][5] = 'Cuit: ';
            $message[1][6] = 'El número de pedido WEB es ';
            $message[1][7] = 'Código';
            $message[1][8] = 'Descripción';
            $message[1][9] = 'Cantidad';
            $message[1][10] = 'Unitario';
            $message[1][11] = 'Importe';
            $message[1][12] = 'IVA';
            $message[1][13] = 'Precio Final';
            $message[1][14] = 'Para acceder al panel de cliente, y ver un mayor detalle, presione el botón ';
            $message[1][15] = 'INGRESAR';
            $message[1][16] = 'Gracias por Preferirnos';
            $message[1][17] = 'Visite nuestro sitio web y encuentra todas las ofernas que tenemos para usted.';
            $message[1][18] = 'VISITAR Sitio';
            $message[1][19] = 'No dejes de seguirnos en las redes sociales..';
        } else {
            $message[0][1] = 'Hello ';
            $message[0][3] = '';
            $message[0][4] = '';
            $message[0][5] = '';
            $message[0][6] = 'Your order number is : ';
            $message[0][7] = 'Code';
            $message[0][8] = 'Description';
            $message[0][9] = 'quantilies';
            $message[0][10] = 'Unitary';
            $message[0][11] = 'Amount';
            $message[0][12] = 'IVA';
            $message[0][13] = 'Final Price';
            $message[0][14] = 'To access the customer panel, and see more detail, press the button';
            $message[0][15] = 'Pay in';
            $message[0][16] = 'Thanks for choosing us';
            $message[0][17] = 'Visit our website and find all the offers we have for you.';
            $message[0][18] = 'Visit website';
            $message[0][19] = 'Do not stop following us on social networks ..';

            $message[1][1] = 'Hola ';
            $message[1][3] = 'Código Tempo : ';
            $message[1][4] = 'Nombre ó Razón Social: ';
            $message[1][5] = 'Cuit: ';
            $message[1][6] = 'su número de pedido es : ';
            $message[1][7] = 'Código';
            $message[1][8] = 'Descripción';
            $message[1][9] = 'Cantidad';
            $message[1][10] = 'Unitario';
            $message[1][11] = 'Importe';
            $message[1][12] = 'IVA';
            $message[1][13] = 'Final';
            $message[1][14] = 'Para acceder al panel de cliente, y ver un mayor detalle, presione el botón ';
            $message[1][15] = 'INGRESAR';
            $message[1][16] = 'Gracias por Preferirnos';
            $message[1][17] = 'Visite nuestro sitio web y encuentra todas las ofertas que tenemos para usted.';
            $message[1][18] = 'VISITAR Sitio';
            $message[1][19] = 'No dejes de seguirnos en las redes sociales..';
        }
        
        $documento = array();
        if ( $request->estado != 7)
            $detalle = $this->detalle_documento($doc->id, $request->items, $tipo, $request->idioma);
        else
            $detalle = Documentos_detalles::where('ddt_doc_id', '=', $doc->id)->get();
        $documento['cliente']=$cliente;
        $documento['cabecera'] = $doc;
        $documento['detalle'] = $detalle;
        $documento['msg'] = $message;
        $data[0] = 1;
        $data[2] = $documento;
        $data[3] = $this->index($request);

        $emp = Empresas::select('emp_ventas as destinatario')->first();
        Mail::to($emp->destinatario)->send( new EmailPedidoSwell($documento));
        Mail::to($request->destinatario)->send( new EmailPedido($documento));
        
        return $data;
    }

    public function detalle_documento($pedido, $items, $tipo, $lang)
    {
        if ($tipo == 0 ) {
            foreach ($items as $key => $value) {
                
                $ddt = new Documentos_detalles();
                $ddt->ddt_doc_id = $pedido;
                $ddt->ddt_prod_id = $value['id_attr'];
                $ddt->ddt_cantidad = $value['cantidad'];
                $ddt->ddt_precio = $value['precio'];
                $ddt->ddt_tax = $value['tax'];
                if ($lang == 'es')
                    $ddt->ddt_descripcion = $value['es_name'] . ' X ' . $value['attr_es_name'];
                else
                    $ddt->ddt_descripcion = $value['en_name'] . ' X ' . $value['attr_en_name'];
                $ddt->ddt_cod_tempo = $value['cod_tempo'];
                $ddt->save();
            }
        } else {
            $olditems = Documentos_detalles::where('ddt_doc_id', '=',  $pedido)
                                    ->select('id', 'ddt_prod_id')
                                    ->get();
            foreach ( $olditems as $key => $value ) {
               $y = $this->buscarDetalle($value, $items);
               if ( $y >= 0) {
                   $items[$y]['st'] = 1;
                   $items[$y]['dd'] = $value['id'];
               } else {
                   $detalle = Documentos_detalles::find($value['id']);
                   $detalle->delete();
               }
            }

            foreach( $items as $key => $v ) {
                if ( $v['st'] == 0 ) {
                    $ddt = new Documentos_detalles();
                    $ddt->ddt_doc_id = $pedido;
                    $ddt->ddt_prod_id = $v['id_attr'];
                } else {
                    $ddt = Documentos_detalles::find($v['dd']);
                }
                $ddt->ddt_cantidad = $v['cantidad'];
                $ddt->ddt_precio = $v['precio'];
                $ddt->ddt_tax = $v['tax'];
                $ddt->ddt_cod_tempo = $v['cod_tempo'];
                if ($lang == 'es')
                    $ddt->ddt_descripcion = $v['es_name'] . ' X ' . $v['attr_es_name'];
                else
                    $ddt->ddt_descripcion = $v['en_name'] . ' X ' . $v['attr_en_name'];
                $ddt->save();
            }
        }
        $detalle = Documentos_detalles::where('ddt_doc_id', '=', $pedido)->get();
        return $detalle;
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
        return $detalle;
    }

    public function buscarDetalle($key, $data)
    {
        $x = 0;
        foreach ( $data as $k => $v ) {
            if ( $key['ddt_prod_id'] == $v['id_attr'] )
                return $x;
            $x++;
        }
        return -1;
    }

    public function checkout() {
        return view('web.clientes.checkout');
    }
}