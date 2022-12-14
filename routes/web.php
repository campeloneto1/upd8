<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EstadosController;
use App\Http\Controllers\CidadesController;

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



Route::resource('/', ClientesController::class);
Route::resource('/clientes', ClientesController::class);
Route::resource('/estados', EstadosController::class);
Route::resource('/cidades', CidadesController::class);

Route::get('/cidades/{id}/where', [CidadesController::class, 'where']);
