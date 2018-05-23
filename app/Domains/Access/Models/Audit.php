<?php

namespace App\Domains\Access\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use OwenIt\Auditing\Audit as AuditTrait;
use OwenIt\Auditing\Contracts\Audit as AuditContract;

/**
 * Class Audit.
 *
 * @package namespace App\Domains\Access\Models;
 */
class Audit extends Model implements Transformable, AuditContract
{
    use TransformableTrait, AuditTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $dates = ['created_at'];

    private $models = [
        'App\Domains\Access\Models\User' => 'Usuários',
        'App\Domains\Access\Models\Permission' => 'Permissões',
        'App\Domains\Access\Models\PermissionGroup' => 'Grupos',
        'App\Domains\Access\Models\Role' => 'Perfis',
        'App\Domains\Access\Models\Audit' => 'Auditorias',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'old_values' => 'json',
        'new_values' => 'json',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getEventAttribute($value)
    {
        switch ($value) {
            case 'created':
                return 'Novo Registro';
                break;
            case 'updated':
                return 'Modificação de Registro';
                break;
            case 'deleted':
                return 'Remoção de Registro';
                break;
        }
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

    public function getAuditableTypeAttribute($value)
    {
        foreach ($this->models as $key => $field){
            if (trim($value) == $key){
                return $field;
            }else{
                return $value;
            }
        }
        return null;
    }
}
