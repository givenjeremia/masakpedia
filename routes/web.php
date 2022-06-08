<?php

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

Route::get('/', 'HomeController@index');

Route::resource('/resep', 'ResepController');
Route::resource('/artikel', 'ArtikelController');

Route::middleware(['auth'])->group(function(){
    Route::get('/myresep', 'ResepController@myresep');
    Route::resource('my_resep', 'ResepController');
    Route::resource('myartikel', 'ArtikelController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');