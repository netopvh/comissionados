<?php

namespace App\Core\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Domains\Comissionado\ViewComposers\ServidoresComposer;
use App\Domains\Comissionado\ViewComposers\SecretariaComposer;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['servidores.create','servidores.edit'], ServidoresComposer::class
        );

        View::composer(
            ['access.users.secretaria'], SecretariaComposer::class
        );
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}