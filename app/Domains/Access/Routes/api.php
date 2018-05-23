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
Route::prefix('access')->group(function (){
    Route::prefix('users')->group(function (){
        Route::get('/','Api\UserApiController@index');
        Route::patch('/{id}/status','Api\UserApiController@update');
    });
    Route::prefix('roles')->group(function (){
        Route::get('/','Api\RoleApiController@index');
    });
    Route::prefix('permissions')->group(function (){
        Route::get('/','Api\PermissionApiController@index');
    });
    Route::prefix('audit')->group(function (){
        Route::get('/','Api\AuditApiController@index');
    });
});

