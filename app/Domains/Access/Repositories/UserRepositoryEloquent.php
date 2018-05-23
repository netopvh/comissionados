<?php

namespace App\Domains\Access\Repositories;

use App\Core\Exceptions\GeneralException;
use App\Core\Repositories\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Domains\Access\Models\User;
use App\Domains\Access\Validators\UserValidator;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use Prettus\Repository\Traits\CacheableRepository;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Domains\Access\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository, CacheableInterface
{
    use CacheableRepository;
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @return string
     */
    public function validator()
    {
        return UserValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param array $attributes
     * @return mixed
     * @throws GeneralException
     */
    public function create(array $attributes)
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

        $attributes['password'] = bcrypt($attributes['password']);
        $user = parent::create($attributes);
        if ($user){
            $user->attachRole($attributes['role_id']);
            $this->resetModel();
            event(new RepositoryEntityCreated($this, $user));
            return $this->parserResult($user);
        }else{
            throw new GeneralException('Não foi possível cadastrar usuário');
        }
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
        //dd($attributes);

        $user = parent::update($attributes, $id);
        if($user){
            $this->skipPresenter($temporarySkipPresenter);
            $user->detachRoles();
            $user->attachRole($attributes['role_id']);
            $this->resetModel();

            event(new RepositoryEntityUpdated($this, $user));

            return $this->parserResult($user);
        }else{
            throw new GeneralException('Não foi possível atualizar usuário');
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findUser($id)
    {
        $result = $this->model->newQuery()->where('id', $id)->get()->first();
        if($result->roles()->count() <= 0){
            $result->roles()->attach(3);
        }
        if (is_null($result)) {
            throw new GeneralException("Não foi localizado nenhum registro no banco de dados");
        }
        return $result;
    }

    public function setUserStatus(array $attributes, $id)
    {
        $user = $this->model->find($id);
        $user->fill($attributes);
        if(!$user->save()){
            throw new GeneralException('Erro ao Definir Status do Usuário');
        }
    }
    
}
