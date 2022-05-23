<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Backend\Perfiles;
use App\Models\Sys\Tienda\Clientes;

class PerfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/perfiles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) {
            $attr = Perfiles::all();
            return $attr;
        } else {
            return view('web.backend.perfiles');
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
        $data = array();
        $id = $request->id;
        // Nuevo Perfil o Modificación
        if ( $request->sw == 0) {
            $val = Perfiles::where('per_nombre', '=', $request->nombre)->first();
            if ( isset( $val->id ) ) {
                if ( $val->id != $id) {
                    $data[0] = 0;
                    $data[1] = 'El Nombre ya esta registrada en otro Perfil';
                    return $data;
                }
            } else {
                $val = Perfiles::where('per_descripcion', '=', $request->descripcion)->first();
                if ( isset( $val->id )) {
                    if ( $val->id !=  $id  ) {
                        $data[0] = 0;
                        $data[1] = 'La descripción ya esta registrada en otro Perfil';
                        return $data;
                    }
                }
            }

            if ( $id === 'new' )
                $perf = new Perfiles();
            else {
                $perf = Perfiles::where('id','=', $id)->first();
            }
            $perf->per_nombre = $request->nombre;
            $perf->per_descripcion = $request->descripcion;
            $perf->per_add = auth()->id();
            $perf->save();
            $data[0] = 1;
            if ($id == 'new')
                $data[1] = 'Se Agregó el Perfil Correctamente';
            else
                $data[1] = 'Se modifico el Perfil Correctamente';
            $data[2] = $this->index($request);
        } else if ( $request->sw == 3) {
            $val = Clientes::where('cli_tipo','=', $id)->count();
            if ($val >= 1) {
                $data[0] = 0;
                $data[1] = 'No se puede eliminar el Perfil, Tiene Asignado el Perfil en Algún Cliente';
                return $data;
            } else {
                $perf = Perfiles::find($id);
                $perf->delete();
                $data[0] = 1;
                $data[1] = 'Se Eliminó Correctamente el Perfil';
                $data[2] = $perf->id;
            }
        }

        return $data;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //        
    }
}
