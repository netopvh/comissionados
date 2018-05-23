<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 10/04/2018
 * Time: 17:55
 */

namespace App\Core\Repositories;


use Prettus\Repository\Contracts\RepositoryCriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

interface BaseRepositoryContract extends RepositoryInterface, RepositoryCriteriaInterface
{

    public function query();
    public function findWithoutFail($id, $columns = ['*']);
    public function select(array $colunms = ['*']);
    public function findExists(string $column, $value);

}