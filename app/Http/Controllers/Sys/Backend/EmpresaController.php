<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Empresas;
use App\Models\Sys\Backend\Perfiles;
use Illuminate\Support\Facades\Storage;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/empresa');
    }

    public function index()
    {
        return view('web.backend.empresa');
    }

    public function data(Request $request)
    {
        $data = array();
        $data['empresa'] = Empresas::first();
        $data['perfiles'] = Perfiles::select('id', 'per_descripcion as text')->get();
        return $data;
    }

    public function store(Request $request)
    {
        if ( $request->tipo == 1) {
            $file = $request->file('files');
            $ext = $file->getClientOriginalExtension();
            $upload = Storage::putFileAs('public/images', $file, 'logoEmpresa.'.$ext);
            return $upload;
        } else if ( $request->tipo == 2) {
            $id = $request->id;
            $emp = Empresas::find($id);
            $data = array();
            if ( !isset( $emp->id ) ) {
               $data[0] = 0;
               $data[1] = 'Empresa No Found';
               return $data;
            } else {
                $emp->emp_nombre = $request->nombre;
                $emp->emp_app = $request->app;
                $emp->emp_direccion = $request->direccion;
                $emp->emp_telefono = $request->telefono;
                $emp->emp_whatsapp = $request->whatsapp;
                $emp->emp_cuit = $request->cuit;
                $emp->emp_logo = $request->logo;
                $emp->emp_perfil_base = $request->perfil;
                $emp->emp_email = $request->correo;
                $emp->emp_admin = $request->admin;
                $emp->emp_ventas = $request->ventas;
                $emp->emp_mapa = $request->mapa;
                $emp->emp_add = auth()->id();
                $emp->save();
   
                $data[0] = 1;
                $data[1] = 'Se Modificó los datos de la Empresa Correctamente';
                $data[2] = $emp;
                return $data;   
            }
        }
    }

    public function update(Request $request, $id)
     {
         $emp = Empresas::find($id);
         $data = array();
         if ( !isset( $emp->id ) ) {
            $data[0] = 0;
            $data[1] = 'Empresa No Found';
            return $data;
         } else {
             $emp->emp_nombre = $request->nombre;
             $emp->emp_app = $request->app;
             $emp->emp_direccion = $request->direccion;
             $emp->emp_telefono = $request->telefono;
             $emp->emp_whatsapp = $request->whatsapp;
             $emp->emp_cuit = $request->cuit;
             $emp->emp_logo = $request->logo;
             $emp->emp_perfil_base = $request->perfil;
             $emp->emp_email = $request->correo;
             $emp->emp_admin = $request->admin;
             $emp->emp_ventas = $request->ventas;
             $emp->emp_mapa = $request->mapa;
             $emp->emp_add = auth()->id();
             $emp->save();

             $data[0] = 1;
             $data[1] = 'Se Modificó los datos de la Empresa Correctamente';
             $data[2] = $emp;
             return $data;
         }
     }
}