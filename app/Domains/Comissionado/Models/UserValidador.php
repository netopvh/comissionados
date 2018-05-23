<?php

namespace App\Domains\Comissionado\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class UserValidador extends Model implements AuditableContract
{
    use Auditable;

    protected $fillable = [
    	'id_responsavel','id_validador'
    ];

    public $timestamps = false;
}
