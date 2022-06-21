<?php

namespace App\Http\Controllers\Sys\Tienda;

use App\Http\Controllers\Controller;
use App\Models\Sys\Tienda\Productos;
use Illuminate\Http\Request;
use App\Models\Sys\Tienda\Categorias;
use App\Models\Sys\Tienda\Productos_categorias;
use App\Models\Sys\Tienda\Productos_atributos;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Arr;

class ProductosController extends Controller
{
    public function index(Productos $productos, Request $request) 
    {
        if ( $request->ajax() ) {
            $productos = array();
            $precio = 0;
            
            if ( (isset($_GET['tipo'])) && ($_GET['tipo'] != "")) 
                $tipo = $_GET['tipo'];
            else
                $tipo = 0;

            if ( (isset($_GET['category'])) && ($_GET['category'] != "")) 
            {
                $categoria_nombre = $_GET['category'];
                $data = array();

                if ( !is_numeric($categoria_nombre))
                    $categoria = Categorias::where('cat_es_name', '=', $categoria_nombre)
                        ->orWhere('cat_en_name', '=', $categoria_nombre)
                        ->select('id', 'cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')->first();
                else
                    $categoria = Categorias::where('id', '=', $categoria_nombre)
                        ->select('id', 'cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')->first();
                
                if ( $categoria == "") 
                    return $data;

                $children = Categorias::where('cat_padre', '=', $categoria->id)
                                ->select('id', 'cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')
                                ->orderby('cat_padre', 'ASC')->get();

                $dat = array();
                $dat[] = $categoria;

                $children = $this->search_child($children);

                foreach ( $children as $key => $value) {
                    $dat[] = $children[$key];
                }

                foreach ( $dat as $key => $value)
                {
                    $prod = $this->prodPorCategoria($value->id);

                    foreach ( $prod as $k => $v)
                    {
                        $prod[$k]['cat'] = $this->ver_categorias_producto($v->id);
                        $productos[] = $prod[$k];
                    }
                }
                $productos = array_unique($productos);
            } else 
            {
                $productos = Productos::leftjoin('bibliotecas as b', 'b.id', '=', 'pro_imagen_ppal')
                            ->leftjoin('productos_atributos as pa', 'pa.pat_imagen', 'pro_imagen_ppal')
                            ->where('pro_estado', '=', 1)
                            ->select('productos.id as id', 'pro_es_nombre as es_name', 'pro_en_nombre as en_name',
                                    'pro_estado', 'b.bib_url as image', 'pat_precio_usr', 'pat_precio_emp',
                                    'pat_precio_esp', 'pat_precio_dst', 'pat_precio_usr as precio')->get();
            }

        
        

            foreach ( $productos as $key => $value) 
            {
                if ( $value['image'] != null)
                    $productos[$key]['image'] = $value['image'];
                else
                    $productos[$key]['image'] = '/storage/images/pblanco.png';
                
                
                switch ($tipo) {
                    case 1:
                    case 2:
                        $productos[$key]->precio = $value->pat_precio_dst;
                        break;
                    case 3:
                        $productos[$key]->precio = $productos[$key]->pat_precio_emp;
                        break;
                    case 4:
                        $productos[$key]->precio = $productos[$key]->pat_precio_esp;
                        break;
                    case 5:
                        $productos[$key]->precio = $productos[$key]->pat_precio_usr;
                        break;
                    default:
                        $productos[$key]->precio = 0;
                        break;
                }
                $productos[$key]['cantidad'] = 1;
                $productos[$key]['total'] = 1;
                //$productos[$key]['precio'] = $tipo;
            }

            $descuento_volumen = 0;
            //$data['regla_negocio'] = $descuento_volumen;
            $data['articulos'] = $productos;

            return $data;
        } else {
            return 1;
        }
    }

