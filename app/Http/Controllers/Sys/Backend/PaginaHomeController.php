<?php

namespace App\Http\Controllers\Sys\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Sys\Tienda\PaginaHome;
use App\Models\Sys\Tienda\Bibliotecas;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Sys\Backend\ProductosController;

class PaginaHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('perfil:admin/banners');
    }

    public function index()
    {
        return view( 'web.backend.banners');
    }

    public function data()
    {
        $banners = PaginaHome::leftjoin('bibliotecas as b', 'b.id', '=', 'sli_imagen')
                            ->select('pagina_homes.id', 'sli_tipo as tipo', 'sli_posicion as posicion', 
                                     'sli_extra as extra', 'sli_align as align', 'sli_justify as justify',
                                     'sli_padding as padding', 'sli_margin as margin', 'sli_background_text as background_text',
                                     'sli_text_es as es_text', 'sli_text_en as en_text', 'sli_class as class',
                                     'sli_colortext as colortext', 'sli_color as color', 'bib_url as image', 'b.id as id_bib')
                            ->orderBy('sli_tipo', 'ASC')
                            ->orderBy('pagina_homes.id', 'ASC')
                            ->get();
        return $banners;
    }

    public function biblioteca(Request $request, $id)
    {
        //return $request;
         $data = Bibliotecas::select('id', 'bib_nombre', 'bib_url')
                             ->where('bib_url', 'like', $request->lib)
                             ->orderby('bib_nombre', 'ASC')->get();
         return $data;
    }

    public function dashboard() 
    {
        return view('web.backend.dashboard'); 
    }

    public function new_biblioteca(Request $request)
    {
        //return $request;
        $data = array();
        $nombre = Bibliotecas::where('bib_nombre', '=', $request->nombre)->count();
        if ( $nombre == 1) {
            $data[0] = 0;
            $data[1] = 'La Imagen ya se encuentra en la Galeria de Imagenes, Cambie el Nombre';
            return $data;
        }
        $biblio = new Bibliotecas();
        $biblio->bib_nombre = $request->nombre;
        $biblio->bib_url = $request->url;
        $biblio->bib_add = auth()->id();
        $biblio->save();

        $file = $request->file('files');

        $upload = Storage::putFileAs($request->ruta, $file, $request->nombre);
        $data[0] = 1;
        $data[1] = 'Se agrego la Imagen Sactifactoriamente a la Galeria de Imagenes';
        $data[2] = $this->biblioteca($request, 1);
        $data[3] = $biblio->id;
        return $data;
    }

    public function new_ft_biblioteca(Request $request)
    {
        $ruta = env('APP_RUTA');
        $obj = new ProductosController();
        $data = array();
        $data[0] = 0;
        $data[1] = 'Error al cargar el archivo';
        $file = $request->file('files');
        $upload = Storage::putFileAs($request->ruta, $file, $request->nombre);
        $data[0] = 1;
        if ( $request->tipo == 'ficha') {
            $data[1] = 'Se agrego la Ficha Técnica  Sactifactoriamente a la Galeria de Fichas';
            $data[2] = $obj->getfile($ruta . '\ficha');
        } elseif ( $request->tipo == 'senasa') {
            $data[1] = 'Se agrego el Certificado de SENASA  Sactifactoriamente a la Galeria de Certificados Senasa';
            $data[2] = $obj->getfile($ruta . '\senasa');
        } elseif ( $request->tipo == 'anmat') {
            $data[1] = 'Se agrego el Certificado de ANMAT  Sactifactoriamente a la Galeria de Certificado de Anmat';
            $data[2] = $obj->getfile($ruta . '\anmat');
        }
        return $data;
    }

    public function destroy($id)
    {
        
    }

    public function store( Request $request)
    {
        $data = array();
        $id = $request->id;

        if ( $request->sw == 1 ) {
            $banner = PaginaHome::find($id);
            if ( isset($banner->id) ) {
                $banner->sli_tipo = $request->tipo;
                $banner->sli_posicion = $request->posicion;
                $banner->sli_extra = $request->extra;
                $banner->sli_align = $request->align;
                $banner->sli_justify = $request->justify;
                $banner->sli_padding = $request->padding;
                $banner->sli_margin = $request->margin;
                $banner->sli_background_text = $request->background_text;
                $banner->sli_text_es = $request->es_text;
                $banner->sli_text_en = $request->en_text;
                $banner->sli_class = $request->class;
                $banner->sli_colortext = $request->colortext;
                $banner->sli_color = $request->color;
                $banner->sli_imagen = $request->id_bib;
                $banner->sli_add = auth()->id();
                $banner->save();
                $data[0] = 1;
                $data[1] = "Se Editó el Banner Correctamente";
                $data[2] = $this->data();
            } else {
                $data[0] = 0;
                $data[1] = 'Error General id : ' . $id . ' No encontrado';
            }
        } else if ( $request->sw == 3) {
            $banner = PaginaHome::find($id);
            $banner->delete();
            $banner = $this->data();
            return $banner;
        } else if ( $request->sw == 2 ) {
            $data[0] = 1;
            $data[2] = Bibliotecas::select('id', 'bib_nombre', 'bib_url')
                            ->where('bib_url', 'like', $request->lib)
                            ->orderby('bib_nombre', 'ASC')->get();
        }
        return $data;
    }
}