<?php

use App\Models\Sys\Backend\Roles;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('/email/verify', function() { 
        
        return view('auth.verify');
    })->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/perfil');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function(Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verificación Link Enviada!...');
})->middleware(['auth','throttle:6,1'])->name('verification.send');
*/

Route::get('/email/verify/{id}', 'App\Http\Controllers\Sys\Tienda\ClientesControllerW@enviar_email_verificador')->middleware(['auth']);
Route::get('/mcategorias/all','App\Http\Controllers\HomeController@allcat');
Route::get('/sliders','App\Http\Controllers\HomeController@sliders');
Route::get('/imgc/{id}','App\Http\Controllers\HomeController@image_c');

Route::post('/registro','App\Http\Controllers\Sys\Tienda\ClientesController@new_cliente')->name('registro');
Route::post('/formulariocontacto','App\Http\Controllers\HomeController@formulariocontacto')->name('contacto');

Route::get('/perfil/menues', 'App\Http\Controllers\Auth\ProfileController@menus')->middleware(('auth'));
Route::get('/perfil/data', 'App\Http\Controllers\Auth\ProfileController@data')->middleware(('auth'));
Route::resource('/perfil', 'App\Http\Controllers\Auth\ProfileController')->middleware(['auth','verified']);

Route::get('/checkout','App\Http\Controllers\Sys\Tienda\DocumentosController@checkout')->middleware('auth','perfil:cliente/documentos');

//web
Route::get('/','App\Http\Controllers\HomeController@index');
Route::get('/nosotros','App\Http\Controllers\HomeController@nosotros');
Route::get('/contacto','App\Http\Controllers\HomeController@fcontacto');
Route::get('/clientes','App\Http\Controllers\HomeController@mayoristas');
Route::get('/cobranding','App\Http\Controllers\HomeController@cobranding');
Route::get('/grid/{id}',     'App\Http\Controllers\HomeController@grid');
Route::get('/categorias/{id}','App\Http\Controllers\HomeController@show');
Route::get('/banner/{id}',   'App\Http\Controllers\HomeController@banner');
Route::get('/category/{id}', 'App\Http\Controllers\HomeController@category');
Route::get('/products/{id}', 'App\Http\Controllers\HomeController@products');
Route::get('/como-comprar','App\Http\Controllers\HomeController@comocomprar');
Route::get('/envio','App\Http\Controllers\HomeController@envio');
Route::get('/product/destacados', 'App\Http\Controllers\Sys\Tienda\ProductosController@destacados');



Route::get('/econtacto','App\Http\Controllers\HomeController@contacto');
Route::get('/suscripcion','App\Http\Controllers\HomeController@suscripcion');
Route::get('/provincia','App\Http\Controllers\HomeController@provincia');
Route::get('/localidad/{id}','App\Http\Controllers\HomeController@localidad');


Route::apiResource('productos', 'App\Http\Controllers\Sys\Tienda\ProductosController');
Route::post('/buscador','App\Http\Controllers\Sys\Tienda\ProductosController@buscador');
Route::post('/validar-email', 'App\Http\Controllers\Auth\ProfileController@validar_correo')->middleware(['auth']);


Route::post('downloads/{id}','App\Http\Controllers\Api\StaticController@download');



Route::resource('/cliente/documentos','App\Http\Controllers\Sys\Tienda\DocumentosController')->middleware('auth', 'perfil:cliente/documentos');
Route::get('/cliente/data','App\Http\Controllers\Sys\Usuario\ClientesController@data')->middleware('auth', 'perfil:cliente');
Route::get('/admin/clientes/data','App\Http\Controllers\Sys\Backend\ClientesController@data')->middleware('auth', 'perfil:admin/clientes');
Route::get('/admin/banners/data','App\Http\Controllers\Sys\Backend\PaginaHomeController@data')->middleware('auth', 'perfil:admin/banners');
Route::get('/admin/empresa/data','App\Http\Controllers\Sys\Backend\EmpresaController@data')->middleware('auth', 'perfil:admin/empresa');
Route::get('/admin/dashboard','App\Http\Controllers\Sys\Backend\PaginaHomeController@dashboard')->middleware('auth', 'perfil:admin/banners');

