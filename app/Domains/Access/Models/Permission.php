<?php

namespace App\Domains\Access\Models;

use Laratrust\Models\LaratrustPermission;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

/**
 * Class Permission.
 *
 * @package namespace App\Domains\Access\Models;
 */
class Permission extends LaratrustPermission implements Transformable, AuditableContract
{
    use TransformableTrait, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','display_name','description','group_id'];

    public function groups()
    {
        return $this->belongsTo(PermissionGroup::class,'group_id','id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = str_slug($value);
    }

    public function setDisplayNameAttribute($value)
    {
        $this->attributes['display_name'] = ucwords(mb_strtolower($value,"UTF-8"));
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst($value);
    }

}
