<?php

namespace App\Http\Controllers\Sys\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Sys\Tienda\Clientes;
use App\Models\Sys\Tienda\Empresas;
use App\Models\Sys\Tienda\Provincia;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailNuevoCliente;
use App\Mail\EmailSendClienteNew;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ClientesControllerW extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('web.clientes.cliente');
    }

    public function data()
    {
        $user = User::find(auth()->id())->id;
        $cliente = Clientes::leftjoin('users u', 'u.id', 'cli_user')
                            ->where('cli_user', '=', $user)
                            ->select('u.id as usr_id',
                                    'clientes.id as cli_id',
                                    'clientes.cli_razon',
                                    'clientes.cli_cuit',
                                    'clientes.cli_direccion'
                            )->first();
        return $cliente;
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
        //
    }

    
    public static function  enviar_email_verificador($id){
        $permitido = '01234567889ABCDEFGHIJKLMNOPQRSTXYZabcdefghijklmnopqrstvwxyz';
        $codigo = substr(str_shuffle($permitido),0,6);
        $user = User::where('id', '=', $id)->first();
        $data = array();
        $data[0] = 0;
        $data[1] = 'Error enviando email';
        if ( isset($user->id) ) {
            $form = Clientes::where('cli_user', '=', $id)->first();
            $user->correoVerificador = $codigo;
            $user->save();
            $correo = array();
            $form->codigo = $codigo;
            $correo['cliente'] = $form;
            Mail::to($user->email)->send( new EmailSendClienteNew($correo));
            $data[0] = 1;
            $data[1] = 'Envio de correo Satisfactorio';
        }
        return $data;
    }

    public function new_cliente(Request $request)
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

        $permitido = '01234567889ABCDEFGHIJKLMNOPQRSTXYZabcdefghijklmnopqrstvwxyz';
        $codigo = substr(str_shuffle($permitido),0,6);
        $data = array();
        if ($request->cli_razon!=null) 
            $form = Clientes::where('cli_cuit', '=', $request->cli_cuit)->first();

        if (isset($form->id)){
            $data[0]=0;
            $data[1]="Cuit ya Registrado";

            return $data;
        }

        $form = User::where('email', '=', $request->email)->first();
        if (isset($form->id)){
          $data[0]=2;
          $data[1]="Correo ya Registrado";
          return $data;
        }
  
        $user = new User();
        $user->name = $request->cli_razon;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->correOk = 0;
        $user->correoVerificador = $codigo;
        $user->api_token = Str::random(50);
        $user->save();



        $form = new Clientes();
        $form->cli_razon = $request->cli_razon;
        $form->cli_cuit = $request->cli_cuit;
        $form->cli_direccion = $request->cli_direccion;
        $form->cli_entre_calles = $request->entre_calles;
        $form->cli_telefono = $request->cli_telefono;
        $form->cli_whatsapp = $request->cli_whatsapp;
        $form->cli_saldo = 0;
        $form->cli_tipo = $request->cli_tipo;
        $form->cli_cod_postal = $request->cli_cod_postal;
        $form->cli_pais = $request->cli_pais;
        $form->cli_provincia = $request->cli_provincia;
        if ( $request->cli_tipo == 5)
            $form->cli_estado = 1;
        else
            $form->cli_estado = 0;
        $form->cli_user = $user->id;
        $form->save();
        $form->codigo = $codigo;
        $data[0] = 1;
        $data[1]="Registro Satifactorio";

        //event(new Registered($user));

        $emp = Empresas::select('emp_ventas as destinatario')->first();
        $pro = Provincia::leftjoin('localidads as l', 'loc_provincia', '=', 'provincias.id')
                        ->select('pro_nombre', 'loc_nombre', 'loc_codigo_postal')
                        ->where('provincias.id', '=', $form->cli_provincia)
                        ->where('l.id', '=', $form->cli_cod_postal)->first();

        $correo = array();
        $correo['cliente'] = $form;
        $correo['correo'] = $request->email;
        $correo['postal'] = $pro; 
        
        $this->enviar_email_verificador($user->id);
        Mail::to($emp->destinatario)->send( new EmailNuevoCliente($correo));

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
