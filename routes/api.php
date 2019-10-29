<?php

use Illuminate\Http\Request;

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

Route::get('herois', 'HeroisController@listar');
Route::get('herois/{id}', 'HeroisController@buscarPorId')->where('id', '[0-9]*');
Route::get('herois/poder/{poder}/{incluirSecundario?}', 'HeroisController@buscarPorPoder')->where('incluirSecundario', '[y]');
Route::post('herois', 'HeroisController@criar');
Route::put('herois/{id}', 'HeroisController@atualizar');
Route::delete('herois/{id}', 'HeroisController@remover')->where('id', '[0-9]*');

Route::fallback('ErroController@naoEncontrado');