<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Productos;
use App\Models\Sys\Tienda\Productos_atributos;
use PhpParser\Node\Stmt\Return_;

class ProductosAtributosController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/productos');

    }
    public function data( $id )
    {
        $attr = Productos_atributos::join('atributos as a', 'pat_attr','=', 'a.id')
                        ->leftjoin('bibliotecas as b', 'b.id', '=','pat_imagen')
                        ->where('pat_prod', '=', $id)
                        ->select('productos_atributos.id', 'pat_prod', 'pat_attr', 'atr_es_name', 'pat_imagen', 'bib_url',
                                 'pat_precio_usr', 'pat_precio_emp', 'pat_precio_esp', 'pat_precio_dst', 'pat_cod_tempo',
                                 'pat_estado', 'pat_orden')
                        ->orderBy('pat_orden', 'ASC')
                        ->get();
        return $attr;
    }

    public function store(Request $request)
    {
        $data = array();
        $id = $request->id;
        if ( $request->sw == 0 ) {
            if ( $request->dst == null ) $request->dst = 0;
            if ( $request->esp == null ) $request->esp = 0;
            if ( $request->emp == null ) $request->emp = 0;
            if ( $request->usr == null ) $request->usr = 0;

            $attr = Productos_atributos::where('pat_prod', '=', $request->prod)
                                ->where('pat_attr', '=', $request->id_attr)
                                ->first();
            if ( !isset($attr->id) )
                $attr = new Productos_atributos();
            $attr->pat_prod = $request->prod;
            $attr->pat_attr = $request->id_attr;
            $attr->pat_imagen = $request->imagen;
            $attr->pat_precio_dst = $request->dst;
            $attr->pat_precio_esp = $request->esp;
            $attr->pat_precio_emp = $request->emp;
            $attr->pat_precio_usr = $request->usr;
            $attr->pat_cod_tempo = $request->tempo;
            $attr->pat_estado = $request->estado;
            $attr->pat_orden = $request->orden;
            $attr->pat_add = auth()->id();
            $attr->save();
            $data[0] = 1;
            if ( $request->id == 0) {
                $data[1] = 'Se Agregó el Atributo a el Producto Correctamente';
            } else {
                $data[1] = 'Se Modifico el Atributo del Producto Correctamente';
            }
            $data[2] = $this->data($request->prod);
        } else if ( $request->sw == 1) {
            $attr = Productos_atributos::find($id);
            if ( !isset($attr->id)) {
                $data[0] = 0;
                $data[1] = 'Atributo no Encontrado';
                return $data;
            } else {
                if ( $attr->pat_estado == 1)
                    $attr->pat_estado = 0;
                else
                    $attr->pat_estado = 1;
                $attr->pat_add = auth()->id();
                $attr->update();
                $data[0] = 1;
                $data[1] = 'Se Cambio es Estado Correctamente';
                $data[2] = $this->data($attr->pat_prod);
            }
        } else if ( $request->sw == 3) {
            $attr = Productos_atributos::find($id);
            if ( !isset($attr->id)) {
                $data[0] = 0;
                $data[1] = 'Atributo no Encontrado';
                return $data;
            } else {
                $attr->delete();
                $data[1] = 'Se Elimino el Atributo a el Producto Correctamente';
                $data[2] = $this->data( $request->prod);
            }
        }
        return $data;
    }

    public function update(Request $request, $id)
    {
        //        
    }

    public function destroy($id)
    {
        //
    }
}