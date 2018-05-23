<?php

// Authentication Routes...
Route::get('login', 'LoginController@showLoginForm')->name('login');
Route::post('login', 'LoginController@login');
Route::post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'ResetPasswordController@reset');

Route::prefix('access')->middleware('auth')->group(function (){
    Route::prefix('users')->group(function (){
        Route::get('/','UserController@index')->middleware('permission:ver-usuario')->name('users.index');
        Route::get('/create','UserController@create')->middleware('permission:criar-usuario')->name('users.create');
        Route::post('/store','UserController@store')->middleware('permission:criar-usuario')->name('users.store');
        Route::get('/{id}/edit','UserController@edit')->middleware('permission:editar-usuario')->name('users.edit');
        Route::patch('/{id}','UserController@update')->middleware('permission:editar-usuario')->name('users.update');
    });
    Route::prefix('roles')->group(function (){
        Route::get('/','RoleController@index')->middleware('permission:ver-perfil')->name('roles.index');
        Route::get('/create','RoleController@create')->middleware('permission:criar-perfil')->name('roles.create');
        Route::post('/store','RoleController@store')->middleware('permission:criar-perfil')->name('roles.store');
        Route::get('/{id}/edit','RoleController@edit')->middleware('permission:editar-perfil')->name('roles.edit');
        Route::patch('/{id}','RoleController@update')->middleware('permission:editar-perfil')->name('roles.update');
    });
    Route::prefix('permissions')->group(function (){
        Route::get('/','PermissionController@index')->middleware('permission:ver-permissoes')->name('permissions.index');
        Route::get('/create','PermissionController@create')->middleware('permission:criar-permissoes')->name('permissions.create');
        Route::post('/store','PermissionController@store')->middleware('permission:criar-permissoes')->name('permissions.store');
        Route::get('/{id}/edit','PermissionController@edit')->middleware('permission:editar-permissoes')->name('permissions.edit');
        Route::patch('/{id}','PermissionController@update')->middleware('permission:editar-permissoes')->name('permissions.update');
    });
    Route::prefix('groups')->group(function (){
        Route::post('/','PermissionGroupController@store')->name('groups.store');
    });
    Route::prefix('audit')->group(function (){
        Route::get('/','AuditController@index')->middleware('permission:ver-auditoria')->name('audit.index');
    });
});
