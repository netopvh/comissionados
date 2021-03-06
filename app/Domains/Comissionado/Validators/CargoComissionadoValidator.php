<?php

namespace App\Domains\Comissionado\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class CargoComissionadoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'descricao' => 'required|unique:cargocomissionado,descricao'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'descricao' => 'required'
        ],
   ];

    protected $messages = [
        'required' => 'O campo :attribute é requerido.',
        'unique' => 'Registro já consta em nosso banco de dados.',
    ];

    protected $attributes = [
        'descricao' => 'descrição'
    ];
}
