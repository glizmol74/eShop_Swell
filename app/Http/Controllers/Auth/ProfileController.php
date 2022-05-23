<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Sys\Tienda\Clientes;
use App\Models\Sys\Backend\Roles;
use App\Models\Sys\Backend\Menues;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('web.cliente');
    }

    public function data(Request $request)
    {
        return  User::leftJoin('clientes as c', 'users.id', '=', 'c.cli_user')
                        ->leftJoin('perfiles as p', 'p.id', '=', 'c.cli_tipo')
                        ->select('users.id as id', 'users.name', 'users.email', 'c.cli_tipo', 'c.cli_estado', 
                                 'per_descripcion as perfil', 'email_verified_at as email_ok', 'cli_whatsapp as celular',
                                 'cli_cuit', 'cli_direccion')
                        ->where('users.id', '=', auth()->id())->first();                        
    }

    public function menus(Request $request)
    {
        $roles = '';

        $usuario = User::leftJoin('clientes as c', 'users.id', '=', 'c.cli_user')
                        ->leftJoin('perfiles as p', 'p.id', '=', 'c.cli_tipo')
                        ->select('users.id as id', 'users.name', 'users.email', 'c.cli_tipo', 'c.cli_estado',
                                 'per_descripcion as perfil', 'email_verified_at as email_ok', 'cli_whatsapp as celular',
                                 'cli_cuit', 'cli_direccion')
                        ->where('users.id', '=', auth()->id())
                        ->first();

        $roles = Roles::join('menues as m', 'm.id', '=', 'roles.rol_menu')
                        ->select('m.*', 'rol_menu')
                        ->where('men_es_menu', '=', 1)
                        ->where('rol_perfil', '=', $usuario->cli_tipo)
                        ->get(); 

        $cabecera = Roles::join('menues as m', 'm.id', '=', 'rol_menu')
                        ->join('menues as n', 'm.men_level', '=', 'n.id')
                        ->select('n.id', 'n.men_nombre')
                        ->distinct('n.id')
                        ->where('n.men_es_menu', '=', 0)
                        ->where('roles.rol_perfil', '=', $usuario->cli_tipo)
                        ->get();

        

        $resultado = array ('cabecera' => $cabecera, 'contenido' => $roles, 'usuario'=> $usuario);
        return $resultado;
    }

    public function edit($id) 
    {
        $user = User::where('id', '=', auth()->id() )->first();
        if ( isset( $user->id) ) {
            $user->email_verified_at = now();
            $user->save();
        }
    }
}