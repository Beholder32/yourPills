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

Route::get('/', function () {
    return view('index');
});

Route::post('submit','Medicamentos@save');  // Guardar la información del form en la base de datos.

Route::get('list', 'Medicamentos@index');  // Sacar la información de la base de datos y ponerla en forma de lista.
