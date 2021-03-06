<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return '<h1>Primeira lógica com Laravel</h1>';
});

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostra', 'ProdutoController@mostra');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove', 'ProdutoController@remove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login', 'LoginController@login');