    public function buscador(Request $request)
    {
        if ( (isset($_GET['tipo'])) && ($_GET['tipo'] != "")) 
                $tipo = $_GET['tipo'];
            else
                $tipo = 0;
        $data = array();
        if ( $request->idioma == 'es'){
            $prods = Productos::where('pro_estado', '=', 1)->select('id', 'pro_es_nombre as txt')->orderBy('pro_es_nombre', 'ASC')->get();
        } else {
            $prods = Productos::where('pro_estado', '=', 1)->select('id', 'pro_en_nombre as txt')->orderBy('pro_en_nombre', 'ASC')->get();
        }

        foreach($prods as $key => $value) {
            $ele = array();
            $ele['id'] = $value['id'];
            $ele['txt'] = $value['txt'];
            $ele['val'] = 'products/' .$value['id'] . '?tipo=' . $tipo;
            $data[] = $ele;
        }

        return $data;
            
    }

    
    public function show($id)
    {
        $data = array();
        $atributos = null;
        $imagenes = null;
        $categoria = null;
        $precio = 0;

        if ( (isset($_GET['tipo'])) && ($_GET['tipo'] != "")) 
            $tipo = $_GET['tipo'];
        else
            $tipo = 0;

        if ( is_numeric($id) ) {
            $productos = Productos::leftjoin('bibliotecas as b', 'b.id', '=', 'pro_imagen_ppal')
                            ->where('productos.id', '=', $id)
                            ->where('pro_estado', '=', 1)
                            ->select('productos.id as id', 'pro_es_nombre as es_name', 'pro_en_nombre as en_name',
                                    'pro_es_descripcion as es_descripcion', 'pro_en_descripcion as en_descripcion',
                                    'pro_es_descripcion_larga as es_desc_larga', 'pro_en_descripcion_larga as en_desc_larga',
                                    'pro_ficha as ficha', 'b.bib_url as image', 'b.id as img_id', 'pro_tipo',
                                    'pro_anmat as anmat', 'pro_senasa as senasa')
                            ->first();

            if ( isset( $productos->id ) ) {
                $productos->atributo = '';
                $productos->attr_nom = '';
                $productos->attr_en_nom = '';
                $productos->precio = 0;
                $productos->price = 0;
                $productos->cod_tempo = '';

                $atributos = Productos_atributos::join('atributos as a','a.id', '=', 'pat_attr')
                                ->leftjoin('bibliotecas as b', 'b.id', '=', 'pat_imagen')
                                ->where('pat_prod', '=', $id)
                                ->where('pat_estado', '=', 1)
                                ->orderby('pat_orden', 'ASC')
                                ->select('productos_atributos.id as id', 'a.id as id_attr', 'atr_es_name as text', 'atr_en_name as en_text',
                                        'b.bib_url as image', 'b.bib_url as alt', 'b.id as img_id', 'pat_precio_usr as precio_usr',
                                        'pat_precio_emp as precio_emp', 'pat_precio_esp as precio_esp',
                                        'pat_precio_dst as precio_dst', 'pat_precio_usr as precio', 'pat_cod_tempo as cod_tempo')
                                ->get();

                if ( isset($atributos[0]) ) {
                    foreach ( $atributos as $key => $value ) {
                        switch ($tipo) {
                            case 0:
                                $atributos[$key]['precio'] = 0;
                                $atributos[$key]['cantidad'] = 0;
                                break;
                            case 1:
                            case 2:
                                $atributos[$key]['precio'] = $value->precio_dst;
                                $atributos[$key]['cantidad'] = 0;
                                $precio = $value->precio_dst;
                                break;
                            case 3:
                                $atributos[$key]['precio'] = $value->precio_esp;
                                $atributos[$key]['cantidad'] = 0;
                                $precio = $value->precio_esp;
                                break;
                            case 4:
                                $atributos[$key]['precio'] = $value->precio_emp;
                                $atributos[$key]['cantidad'] = 0;
                                $precio = $value->precio_emp;
                                break;
                            case 5:
                                $atributos[$key]['precio'] = $value->precio_usr;
                                $atributos[$key]['cantidad'] = 0;
                                $precio = $value->precio_usr;
                                break;
                            default:
                                
                                break;
                        }
                        

                        if ( $productos->img_id === $value->img_id ) {
                            $productos->precio = $atributos[$key]['precio'];
                            $productos->atributo = $atributos[$key]['id'];
                            $productos->attr_nom = $atributos[$key]['text'];
                            $productos->attr_en_nom = $atributos[$key]['en_text'];
                            $productos->cod_tempo = $atributos[$key]['cod_tempo'];
                            $productos->price = $precio;
                        }
                        
                    }
                }

                $imagenes = Productos_atributos::join('bibliotecas as b', 'b.id', '=', 'pat_imagen')
                                ->where('pat_prod','=', $id)
                                ->orderby('pat_orden', 'ASC')
                                ->select('bib_url as image', 'bib_url as alt', 'b.id as id')->get();

                $categoria = Productos_categorias::join('categorias as c', 'c.id', '=', 'pca_categoria')
                                ->where('pca_producto', '=', $id)
                                ->select('c.cat_es_name as es_name', 'cat_en_name as en_name', 'c.id')
                                ->orderby('c.id', 'DESC')->first();

                foreach ( $imagenes as $key => $value) {
                    if ( $value['image'] != null)
                        $imagenes[$key]['image'] = $value['image'];
                    else
                        $imagenes[$key]['image'] = '/storage/images/pblanco.png';
                }

                $productos->cantidad = 1;
                $productos->total = $productos->precio;

                if ( $productos->image == '')
                    $productos->image = '/storage/images/pblanco.png';
            }
            $menu = Categorias::where('cat_padre','=',null)
                            ->select('cat_es_name', 'cat_en_name')
                            ->orderby('cat_posicion', 'ASC')
                            ->get();

            $parents = array();
            $hijo = $categoria->id;
            $parents = HomeController::search_parent($hijo, $parents);

            $data['atributos'] = $atributos;
            $data['es_categoria'] = $categoria->es_name;
            $data['en_categoria'] = $categoria->en_name;
            $data['data'] = $productos;
            $data['cat']= $categoria;
            $data['padres'] = array_reverse($parents);
        }

        return $data;
    }

