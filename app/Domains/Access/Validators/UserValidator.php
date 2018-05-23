<?php

namespace App\Domains\Access\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class UserValidator.
 *
 * @package namespace App\Domains\Access\Validators;
 */
class UserValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'nome' => 'required|unique:users,nome',
            'username' => 'required|unique:users,username',
            'email' => 'required|unique:users,email|email',
            'password' => 'min:5',
            'role_id' => 'required'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'nome' => 'required',
            'email' => 'required|email',
            'role_id' => 'required'
        ],
    ];

    protected $messages = [
        'required' => '* O :attribute é obrigatório',
        'unique' => '* Já possui este :attribute no banco de dados',
        'min' => '* Você deve digitar no mínimo :min caracteres no campo :attribute',
        'email' => '* O campo :attribute não contém um endereço de email válido.'
    ];

    protected $attributes = [
        'nome' => 'Nome',
        'username' => 'usuário',
        'email' => 'email',
        'password' => 'Senha',
        'role_id' => 'perfil'
    ];
}
