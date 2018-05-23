<?php

namespace App\Domains\Access\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Contracts\UserResolver;
use OwenIt\Auditing\Auditable;

class User extends Authenticatable implements AuditableContract, UserResolver
{
    use Notifiable, LaratrustUserTrait,Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','username', 'email', 'password','active','api_token','servidor_id','secretaria_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     */
    public static function resolve()
    {
        return auth()->check() ? auth()->user()->getAuthIdentifier() : null;
    }

    public function getNameAttribute($value)
    {
        return mb_strtoupper($value,'UTF-8');
    }

    public function setNomeAttribute($value)
    {
        $this->attributes['nome'] = mb_strtoupper($value,"UTF-8");
    }

    public function validadores()
    {
        return $this->belongsToMany(User::class,'user_validadors','id_responsavel','id_validador');
    }
}
