<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Productos;
use App\Models\Sys\Tienda\Productos_categorias;
use App\Models\Sys\Tienda\Productos_atributos;
use App\Http\Controllers\Sys\Backend\ProductosAtributosController;

class ProductosController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/productos');
    }

    public function data()
    {
        $producto = Productos::leftjoin('bibliotecas as b', 'b.id', '=', 'pro_imagen_ppal')
                            ->select('productos.id', 'pro_es_nombre as es_name', 'pro_en_nombre as en_name',
                                      'pro_es_descripcion as es_descripcion', 'pro_en_descripcion as en_descripcion',
                                      'pro_es_descripcion_larga as es_laga', 'pro_en_descripcion_larga as en_larga',
                                      'pro_tipo as tipo', 'pro_ficha as ficha', 'pro_estado as estado',
                                      'pro_destacado as destacado', 'pro_imagen_ppal as image',
                                      'bib_url as url', 'pro_anmat as anmat', 'pro_senasa as senasa'  
                                      )
                            ->get();
        return $producto;
    }

    public function index(Request $request)
    {
        $data = array();
        if ( $request->ajax() ){
            $data = $this->data();
            return $data;
        } else {
            return view('web.backend.listadoproductos');
        }
    }

    public function producto_edit(Request $request, $id)
     {
         if ( $request->ajax() ) {
            $data = array();
            $ruta = env("APP_RUTA") . '\ficha';
            $ruta_s = env("APP_RUTA") . '\senasa';
            $ruta_a = env("APP_RUTA") . '\anmat';
            
            if ( $request->id > 0 ) {
                $obj = new ProductosAtributosController();
                $producto = Productos::where('productos.id','=',$id)
                                    ->leftjoin('bibliotecas as b', 'b.id', '=', 'pro_imagen_ppal')
                                    ->select('productos.*', 'bib_url')->first();
                $categoria = $this->productos_categorias($id); 
                $data['prod'] = $producto;
                $data['cats'] = $categoria;
                $data['attr'] = $obj->data($id);
            }
            $data['fichas'] = $this->getfile($ruta );
            $data['anmat'] = $this->getfile($ruta_a);
            $data['senasa'] = $this->getfile($ruta_s);
            
            return $data;
         } else {
             return view('web.backend.productos');
         }
     }

    public function store( Request $request)
    {
        $data = array();
        $id = $request->id;

        if ( $request->sw == 0 ) {
            $prod = Productos::where('pro_es_nombre', '=', $request->es_name)->count();
            if ( $prod == 1) {
                $data[0] = 0;
                $data[1] = 'Producto en español ya Registrado';
                return $data;
            } else {
                $prod = Productos::where('pro_en_nombre', '=', $request->en_name)->count();
                if ( $prod == 1) {
                    $data[0] = 0;
                    $data[1] = 'Producto en Ingles ya Registrado';
                    return $data;
                }
            }

            $prod = new Productos();
            $prod->pro_es_nombre = $request->es_name;
            $prod->pro_en_nombre = $request->en_name;
            $prod->pro_es_descripcion = $request->es_descripcion;
            $prod->pro_en_descripcion = $request->en_descripcion;
            $prod->pro_es_descripcion_larga = $request->es_larga;
            $prod->pro_en_descripcion_larga = $request->en_larga;
            $prod->pro_tipo = $request->tipo;
            $prod->pro_ficha = $request->ficha;
            $prod->pro_anmat = $request->anmat;
            $prod->pro_senasa = $request->senasa;
            $prod->pro_estado = $request->estado;
            $prod->pro_destacado = $request->destacado;
            $prod->pro_imagen_ppal = $request->image;
            $prod->save();

            $data[0] = 1;
            $data[1] = 'Producto agregado Correctamente';
            $data[2] = $this->data();
            $data[3] = $prod->id;
        } else if ( $request->sw == 1) {
            $data[0] = 0;
            $data[1] = 'Producto no Encontrado';

            $prod = Productos::find($id);
            $prod->pro_es_nombre = $request->es_name;
            $prod->pro_en_nombre = $request->en_name;
            $prod->pro_es_descripcion = $request->es_descripcion;
            $prod->pro_en_descripcion = $request->en_descripcion;
            $prod->pro_es_descripcion_larga = $request->es_larga;
            $prod->pro_en_descripcion_larga = $request->en_larga;
            $prod->pro_tipo = $request->tipo;
            $prod->pro_ficha = $request->ficha;
            $prod->pro_ficha = $request->ficha;
            $prod->pro_anmat = $request->anmat;
            $prod->pro_estado = $request->estado;
            $prod->pro_destacado = $request->destacado;
            $prod->pro_imagen_ppal = $request->image;
            $prod->update();

            $data[0] = 1;
            $data[1] = 'Producto editado Correctamente';
            $data[2] = $this->data();
        } else if ( $request->sw == 3) {}
        return $data;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destacado( Request $request, $id)
    {
        $data= array();
        $data[0] = 0;
        $data[1] = 'Error no Encontrado';
        $prod = Productos::find( $id );
        if ( $prod->pro_destacado == 1)
            $prod->pro_destacado = 0;
        else
            $prod->pro_destacado = 1;
        $prod->save();
        $data[0] = 1;
        $data[1] = 'Cambio destacado';
        $data[2] = $prod->pro_destacado;
        return $data;
    }

    public function estado_producto( Request $request, $id)
    {
        $data= array();
        $data[0] = 0;
        $data[1] = 'Error no Encontrado';
        $prod = Productos::find( $id );
        if ( $prod->pro_estado == 1)
            $prod->pro_estado = 0;
        else
            $prod->pro_estado = 1;
        $prod->save();
        $data[0] = 1;
        $data[1] = 'Cambio de Estado Correctamente';
        $data[2] = $prod->pro_estado;
        return $data;
    }

    public function baja_producto(Request $request, $id)
    {
        $data= array();
        $data[0] = 0;
        $data[1] = 'Error no Encontrado';
        $prod = Productos::find( $id );
        $prod->pro_estado = 2;
        $prod->update();
        $data[0] = 1;
        $data[1] = 'Baja del producto Ok';
        $data[2] = $this->data();
        return $data;
    }
    
    public function productos_categorias( $art )
    {
        $cate = Productos_categorias::join('categorias as c', 'c.id', '=', 'pca_categoria')
                            ->where('pca_producto', '=', $art)
                            ->select('productos_categorias.id','c.cat_es_name', 'pca_producto', 'pca_categoria' )
                            ->get();
        return $cate;
    }

    public function add_categoriaproducto(Request $request)
    {
        $val = productos_categorias::where('pca_categoria', '=', $request->categoria)
                                ->where('pca_producto','=', $request->id)
                                ->first();
        if ( $val != '') {
            $data[0] = 0;
            $data[1] = 'Categoria ya Registrada en el Producto';
            return $data;
        } else {
            $cat = new productos_categorias();
            $cat->pca_producto = $request->id;
            $cat->pca_categoria = $request->categoria;
            $cat->pca_add = auth()->id();
            $cat->save();
            $data[0] = 1;
            $data[1] = 'Se Agrego la Categoría al Producto Correctamente';
            $data[2] = $this->productos_categorias( $request->id );
            return $data;
        }
    }

    public function del_categoriaproducto(Request $request)
    {
        $val = Productos_categorias::find( $request->id);
        if ($val == '') {
            $data[0] = 0;
            $data[1] = 'Producto Categoría no Encontrado ';
            return $data;
        } else {
            $val->delete();
            $cat = $this->productos_categorias($val->pca_producto);
            $data[0] = 1;
            $data[1] = 'Se Eliminó la Categoría del Producto Correctamente';
            $data[2] = $cat;
            return $data;
        }
    }

    public function getfile( $ruta )
     {
         $i = 0;
         $data = array();
        if(is_dir($ruta)){
            if($dir = opendir($ruta)){
                while(($archivo = readdir($dir)) !== false){
                    if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                        $data[ $i++ ]= $archivo;
                    }
                }
                closedir($dir);
            }
        }
        return $data;
     }

}