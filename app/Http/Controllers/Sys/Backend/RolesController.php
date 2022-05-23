<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Backend\Roles;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/roles');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ( $request->ajax() ) {
            $data = Roles::join('perfiles as p', 'rol_perfil', '=', 'p.id')
                        ->join('menues as m', 'rol_menu', '=', 'm.id')
                        ->select('roles.id','rol_perfil', 'rol_menu', 'per_nombre', 'men_nombre')
                        ->get();
            return $data;
        } else {
            return view('web.backend.roles');
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
        if ( $request->sw == 0 ) {
            $val = Roles::where('rol_perfil', '=', $request->perfil)
                    ->where('rol_menu', '=', $request->menu)
                    ->first();
            if ( isset( $val->id ) ) {
                if ( $val->id != $id) {
                    $data[0] = 0;
                    $data[1] = 'El Punto del Menu Ya esta Asignado para este Perfil';
                    return $data;
                }
            }

            if ( $id === 'new' )
                $rol = new Roles();
            else
                $rol = Roles::find($id);
            $rol->rol_perfil = $request->perfil;
            $rol->rol_menu = $request->menu;
            $rol->rol_add = auth()->id();
            $rol->save();

            $data[0] = 1;
            if ( $request->id == 'new')
                $data[1] = 'Se Agregó el Rol al Perfil Correctamnete';
            else
                $data[1] = 'Se Modifico el Rol al Perfil Correctamente';
            $data[2] = $this->index($request);
        } else if ( $request->sw == 3) {
            $rol = Roles::find( $id );
            if ( isset($rol->id)) {
                $rol->delete();
                $data[0] = 1;
                $data[1] = 'Se Eliminó el Rol al Perfil Correctamente';
                $data[2] = $rol->id;
                return $data;
            } else {
                $data[0] = 0;
                $data[1] = 'Rol no Encontrada para eliminar';
                return $data;
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
