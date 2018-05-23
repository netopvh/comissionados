<?php

namespace App\Domains\Access\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use OwenIt\Auditing\Auditable;

/**
 * Class PermissionGroup.
 *
 * @package namespace App\Domains\Access\Models;
 */
class PermissionGroup extends Model implements Transformable, AuditableContract
{
    use TransformableTrait, Auditable;

    protected $table = 'permission_group';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','parent_id'];

    public function parent()
    {
        return $this->belongsTo(PermissionGroup::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PermissionGroup::class, 'parent_id');
    }

}
