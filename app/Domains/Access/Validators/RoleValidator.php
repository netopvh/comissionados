<?php

namespace App\Domains\Access\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class RoleValidator.
 *
 * @package namespace App\Domains\Access\Validators;
 */
class RoleValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'unique:roles,name',
            'display_name' => 'required|unique:roles,display_name',
            'permissions' => 'required|array'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'display_name' => 'required',
            'permissions' => 'required|array'
        ],
    ];

    protected $messages = [
        'required' => '* O :attribute é obrigatório',
        'unique' => '* Já possui este :attribute no banco de dados'
    ];

    protected $attributes = [
        'name' => 'nome',
        'display_name' => 'nome',
        'permissions' => 'permissões'
    ];
}
