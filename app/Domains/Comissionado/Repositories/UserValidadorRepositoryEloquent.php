<?php

namespace App\Domains\Comissionado\Repositories;

use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Comissionado\Repositories\Contracts\UserValidadorRepository;
use App\Domains\Comissionado\Models\UserValidador;
use App\Domains\Comissionado\Validators\UserValidadorValidator;

/**
 * Class UserValidadorRepositoryEloquent
 * @package namespace App\Domains\Comissionado\Repositories;
 */
class UserValidadorRepositoryEloquent extends BaseRepository implements UserValidadorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserValidador::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
