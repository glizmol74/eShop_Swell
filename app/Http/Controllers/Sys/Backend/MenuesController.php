<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Backend\Menues;
use App\Models\Sys\Backend\Roles;

class MenuesController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/menues');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = array();
        if ( $request->ajax() ) {
            $data['data'] = Menues::select('id', 'men_nombre', 'men_descripcion', 'men_icono', 'men_level', 'men_link',
                                   'men_es_menu')
                        ->get();
            $data['padre'] = Menues::select('id', 'men_nombre', 'men_es_menu')
                        ->where('men_es_menu', '=', 0)
                        ->get();
            return $data;
        } else {
            return view('web.backend.menues');
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

        //Nuevo o Midificacion
        if ($request->sw == 0 ) {
            $val = Menues::where('men_nombre', '=', $request->nombre)
                    ->first();
            if ( isset( $val->id ) ) {
                if ( $val->id != $id) {
                    $data[0] = 0;
                    $data[1] = 'El Nombre del Menu Ya esta Registrado';
                    return $data;
                }
            }

            if ( $id === 'new' )
                $menu = new Menues();
            else
                $menu = Menues::find($id);
            $menu->men_nombre = $request->nombre;
            $menu->men_descripcion = $request->descripcion;
            $menu->men_link = $request->link;
            $menu->men_icono = $request->icono;
            $menu->men_level = $request->level;
            $menu->men_es_menu = $request->esmenu;
            $menu->men_add = auth()->id();
            $menu->save();

            $data[0] = 1;
            if ( $request->id == 'new')
                $data[1] = 'Se Agregó el Menues Correctamnete';
            else
                $data[1] = 'Se Modifico el Menues Correctamente';
            $data[2] = $this->index($request);
        // Eliminar Menues
        } else if ( $request->sw == 3) {
            $rol = Roles::where('rol_menu', '=', $id)->count();
            if ( $rol >= 1) {
                $data[0] = 0;
                $data[1] = 'No se puede eliminar el Menues Tiene Asignado Algún Rol';
                return $data;
            }
            $menu = Menues::find($id);
            $menu->delete();
            
            $data[0] = 1;
            $data[1] = 'Se Eliminó Correctamente el Menues';
            $data[2] = $menu->id;
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
