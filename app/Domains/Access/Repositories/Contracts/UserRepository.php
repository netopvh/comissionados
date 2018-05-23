<?php

namespace App\Domains\Access\Repositories\Contracts;

use App\Core\Repositories\BaseRepositoryContract;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Domains\Access\Repositories\Contracts;
 */
interface UserRepository extends BaseRepositoryContract
{
    public function findUser($id);
    public function setUserStatus(array $attributes, $id);
}
