<?php


namespace App\Core\Repositories;

use App\Core\Exceptions\GeneralException;
use Prettus\Repository\Eloquent\BaseRepository as PrettusRepository;
use Illuminate\Container\Container as Application;

class BaseRepository extends PrettusRepository implements BaseRepositoryContract
{

    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

    public function model()
    {
        return $this->model;
    }

    public function findWithoutFail($id, $columns = ['*'])
    {
        try {
            return $this->find($id, $columns);
        } catch (\Exception $e) {
            return $e->getTraceAsString();
        }
    }

    public function query()
    {
        return $this->model->newQuery();
    }
    public function select(array $colunms = ['*'])
    {
        return $this->model->newQuery()->select($colunms);
    }

    public function findExists(string $column, $value)
    {
        $result = $this->model->newQuery()->where($column, $value)->get()->first();
        if (is_null($result)) {
            throw new GeneralException(config('messages.notexists'));
        }else{
            return $result;
        }
    }

}