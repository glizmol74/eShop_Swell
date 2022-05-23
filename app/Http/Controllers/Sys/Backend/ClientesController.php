<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use App\Models\User;
use App\Models\Sys\Tienda\Clientes;
use App\Models\Sys\Backend\Perfiles;
use App\Models\Sys\Tienda\Documentos;
use Illuminate\Support\Str;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/clientes');
    }

    public function index()
    {
        return view('web.backend.clientes');
    }

    public function data()
    {
        $data = array();
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
        $perfiles = Perfiles::select('id', 'per_descripcion as text')->get();
        $data['usuarios'] = $cliente;
        $data['perfiles'] = $perfiles;
        return $data;
    }

 
    public function store(Request $request)
    {
        $data = array();
        $id = $request->id;
        // Cliente Nuevo
        if ( $request->sw == 0) {
            $form = Clientes::where('cli_cuit', '=', $request->dni)->first();
            if ( isset( $form->id) ) {
                $data[0] = 0;
                $data[1] = 'DNI y/o CUIT ya Registrado';
                return $data;
            }

            $form = User::where('email', '=', $request->correo)->first();
            if ( isset( $form->id) ) {
                $data[0] = 0;
                $data[1] = 'Correo ya Registrado';
                return $data;
            }

            $usuario = new User();
            $usuario->name = $request->razonsocial;
            $usuario->email = $request->correo;
            $usuario->password = Hash::make($request->pass);
            //$usuario->api_token = Str::random(50);
            $usuario->save();


            $form = new Clientes();
            $form->cli_razon = $request->razonsocial;
            $form->cli_cuit = $request->dni;
            $form->cli_direccion = $request->direccion;
            $form->cli_telefono = $request->telefono;
            $form->cli_whatsapp = $request->whatsapp;
            $form->cli_cod_postal = $request->cod_postal;
            $form->cli_pais = $request->pais;
            $form->cli_provincia = $request->provincia;
            $form->cli_cod = $request->cod_tempo;
            $form->cli_saldo = $request->saldo;
            $form->cli_tipo = $request->perfil;
            $form->cli_estado = $request->estado;
            $form->cli_user = $usuario->id;
            //$form->cli_add = auth()->id();
            $form->save();

            $data[0] = 1;
            $data[1]="Registro Satifactorio";
            $data[2] = $this->data();
            event(new Registered($usuario));

            if ( $request->check == true)
                $correo = 'Enviar Correo';

        // Editando Cliente
        } else if ( $request->sw == 1) {
            $form = Clientes::find($id);
            $correo = User::find($form->cli_user)->email;
            
            if ( $form->id != $id) {
                $data[0]=0;
                $data[1]="Error General";
                $data[2] = $request;
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
            $form->cli_cod = $request->cod_tempo;
            $form->cli_saldo = $request->saldo;
            $form->cli_tipo = $request->perfil;
            $form->cli_estado = $request->estado;
            
            $form->update();


            $user = User::where('id','=', $request->usr_id)->first();
            $user->name = $request->razonsocial;
            $user->email = $request->correo;
           // $user->api_token = Str::random(50);
            $user->update();

            $data[0] = 1;
            $data[1]="Registro Satifactorio";
            $data[2] = $this->data();
        // Eliminar un Cliente
        } else if ($request->sw == 3) {
            $doc = Documentos::where('doc_cliente', '=', $id)->first();
            if ( !isset($doc->id) ) {
                $cliente = Clientes::find($id);
                $user = User::find($cliente->cli_user);
                $cliente->delete();
                $user->delete();
                $data[0] = 1;
                $data[1] = 'Se Eliminó Correctamente el Cliente';
                $data[2] = $this->data();
            } else {
                $data[0] = 0;
                $data[1] = 'No se Puede Eliminar el Cliente, Tiene Documentos Registrados';
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
