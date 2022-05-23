<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\Sys\Tienda\Clientes;
use App\Models\sys\Tienda\Documentos_detalles;
use Illuminate\Support\Facades\DB;

class IngresoController extends Controller
{
    public function index()
    {
        return 1;
    } 
    
    public function login(Request $request)
    {
        $credencial = $request->only('email', 'password');
        $valid = Validator::make($credencial, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if ( ! $valid->fails() ) {
            try {
                if ( ! $token = JWTAuth::attempt($credencial)) {
                    return response()->json([
                        'status' => false,
                        'token' => null,
                        'message' => 'Credenciales son Invalidas'
                    ]);
                } 
            }catch (JWTException $e) {
                return response()->json([
                    'status' => false,
                    'errors' => $e->getMessage(),
                    'message' => 'Credencial Invalidas'
                ]);
            }

            return response()->json([
                'status' => true,
                'token' => $token,
                'message' => 'Credenciales Validas'

            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'token' => null,
                'errors' => $valid->errors()
            ]);
        }
        
        return response()->json([], 401);;
    }

    public function clientes(Request $request)
    {
        $clientes = Clientes::where('cli_cod','!=', '')
                    ->select('id','cli_cod', 'cli_razon')
                    ->orderby('cli_cod', 'ASC')->get();

        return response()->json([
            'status' => true,
            'data' => json_encode($clientes),
            
            //'message' => $request->get('user') 
            'message' => 'Ok'
        ]);
    }
}