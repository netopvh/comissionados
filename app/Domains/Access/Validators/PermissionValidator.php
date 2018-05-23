<?php

namespace App\Domains\Access\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class PermissionValidator.
 *
 * @package namespace App\Domains\Access\Validators;
 */
class PermissionValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'display_name' => 'unique:permissions,display_name'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'display_name' => 'required'
        ],
    ];

    protected $messages = [
        'required' => '* O :attribute é obrigatório',
        'unique' => '* Já possui este :attribute no banco de dados'
    ];

    protected $attributes = [
        'name' => 'nome',
        'display_name' => 'nome'
    ];
}
