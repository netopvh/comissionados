<?php

namespace App\Core\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Laratrust\Middleware\LaratrustPermission;

class LaratrustCustom extends LaratrustPermission
{
    protected function unauthorized()
    {
        $parameter = Config::get('laratrust.middleware.params');

        return Redirect::to($parameter)->withErrors('Você não possui permissão para executar esta operação!');
    }
}
