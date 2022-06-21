<?php

namespace App\Http\Controllers\Sys\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Http\Controllers\Sys\Tienda\ClientesControllerW;
use App\Models\Sys\Tienda\Clientes;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSendClienteNew;


class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:cliente');
    }

    public function index()
    {
        return view('web.clientes.cliente_auth');
    }

    public function data()
    {
        $user = User::find(auth()->id())->id;
        $cliente = Clientes::leftjoin('users as u', 'u.id', 'cli_user')
                            ->leftjoin('perfiles as p', 'p.id', '=', 'clientes.cli_tipo')
                            ->where('cli_user', '=', $user)
                            ->select('u.id as usr_id',
                                    'clientes.id as cli_id',
                                    'cli_cod as cod_tempo',
                                    'cli_razon as razonsocial',
                                    'cli_cuit as dni',
                                    'cli_direccion as direccion',
                                    'cli_entre_calles as entre_calles',
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
                            )->first();
        return $cliente;
    }

 
    public function store(Request $request)
    {
        $data = array();
    
        $id = $request->id;
        $changeMail = 0;
        if ( $request->sw == 1) {
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
                
                $changeMail = 1;
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
            $form->cli_entre_calles = $request->entre_calles;
            $form->cli_telefono = $request->telefono;
            $form->cli_whatsapp = $request->whatsapp;
            $form->cli_cod_postal = $request->cod_postal;
            $form->cli_pais = $request->pais;
            $form->cli_provincia = $request->provincia;
            $form->update();


            $user = User::where('id','=', $request->usr_id)->first();
            $user->name = $request->razonsocial;
             // se envia correo validacion si se cmbia el correo registrado
             if ( $changeMail ==  1) {
                
                $user->email_verified_at = null; 
                $user->correoOk = 0;
                $user->email = $request->correo;
                $user->update();    
                ClientesControllerW::enviar_email_verificador($user->id);
            }else {
                $user->update();
            }
            
            

            $data[0] = 1;
            $data[1]="Registro Satifactorio";
            $data[2] = $this->data();
            $data[3] = $user->correoOk;

           
        } else if ( $request->sw == 2) {
            $user = User::where('id','=', $id)->first();
            $form = Clientes::where('cli_user', '=', $id)->first();
            
            $user->name = $request->nombre;
            $user->update();

            $form->cli_razon = $request->nombre;
            $form->update();
            $data[0] = 1;
            $data[1] = "Se Actualizó los Datos del Cliente";
            $data[2] = $form;
        }
        return $data;
    }

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
