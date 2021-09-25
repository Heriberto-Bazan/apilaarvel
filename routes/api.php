<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/empleados', 'App\Http\Controllers\EmpleadoController@index');
Route::get('/empleados/{id}','App\Http\Controllers\EmpleadoController@show');
Route::post('/empleados', 'App\Http\Controllers\EmpleadoController@store');
Route::put('/empleados/{id}', 'App\Http\Controllers\EmpleadoController@update');
Route::delete('/empleados/{id}', 'App\Http\Controllers\EmpleadoController@destroy');

Route::get('/empresas', 'App\Http\Controllers\EmpresaControllers@index');
Route::get('/empresas/{id}','App\Http\Controllers\EmpresaControllers@show');
Route::post('/empresas', 'App\Http\Controllers\EmpresaControllers@store');
Route::put('/empresas/{id}', 'App\Http\Controllers\EmpresaControllers@update');
Route::delete('/empresas/{id}', 'App\Http\Controllers\EmpresaControllers@destroy');
