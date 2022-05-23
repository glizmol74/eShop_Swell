<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Atributos;
use App\Models\Sys\Tienda\Productos_atributos;

class AtributosController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/atributos');
    }

    public function index(Request $request)
    {
        if ( $request->ajax() ) {
            $attr = Atributos::all();
            return $attr;
        } else {
            return view('web.backend.atributos');
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $data = array();

        if ( $request->sw == 0 ) {
            $val = Atributos::where('atr_es_name', '=', $request->es_name)->first();
            if ( isset( $val->id ) ) {
                if ( $val->id != $id) {
                    $data[0] = 0;
                    $data[1] = 'La descripción en Español ya esta registrada en otro Atributo';
                    return $data;
                }
            } else {
                $val = Atributos::where('atr_en_name', '=', $request->en_name)->first();
                if ( isset( $val->id )) {
                    if ( $val->id !=  $id  ) {
                        $data[0] = 0;
                        $data[1] = 'La descripción en Ingles ya esta registrada en otro Atributo';
                        return $data;
                    }
                }
            }

            if ( $id === 'new' )
                $attr = new Atributos();
            else {
                $attr = Atributos::where('id','=', $id)->first();
            }
            $attr->atr_es_name = $request->es_name;
            $attr->atr_en_name = $request->en_name;
            $attr->atr_tipo = $request->tipo;
            $attr->atr_add = auth()->id();
            $attr->save();
            $data[0] = 1;
            if ($id == 'new')
                $data[1] = 'Se Agregó el Atributo Correctamente';
            else
                $data[1] = 'Se modifico el Atributo Correctamente';
            $data[2] = $this->index($request);
            return $data;
        // Elimina un Atributo
        } else if ( $request->sw == 3) {

            $val = Productos_atributos::where('pat_attr','=', $id)->count();
            if ($val >= 1) {
                $data[0] = 0;
                $data[1] = 'No se puede eliminar el Atributo Tiene Atributo Asignado en Productos';
                return $data;
            } else {
                $attr = Atributos::find($id);
                $attr->delete();
                $data[0] = 1;
                $data[1] = 'Se Eliminó Correctamente el Atributo';
                $data[2] = $attr->id;
                return $data;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
