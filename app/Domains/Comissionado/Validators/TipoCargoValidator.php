<?php

namespace App\Domains\Comissionado\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class TipoCargoValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'descricao' => 'required|unique:tipocargo'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'descricao' => 'required'
        ],
   ];

    protected $messages = [
        'descricao.required' => 'Este campo é requerido.',
        'descricao.unique' => 'Registro já consta em nosso banco de dados.',
    ];
}
