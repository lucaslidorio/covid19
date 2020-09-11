<?php

use App\Http\Controllers\InfracaoAplicadaController;
use Illuminate\Support\Facades\Route;
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
//Define as rotas infrações
Route::resource('pessoas', 'PessoaController');//->middleware('auth');
//Define as rotas infrações
Route::resource('infracoes', 'InfracaoAplicadaController');

;
// Cria a  Rota /, apresenta a tela inicial
Route::get('/', function(){
  return view('dashboard');
});

Auth::routes(['register'=> false]);

Route::get('/home', 'HomeController@index')->name('home');
