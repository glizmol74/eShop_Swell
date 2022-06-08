<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Categorias;

class CategoriasController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/categorias');
    }

    public function index(Request $request)
    {
        if ( $request->ajax()) {
            $categoria = Categorias::leftjoin('categorias as c', 'c.id', 'categorias.cat_padre')
                                    ->select('categorias.id','categorias.cat_es_name as es_name', 'categorias.cat_en_name as en_name', 
                                            'categorias.cat_padre as padre', 'categorias.cat_posicion as orden', 
                                            'c.cat_es_name as padre_es_name', 'c.cat_en_name as padre_en_name')
                                    ->orderBy('categorias.cat_padre', 'ASC')
                                    ->orderBy('categorias.cat_posicion', 'ASC')
                                    ->orderBy('categorias.cat_es_name', 'ASC')
                                    ->get();
            return $categoria;
        } else {
            return view('web.backend.categorias');
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

    public function data() 
    {
        $categoria = Categorias::leftjoin('categorias as c', 'c.id', 'categorias.cat_padre')
                                ->select('categorias.id','categorias.cat_es_name as es_name', 'categorias.cat_en_name as en_name', 
                                        'categorias.cat_padre as padre', 'categorias.cat_posicion as orden', 
                                        'c.cat_es_name as padre_es_name', 'c.cat_en_name as padre_en_name')
                                ->orderBy('categorias.cat_padre', 'ASC')
                                ->orderBy('categorias.cat_posicion', 'ASC')
                                ->orderBy('categorias.cat_es_name', 'ASC')
                                ->get();
        return $categoria;
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
        // nueva categoria
        if ( $request->sw == 0 ) {
            $cat = Categorias::where('cat_es_name', '=', $request->es_name)
                        ->where('cat_padre', '=', $request->padre)->count();
            if ( $cat == 1 ) {
                $data[0] = 0;
                $data[1] = 'La categoria en Español ya esta Registrada';
                return  $data;
            } else {
                $cat = Categorias::where('cat_en_name', '=', $request->en_name)
                                ->where('cat_padre', '=', $request->padre)->count();
                if ( $cat == 1) {
                    $data[0] = 0;
                    $data[1] = 'La categoria en Ingles ya esta Registrada';
                    return  $data;
                }
            }

            $categoria = new Categorias();
            $categoria->cat_es_name = $request->es_name;
            $categoria->cat_en_name = $request->en_name;
            $categoria->cat_padre = $request->padre;
            $categoria->cat_posicion = $request->orden;
            $categoria->save();
            $data[0] = 1;
            $data[1] = 'Categoría Agregada Correctamente';
            $data[2] = $this->data();
            return $data;
        // modificacion de categoria
        } else if ( $request->sw == 1) {
            $data[0] = 0;
            $data[1] = 'No found';
            $cat = Categorias::find($id);
            $cat->cat_es_name = $request->es_name;
            $cat->cat_en_name = $request->en_name;
            $cat->cat_padre = $request->padre;
            $cat->cat_posicion = $request->orden;
            $cat->save();
    
            $data = array();
            $data[0] = 1;
            $data[1] = 'Se editó la Categoría Correctamente';
            $data[2] = $this->data();
            return $data;
        // Eliminar Categoria
        } else if ( $request->sw == 3) {
            $cat = Categorias::where('cat_padre', '=', $id)->count();
            if ( $cat >= 1) {
                $data[0] = 0;
                $data[1] = 'No se puede eliminar la Categoria Tiene Sub-Categoría';
                return $data;
            }
            $cat = Categorias::find($id);
            $cat->delete();
            
            $data[0] = 1;
            $data[1] = 'Se Eliminó Correctamente la Categoría';
            $data[2] = $this->data();
            return $data;
        }
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
