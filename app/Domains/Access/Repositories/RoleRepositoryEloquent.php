<?php

namespace App\Domains\Access\Repositories;

use App\Core\Exceptions\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use App\Domains\Access\Models\Role;
use App\Domains\Access\Validators\RoleValidator;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Domains\Access\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Classe de validação do model
     *
     * @return string|RoleValidator
     */
    public function validator()
    {
        return RoleValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Save a new entity in repository
     *
     * @throws GeneralException
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes) : Role
    {
        if (!is_null($this->validator)) {
            if( $this->versionCompare($this->app->version(), "5.2.*", ">") ){
                $attributes = $this->model->newInstance()->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();
            }else{
                $model = $this->model->newInstance()->forceFill($attributes);
                $model->addVisible($this->model->getHidden());
                $attributes = $model->toArray();
            }

            $this->validator->with($attributes)->passesOrFail(ValidatorInterface::RULE_CREATE);
        }

        //Adiciona o field display_name no banco de dados
        $attributes['name'] = $attributes['display_name'];
        $role = parent::create($attributes);
        if($role){
            $role->syncPermissions($attributes['permissions']);
            $this->resetModel();
            event(new RepositoryEntityCreated($this, $role));
            return $this->parserResult($role);
        }
        throw new GeneralException('Não foi possível criar o perfil');
    }

    /**
     * Update a entity in repository by id
     *
     * @throws ValidatorException
     *
     * @param array $attributes
     * @param       $id
     *
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        $this->applyScope();

        if (!is_null($this->validator)) {
            if( $this->versionCompare($this->app->version(), "5.2.*", ">") ){
                $attributes = $this->model->newInstance()->forceFill($attributes)->makeVisible($this->model->getHidden())->toArray();
            }else{
                $model = $this->model->newInstance()->forceFill($attributes);
                $model->addVisible($this->model->getHidden());
                $attributes = $model->toArray();
            }

            $this->validator->with($attributes)->setId($id)->passesOrFail(ValidatorInterface::RULE_UPDATE);
        }

        $temporarySkipPresenter = $this->skipPresenter;

        $this->skipPresenter(true);
        $attributes['name'] = $attributes['display_name'];
        $role = parent::update($attributes,$id);
        if($role){
            $role->syncPermissions($attributes['permissions']);
            $this->skipPresenter($temporarySkipPresenter);
            $this->resetModel();
            event(new RepositoryEntityUpdated($this, $role));
            return $this->parserResult($role);
        }
        throw new GeneralException('Não foi possível atualizar o perfil');
    }
    
}
