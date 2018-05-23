<?php

Route::prefix('comissionados')->middleware('auth')->group(function (){
    Route::prefix('cargos')->group(function (){
        Route::get('/','CargoComissionadoController@index')->middleware('permission:ver-cargos-comissionados')->name('comissionados.cargos.index');
        Route::get('/create','CargoComissionadoController@create')->middleware('permission:criar-cargos-comissionados')->name('comissionados.cargos.create');
        Route::post('/create','CargoComissionadoController@store')->middleware('permission:criar-cargos-comissionados')->name('comissionados.cargos.store');
        Route::get('/{id}/show','CargoComissionadoController@show')->middleware('permission:ver-cargos-comissionados')->name('comissionados.cargos.show');
        Route::get('/{id}/edit','CargoComissionadoController@edit')->middleware('permission:atualizar-cargos-comissionados')->name('comissionados.cargos.edit');
        Route::patch('/{id}/edit','CargoComissionadoController@update')->middleware('permission:atualizar-cargos-comissionados')->name('comissionados.cargos.update');
        Route::delete('/{id}','CargoComissionadoController@destroy')->middleware('permission:remover-cargos-comissionados')->name('comissionados.cargos.destroy');
    });
    Route::prefix('instrucao')->group(function (){
        Route::get('/','GrauInstrucaoController@index')->middleware('permission:ver-grau-instrucao')->name('comissionados.instrucao.index');
        Route::get('/create','GrauInstrucaoController@create')->middleware('permission:criar-grau-instrucao')->name('comissionados.instrucao.create');
        Route::post('/','GrauInstrucaoController@store')->middleware('permission:criar-grau-instrucao')->name('comissionados.instrucao.store');
        Route::get('/{id}/show','GrauInstrucaoController@show')->middleware('permission:ver-grau-instrucao')->name('comissionados.instrucao.show');
        Route::get('/{id}','GrauInstrucaoController@edit')->middleware('permission:atualizar-grau-instrucao')->name('comissionados.instrucao.edit');
        Route::patch('/{id}','GrauInstrucaoController@update')->middleware('permission:atualizar-grau-instrucao')->name('comissionados.instrucao.update');
        Route::delete('/{id}','GrauInstrucaoController@destroy')->middleware('permission:remover-grau-instrucao')->name('comissionados.instrucao.destroy');
    });
    Route::prefix('nomenclatura')->group(function (){
        Route::get('/','NomenclaturaCargoController@index')->middleware('permission:ver-nomenclatura')->name('comissionados.nomenclatura.index');
        Route::get('/create','NomenclaturaCargoController@create')->middleware('permission:criar-nomenclatura')->name('comissionados.nomenclatura.create');
        Route::post('/','NomenclaturaCargoController@store')->middleware('permission:criar-nomenclatura')->name('comissionados.nomenclatura.store');
        Route::get('/{id}/show','NomenclaturaCargoController@show')->middleware('permission:ver-nomenclatura')->name('comissionados.nomenclatura.show');
        Route::get('/{id}','NomenclaturaCargoController@edit')->middleware('permission:atualizar-nomenclatura')->name('comissionados.nomenclatura.edit');
        Route::patch('/{id}','NomenclaturaCargoController@update')->middleware('permission:atualizar-nomenclatura')->name('comissionados.nomenclatura.update');
        Route::delete('/{id}','NomenclaturaCargoController@destroy')->middleware('permission:remover-nomenclatura')->name('comissionados.nomenclatura.destroy');
    });
    Route::prefix('regime')->group(function (){
        Route::get('/','RegimeTrabController@index')->middleware('permission:ver-regime-trabalho')->name('comissionados.regime.index');
        Route::get('/create','RegimeTrabController@create')->middleware('permission:criar-regime-trabalho')->name('comissionados.regime.create');
        Route::post('/','RegimeTrabController@store')->middleware('permission:criar-regime-trabalho')->name('comissionados.regime.store');
        Route::get('/{id}/show','RegimeTrabController@show')->middleware('permission:ver-regime-trabalho')->name('comissionados.regime.show');
        Route::get('/{id}','RegimeTrabController@edit')->middleware('permission:atualizar-regime-trabalho')->name('comissionados.regime.edit');
        Route::patch('/{id}','RegimeTrabController@update')->middleware('permission:atualizar-regime-trabalho')->name('comissionados.regime.update');
        Route::delete('/{id}','RegimeTrabController@destroy')->middleware('permission:remover-regime-trabalho')->name('comissionados.regime.destroy');
    });
    Route::prefix('secretarias')->group(function (){
        Route::get('/','SecretariasController@index')->middleware('permission:ver-secretarias')->name('comissionados.secretarias.index');
        Route::get('/create','SecretariasController@create')->middleware('permission:criar-secretarias')->name('comissionados.secretarias.create');
        Route::post('/','SecretariasController@store')->middleware('permission:criar-secretarias')->name('comissionados.secretarias.store');
        Route::get('/{id}/show','SecretariasController@show')->middleware('permission:ver-secretarias')->name('comissionados.secretarias.show');
        Route::get('/{id}','SecretariasController@edit')->middleware('permission:atualizar-secretarias')->name('comissionados.secretarias.edit');
        Route::patch('/{id}','SecretariasController@update')->middleware('permission:atualizar-secretarias')->name('comissionados.secretarias.update');
        Route::delete('/{id}','SecretariasController@destroy')->middleware('permission:remover-secretarias')->name('comissionados.secretarias.destroy');
    });
    Route::prefix('tipos')->group(function (){
        Route::get('/','TipoCargoController@index')->middleware('permission:ver-tipo-cargos')->name('comissionados.tipos.index');
        Route::get('/create','TipoCargoController@create')->middleware('permission:criar-tipo-cargos')->name('comissionados.tipos.create');
        Route::post('/','TipoCargoController@store')->middleware('permission:criar-tipo-cargos')->name('comissionados.tipos.store');
        Route::get('/{id}/show','TipoCargoController@show')->middleware('permission:ver-tipo-cargos')->name('comissionados.tipos.show');
        Route::get('/{id}','TipoCargoController@edit')->middleware('permission:atualizar-tipo-cargos')->name('comissionados.tipos.edit');
        Route::patch('/{id}','TipoCargoController@update')->middleware('permission:atualizar-tipo-cargos')->name('comissionados.tipos.update');
        Route::delete('/{id}','TipoCargoController@destroy')->middleware('permission:remover-tipo-cargos')->name('comissionados.tipos.destroy');
    });
    Route::prefix('linhas')->group(function (){
        Route::get('/','LinhaOnibusController@index')->middleware('permission:ver-linha-onibus')->name('comissionados.linhas.index');
        Route::get('/create','LinhaOnibusController@create')->middleware('permission:criar-linha-onibus')->name('comissionados.linhas.create');
        Route::post('/','LinhaOnibusController@store')->middleware('permission:criar-linha-onibus')->name('comissionados.linhas.store');
        Route::get('/{id}','LinhaOnibusController@edit')->middleware('permission:atualizar-linha-onibus')->name('comissionados.linhas.edit');
        Route::patch('/{id}','LinhaOnibusController@update')->middleware('permission:atualizar-linha-onibus')->name('comissionados.linhas.update');
        Route::delete('/{id}','LinhaOnibusController@destroy')->middleware('permission:remover-linha-onibus')->name('comissionados.linhas.destroy');
    });
    Route::prefix('servidores')->group(function (){
        Route::get('/','ServidorController@index')->middleware('permission:ver-servidores')->name('comissionados.servidores.index');
        Route::get('/data','ServidorController@data');
        Route::get('/create','ServidorController@create')->middleware('permission:criar-servidores')->name('comissionados.servidores.create');
        Route::post('/create','ServidorController@store')->middleware('permission:criar-servidores')->name('comissionados.servidores.store');
        Route::get('/{id}/show','ServidorController@show')->name('comissionados.servidores.show');
        Route::get('/{id}/edit','ServidorController@edit')->middleware('permission:atualizar-servidores')->name('comissionados.servidores.edit');
        Route::patch('/{id}/edit','ServidorController@update')->middleware('permission:atualizar-servidores')->name('comissionados.servidores.update');
        Route::delete('/{id}','ServidorController@destroy')->middleware('permission:atualizar-servidores')->name('comissionados.servidores.destroy');
    });
    Route::prefix('validacao')->group(function (){
        Route::get('/','ValidacaoController@index')->middleware('permission:ver-validacao')->name('comissionados.validacao.index');
        Route::get('/designar','ValidacaoController@getDesignacao')->middleware('permission:designar-validacao')->name('comissionados.validacao.designar');
        Route::get('/designar/create','ValidacaoController@getDesignacaoCreate')->name('comissionados.validacao.create');
        Route::post('/designar','ValidacaoController@postDesignacao')->name('comissionados.validacao.designar.store');
        Route::get('/designar/{id}','ValidacaoController@getDesignacaoDestroy')->name('comissionados.validacao.designar.destroy');
        Route::get('/{id}','ValidacaoController@getServidor')->middleware('permission:criar-validacao')->name('comissionados.validacao.find');
        Route::patch('/{id}/valida','ValidacaoController@postValidacao')->middleware('permission:atualizar-validacao')->name('comissionados.validacao.update');
        Route::get('/{id}/revalidar','ValidacaoController@getRevalidar')->name('comissionados.validacao.revalidar');
    });
});