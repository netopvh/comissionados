<?php

namespace App\Domains\Access\Models;

use Laratrust\Models\LaratrustRole;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

class Role extends LaratrustRole implements Transformable, AuditableContract
{
    use TransformableTrait, Auditable;

    protected $fillable = ['name','display_name','description'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = str_slug($value);
    }

    public function setDisplayNameAttribute($value)
    {
        $this->attributes['display_name'] = ucwords($value);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucwords($value);
    }
}

