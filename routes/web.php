<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImoveisController;

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
Route::get('/',[ImoveisController::class, 'index']);
Route::resource('imoveis', ImoveisController::class);
Route::post('/imoveis/pesquisar',[ImoveisController::class, 'pesquisar'])->name('pesquisar');
