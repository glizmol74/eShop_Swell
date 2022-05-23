<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Productos;
use App\Models\Sys\Tienda\Documentos;
use App\Models\Sys\Tienda\Documentos_detalles;
use App\Models\Sys\Tienda\Productos_atributos;
use App\Models\Sys\Tienda\Clientes;

class PreciosController extends Controller
{
    public function ConsultaProductos(Request $request)
    {
        $doc = Productos_atributos::where('pat_cod_tempo', '!=', '')
                        ->select('id', 'pat_cod_tempo', 'pat_precio_usr', 'pat_precio_emp', 'pat_precio_esp', 'pat_precio_dst')
                        ->orderby('pat_cod_tempo', 'ASC')
                        ->get();
        return response()->json([
            'data' => json_encode($doc),
            'status' => true,
            'message' => 'Ok'
        ]);
    }
    public function PrecioProducto(Request $request)
    {
        $datos = $request->only('cod', 'precio_usr', 'precio_emp', 'precio_esp', 'precio_dst');
        $sw = 0;
        
        $pro = Productos_atributos::where('pat_cod_tempo', '=', $request->cod)
                        ->first();
        
        if ( !isset( $pro->id ) ) {
            return response()->json([
                "status" => false,
                "data" => null,
                "message" => "Producto No Existe"
            ]);
            
        } else {
            $pro->pat_precio_usr = $request->precio_usr;
            $pro->pat_precio_emp = $request->precio_emp;
            $pro->pat_precio_esp = $request->precio_esp;
            $pro->pat_precio_dst = $request->precio_dst;
            $pro->update();
            $sw = 1;
        }
        
        
        return response()->json([
            "status" => true,
            "data" => json_encode($pro),
            "message" => "Ok"
        ]);
    }


}
