<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimaisController;
use App\Http\Controllers\ExamesController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\UserController;

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


Route::get('/', [ConsultaController::class, 'index_anexo']);

Route::resource('exames', AnimaisController::class)->middleware('auth');
Route::resource('anexos', ExamesController::class)->middleware('auth');
Route::post('/anexos/join/{id}', [ExamesController::class, 'joinAnexo'])->middleware('auth');
Route::get('consulta', [ConsultaController::class, 'index_anexo']);
Route::post('lista', [ConsultaController::class, 'lista_anexo']);
Route::get('/list/{id}', [ConsultaController::class, 'list']);
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('usuarios', UserController::class)->middleware('auth');
Route::get('imprimir/{number}', [AnimaisController::class, 'impressao'])->middleware('auth');