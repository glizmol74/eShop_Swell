<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\CategoriasController;
use App\Models\Sys\Tienda\Categorias;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Sys\Tienda\Empresas;
use App\Models\Sys\Tienda\Provincia;
use App\Models\Sys\Tienda\Localidad;
use App\Models\Sys\Tienda\PaginaHome;
use App\Models\Sys\Tienda\ContactForms;
use Laravel\Ui\Presets\React;
use App\Mail\EmailNuevaConsulta;
use Hamcrest\Type\IsInteger;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
      //  $this->middleware('auth');
    //}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function nosotros()
    {
        return view(('nosotros'));
    }

    public function fcontacto()
    {
        return view('contacto');
    }

    public function cobranding()
    {
        return view('cobranding');
    }

    public function comocomprar()
    {
        return view('comocomprar');
    }

    public function envio()
    {
        return view('envio');
    }

    public function contacto()
    {
        $contacto = Empresas::select('emp_direccion as address','emp_whatsapp as whatsapp', 'emp_email as mail', 'emp_mapa as maps','emp_telefono as phone',
                                     'emp_admin as mail_admin', 'emp_ventas as mail_ventas', 'emp_compras as mail_compras', 'emp_soporte as mail_soporte')->first();
        $contacto->whatsapp = 'https://wa.me/54'.$contacto->whatsapp.'?text=Hola';
        return $contacto;
    }

    public function category($request)
    {
        return view('category');
    }

    public function products($id) 
    {
        return view('products');
    }

    public function suscripcion($request)
    {
        $validData = $request->validate([
            'correo' => 'email|required',
        ]);

        return $request;
    }

    public function mayoristas()
    {
        return view('web.mayoristas');
    }

    public function provincia()
    {
        $dato = Provincia::select('pro_nombre as txt', 'id')->get();
        return $dato;
    }

    public function localidad($id)
    {
        if ( is_numeric($id) )
            $dato = Localidad::select('loc_nombre as txt', 'id', 'loc_codigo_postal as cp')->orderBy('txt', 'ASC')->where('loc_provincia', '=', $id)->get();
        else
            $dato = array();

        return $dato;
    }

    public function sliders()
    {
        $data = array();
        $sliders = PaginaHome::select('b.bib_url as image', 'sli_align as alig', 'sli_justify as just',
                                    'sli_padding as pad', 'sli_margin as mar', 'sli_background_text as background_text',
                                    'sli_text_en as en_text', 'sli_text_es as es_text', 'sli_class as class',
                                    'sli_colortext as colortext', 'sli_color as color', 'pagina_homes.id as id')
                                ->leftJoin('bibliotecas as b','b.id', '=', 'sli_imagen')
                                ->where('sli_posicion', '=', 0)
                                ->where('sli_tipo', '=', 1)
                                ->get();
        $mobile = PaginaHome::select('b.bib_url as image', 'sli_align as alig', 'sli_justify as just',
                                    'sli_padding as pad', 'sli_margin as mar', 'sli_background_text as background_text',
                                    'sli_text_en as en_text', 'sli_text_es as es_text', 'sli_class as class',
                                    'sli_colortext as colortext', 'sli_color as color', 'pagina_homes.id as id')
                                ->leftJoin('bibliotecas as b','b.id', '=', 'sli_imagen')
                                ->where('sli_posicion', '=', 0)
                                ->where('sli_tipo', '=', 0)
                                ->get();
        $data['sliders'] = $sliders;
        $data['mobile'] = $sliders; 
        return $data;
    }

    public function banner($id) 
    {
        
        $id = strtolower($id);
        $data = PaginaHome::select('b.bib_url as image', 'sli_text_en as en_text', 'sli_text_es as es_text',
                                'sli_class as class', 'sli_colortext as colortext', 'sli_color as color',
                                'sli_ref as src', 'sli_posicion as pos', 'sli_extra as cat', 'sli_margin as marg', 
                                'sli_align as col', 'pagina_homes.id as id')
                            ->leftJoin('bibliotecas as b', 'b.id', '=', 'sli_imagen')
                            ->where('sli_extra', '=', $id)
                            ->where('sli_tipo', '=', 5)
                            ->orderBy('sli_posicion', 'ASC')->first();
        return $data;

    }

    public function grid($id)
    {
        $grid = array();
        $grid = PaginaHome::where('sli_posicion', '>', 0)
                        ->where('sli_tipo', '=', $id)
                        ->select('sli_posicion as pos', 'sli_align as col')->get();

        foreach ( $grid as $key => $Value) {
            $data[ $Value->pos ]['col'] = $Value->col;
            $data[ $Value->pos ]['vert'] = PaginaHome::select('b.bib_url as image', 'sli_text_en as en_text', 'sli_text_es as es_text',
                                            'sli_class as class', 'sli_colortext as colortext', 'sli_color as color',
                                            'sli_ref as src', 'sli_posicion as pos', 'sli_extra as cat', 'sli_margin as marg', 
                                            'sli_align as col', 'pagina_homes.id as id')
                                        ->leftJoin('bibliotecas as b', 'b.id', '=', 'sli_imagen')
                                        ->where('sli_posicion', '=', $Value->pos)
                                        ->where('sli_tipo', '=', $id)
                                        ->orderBy('sli_posicion', 'ASC')->get();
        }
        
        return $data;
    }

    public function image_c($id)
    {
        $data = array();
        $data = PaginaHome::select('b.bib_url as src')
                            ->leftJoin('bibliotecas as b', 'b.id', '=', 'sli_imagen')
                            ->where('sli_tipo', '=', $id)
                            ->orderBy('sli_posicion', 'ASC')->get();
        return $data;
    }

    public function allcat()
    {
        $data = array();
        $data = Categorias::where('cat_padre','=', null)
                            ->select('id','cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')
                            ->orderby('cat_posicion','ASC')->get();

        if ( $data == "")
        return $data;

        $categorias = array();

        foreach ( $data as $key => $value) {
            $name = $value->es_name;
            $id = $value->id;
            $categorias[$name] = $this->show($id);
            //$categorias[] = $value;
        }

        return $categorias;
    }

    public function show($id)
    {
        $data = array();
        if ( is_numeric($id) ) {
            $categoria = Categorias::where('id','=',$id)->select('id','cat_es_name as es_name','cat_en_name as en_name', 'cat_padre as padre')->first();
        }else {
            //$id = strtolower($id);  
            $categoria = Categorias::where('cat_es_name','=',$id)
                                    ->orwhere('cat_en_name','=',$id)
                                    ->select('id','cat_es_name as es_name','cat_en_name as en_name', 'cat_padre as padre')->first();
        }

        if ($categoria =="") return $categoria;


        $children = Categorias::where('cat_padre','=',$categoria->id)
                                    ->select('id','cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')
                                    ->orderby('cat_padre', 'ASC')
                                    ->orderby('cat_posicion', 'ASC')
                                    ->orderby('cat_es_name', 'ASC')
                                    ->get();

        
        $parents = array();
        $children = $this->search_child($children);
        $parents = $this->search_parent($categoria->padre, $parents);
        if ( count($children) != 0)
            $categoria->t_hijo = 1; 
        else
            $categoria->t_hijo = 0;
        $data['categories'] = $categoria; 
        $data['categories']['children'] = $children;
        $data['categories']['parents'] = array_reverse($parents);
        return $data;
    }

    public function search_child($children)
    {
        foreach( $children as $key => $value) {
            $child = Categorias::where('cat_padre','=', $value->id)
                                    ->select('id', 'cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')
                                    ->orderby('cat_padre', 'ASC')
                                    ->orderby('cat_es_name')
                                    ->get();

            $children[$key]['children'] = $child;
            foreach ( $children as $key => $value) {
                $child = $this->search_child($child);
            }
        }
        return $children;
    }

    public static function search_parent($id, $parents) 
    {
        $parent = Categorias::where('id','=', $id)
                                ->select('id', 'cat_es_name as es_name', 'cat_en_name as en_name', 'cat_padre as padre')
                                ->first();
        $parents[] = $parent;
        if ((isset($parent->padre)) && ($parent->padre))
            $parents = HomeController::search_parent($parent->padre, $parents);

        return $parents;
    }

    public function formulariocontacto(Request $request)
    {
        $form = new ContactForms();
        $form->for_pregunta = $request->pregunta;
        $form->for_name = $request->name;
        $form->for_email = $request->email;
        $form->for_telefono = $request->telefono;
        $form->for_comentarios = $request->comentarios;
        $form->save();

        if ( $request->destinatario == '') {
            $request->destinatario = 'sistemas@swell.com.ar';
        }

        Mail::to($request->destinatario)->send( new EmailNuevaConsulta($form));

        return 'ok';
    }
}
