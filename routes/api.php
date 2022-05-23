<?php

use App\Http\Controllers\Api\IngresoController;
use App\Http\Controllers\Api\DocumentosController;
use App\Http\Controllers\Api\PreciosController;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::post('login','App\Http\Controllers\Api\IngresoController@login');
Route::post('login', [IngresoController::class, 'login']);

Route::group(['prefix' => 'admin', 'middleware' => ['jwt.verify', 'admin.verify:admin/documentos']], function() {
    Route::post('clientes', [IngresoController::class, 'clientes']);
    Route::post('consultas_documentos', [DocumentosController::class, 'consultaDocumentos']);
    Route::post('documentos',[DocumentosController::class, 'documento']);
    Route::post('detalle_d',[DocumentosController::class, 'detalle_doc']);
    Route::post('consulta_p',[DocumentosController::class, 'consultaProductos']);
    Route::post('productos',[PreciosController::class, 'ConsultaProductos']);
    Route::post('products',[PreciosController::class, 'PrecioProducto']);
});
