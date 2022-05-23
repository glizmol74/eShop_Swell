<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Sys\Tienda\Clientes;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/usuarios');
    }

    public function index()
    {
        return view('web.backend.usuarios');
    }

    public function data()
    {
        $cliente = Clientes::leftjoin('users as u', 'u.id', 'cli_user')
                            ->leftjoin('perfiles as p', 'p.id', '=', 'clientes.cli_tipo')
                            ->select('u.id as usr_id',
                                    'clientes.id as cli_id',
                                    'cli_cod as cod_tempo',
                                    'cli_razon as razonsocial',
                                    'cli_cuit as dni',
                                    'cli_direccion as direccion',
                                    'cli_telefono as telefono',
                                    'cli_whatsapp as whatsapp',
                                    'cli_saldo as saldo',
                                    'cli_tipo as perfil',
                                    'per_descripcion as per_descripcion',
                                    'cli_cod_postal as localidad',
                                    'cli_pais as pais',
                                    'cli_provincia as provincia',
                                    'cli_estado as estado',
                                    'email as correo'
                            )->get(); 
        return $cliente;
    }

 
    public function store(Request $request)
    {
        //
    }

    public function editPassword(Request $request)
    { 
        $password = Hash::make($request->password);
        $usuario = User::find($request->id);
        $usuario->password = $password;
        $usuario->save();

        if ( $request->check )
            $correo = 'Envio de Correo';
        else
            $correo = 'No Envio Correo';

        return $correo;
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
        /* $valiData = $request->validate([
            'cli_razon' => 'required|string|min:2|max:50',
            'cli_cuit' => 'required|numeric|max:999999999999999',
            'cli_direccion' => 'required|string|max:191',
            'cli_telefono' => 'required|numeric|max:999999999999999',
            'cli_whatsapp' => 'numeric|max:999999999999999',
            'email' => ['email', 'required', Rule::unique('users')->ignore($request->email)],
            'cli_password' => 'required|string|min:8',
        ]);   */

        $data = array();

        $user = User::find(auth()->id())->id;
        $correo = User::find(auth()->id())->email;

        $form = Clientes::where('cli_user', '=', $user)->first();

        

        if ( $form->id != $id) {
            $data[0]=0;
            $data[1]="Error General";
            return $data;
        }

        if ( $form->cli_cuit != $request->dni ) {
            $dni = Clientes::where('cli_cuit', '=', $request->dni)->count();
            if ( $dni == 1) {
                $data[0] = 0;
                $data[1] = "DNI o CUIT Registrado en otro USUARIO";
                return $data;
            }
        }

        if ( $correo != $request->correo ) {
            $correo = User::where('email', '=', $request->correo )->count();
            if ( $correo == 1 ) {
                $data[0] = 0;
                $data[1] = "Correo ya Registrado en otro Usuario";
                return $data;
            }
        }

        $form->cli_razon = $request->razonsocial;
        $form->cli_cuit = $request->dni;
        $form->cli_direccion = $request->direccion;
        $form->cli_telefono = $request->telefono;
        $form->cli_whatsapp = $request->whatsapp;
        $form->cli_cod_postal = $request->cod_postal;
        $form->cli_pais = $request->pais;
        $form->cli_provincia = $request->provincia;
        $form->update();


        $user = User::where('id','=', $request->usr_id)->first();
        $user->name = $request->razonsocial;
        $user->email = $request->correo;
        $user->update();

        $data[0] = 1;
        $data[1]="Registro Satifactorio";
        $data[2] = $this->data();
        return $data;
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
