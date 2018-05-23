<?php

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
Route::prefix('comissionado')->group(function (){
    Route::prefix('cargos')->group(function (){
        Route::get('/','Api\CargoComissionadoApiController@index');
    });
    Route::prefix('servidores')->group(function (){
        Route::get('/','Api\ServidorApiController@index');
    });
    Route::prefix('validacoes')->group(function (){
        Route::get('/','Api\ValidacaoApiController@index');
    });
});