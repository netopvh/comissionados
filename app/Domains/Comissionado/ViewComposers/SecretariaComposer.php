<?php

namespace App\Domains\Comissionado\ViewComposers;

use Illuminate\View\View;
use App\Domains\Comissionado\Repositories\Contracts\SecretariasRepository;

class SecretariaComposer
{
    /**
     * The user repository implementation.
     *
     * @var SecretariasRepository
     */
    protected $secretarias;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(
        SecretariasRepository $secretarias
    )
    {
        // Dependencies automatically resolved by service container...
        $this->secretarias = $secretarias;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('secretarias', $this->secretarias->all());
    }
}