    public function destacados(Productos $productos)
    {
        //
        if ( (isset($_GET['category'])) && ($_GET['category'] != ""))
        {
            $categoria_nombre = $_GET['category'];
            $data = array();

            $categoria = Categorias::where('cat_es_name', '=', $categoria_nombre)
                                    ->orWhere('cat_en_name', '=', $categoria_nombre)->first();
            if ( $categoria == "" ) return $data;

            $productos = Productos::leftJoin('bibliotecas as b', 'b.id', '=', 'pro_imagen_ppal')
                                ->where('pro_estado', '=', 1)
                                ->where('pro_destacado', '=', 1)
                                ->select('productos.id as id', 'pro_es_nombre as es_name', 'pro_en_nombre as en_name',
                                        'b.bib_url as image')
                                ->limit(5)->get();
        }else {
            $productos = Productos::leftJoin('bibliotecas as b', 'b.id', '=','pro_imagen_ppal')
                                ->where('pro_estado', '=', 1)
                                ->where('pro_destacado', '=', 1)
                                ->select('productos.id as id', 'pro_es_nombre as es_name', 'pro_en_nombre as en_name',
                                        'b.bib_url as image')
                                ->limit(5)->get();                            
        }

        foreach ($productos as $key => $value) {
            if ( $value['image'] != null )
                $productos[$key]['image'] = $value['image'];
            else
                $productos[$key]['image'] = 'storage/images/pblanco.png';
            
            $productos[$key]['cantidad'] = 1;
            $productos[$key]['total'] = 0;
            $productos[$key]['precio'] = 0;
        }

        $data['descuento_valumen'] = 0;
        $data['articulos'] = $productos;

        return $data;
    }


    public function search_child($children)
    {
        foreach ( $children as $key => $value)
        {
            $child = Categorias::where('cat_padre','=', $value->id)
                        ->select('id','cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')
                        ->orderby('cat_padre', 'ASC')->get();

            $child = $this->search_child($child);

            foreach ( $child as $e => $v)
            {
                $children[] = $child[$e];
            }
        }
        return $children;
    }

    public function ver_categorias_producto($id)
    {
        $categoria = Productos_categorias::join('categorias as c', 'c.id', 'pca_categoria')
                                   // ->leftjoin('productos_atributo as pa', 'pa.pat_imagen', '=', )
                                    ->where('pca_producto', '=', $id)
                                    ->select('c.cat_es_name as as_name', 'c.cat_en_name as en_name', 'c.id as id')
                                    ->orderby('c.id', 'ASC')->get();

        return $categoria;
    }

    public function prodPorCategoria($id)
    {
        return $prodCat = Productos::leftjoin('bibliotecas as b', 'b.id', 'pro_imagen_ppal')
                    ->leftjoin('productos_categorias as pca', 'pca_producto', '=', 'productos.id'  )
                    ->leftjoin('productos_atributos as pa', 'pa.pat_imagen', '=', 'pro_imagen_ppal')
                    ->where('pca_categoria', '=', $id)
                    ->where('pro_estado', '=', 1)
                    ->select('productos.id as id','pro_es_nombre as es_name', 'pro_en_nombre as en_name',
                        'pro_estado', 'b.bib_url as image', 'pat_precio_usr', 'pat_precio_emp',
                        'pat_precio_esp', 'pat_precio_dst', 'pat_precio_usr as precio')->get();
    }

}
