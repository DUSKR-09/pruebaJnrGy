<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::resource('usuarios', 'UsuarioController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::get('/incisos/factorial', 'IncisosController@factorial')->name('incisos.factorial');
Route::get('/incisos/amortizacion', 'IncisosController@amortizacion')->name('incisos.amortizacion');

Route::resource('incisos', 'IncisosController');