Route::post('/admin/biblioteca/newft','App\Http\Controllers\Sys\Backend\PaginaHomeController@new_ft_biblioteca')->middleware('auth', 'perfil:admin/banners');
Route::post('/admin/biblioteca/new','App\Http\Controllers\Sys\Backend\PaginaHomeController@new_biblioteca')->middleware('auth', 'perfil:admin/banners');
Route::post('/admin/password-edit','App\Http\Controllers\Sys\Backend\UsuariosController@editPassword')->middleware('auth', 'perfil:admin/usuarios');
Route::post('/admin/destacado/{id}','App\Http\Controllers\Sys\Backend\ProductosController@destacado')->middleware('auth', 'perfil:admin/productos');
Route::post('/admin/productos/baja_producto/{id}','App\Http\Controllers\Sys\Backend\ProductosController@baja_producto')->middleware('auth', 'perfil:admin/productos');
Route::post('/admin/producto/add_categoriaproducto','App\Http\Controllers\Sys\Backend\ProductosController@add_categoriaproducto')->middleware('auth', 'perfil:admin/productos');
Route::post('/admin/producto/del_categoriaproducto','App\Http\Controllers\Sys\Backend\ProductosController@del_categoriaproducto')->middleware('auth', 'perfil:admin/productos');
Route::post('/admin/producto/estado/{id}','App\Http\Controllers\Sys\Backend\ProductosController@estado_producto')->middleware('auth', 'perfil:admin/productos');

Route::get('/admin/producto/{id}','App\Http\Controllers\Sys\Backend\ProductosController@producto_edit')->middleware('auth', 'perfil:admin/productos');

Route::resource('/cliente','App\Http\Controllers\Sys\Usuario\ClientesController')->middleware('auth', 'perfil:cliente');

Route::resource('/admin/banners','App\Http\Controllers\Sys\Backend\PaginaHomeController')->middleware('auth', 'perfil:admin/banners');
Route::resource('/admin/clientes','App\Http\Controllers\Sys\Backend\ClientesController')->middleware('auth', 'perfil:admin/clientes');
Route::resource('/admin/categorias','App\Http\Controllers\Sys\Backend\CategoriasController')->middleware('auth', 'perfil:admin/categorias');
Route::resource('/admin/producto','App\Http\Controllers\Sys\Backend\ProductosController')->middleware('auth', 'perfil:admin/productos');
Route::resource('/admin/perfiles','App\Http\Controllers\Sys\Backend\PerfilesController')->middleware('auth', 'perfil:admin/perfiles');
Route::resource('/admin/roles','App\Http\Controllers\Sys\Backend\RolesController')->middleware('auth', 'perfil:admin/roles');
Route::resource('/admin/menues','App\Http\Controllers\Sys\Backend\MenuesController')->middleware('auth', 'perfil:admin/menues');
Route::resource('/admin/listado_productos','App\Http\Controllers\Sys\Backend\ProductosController')->middleware('auth', 'perfil:admin/productos');
Route::resource('/admin/atributos','App\Http\Controllers\Sys\Backend\AtributosController')->middleware('auth', 'perfil:admin/atributos');
Route::resource('/admin/producto_atributo','App\Http\Controllers\Sys\Backend\ProductosAtributosController')->middleware('auth', 'perfil:admin/productos');

Route::resource('/admin/empresa','App\Http\Controllers\Sys\Backend\EmpresaController')->middleware('auth', 'perfil:admin/empresa');
Route::resource('/admin/documentos','App\Http\Controllers\Sys\Backend\DocumentosController')->middleware('auth', 'perfil:admin/documentos');


