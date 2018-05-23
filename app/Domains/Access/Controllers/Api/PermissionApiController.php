<?php
/**
 * Created by PhpStorm.
 * User: Neto
 * Date: 21/04/2018
 * Time: 20:09
 */

namespace App\Domains\Access\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Models\Permission;
use App\Domains\Access\Repositories\Contracts\PermissionRepository;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class PermissionApiController extends Controller
{
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * PermissionApiController constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->middleware('auth:api');
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(DataTables $dataTables)
    {
        $model = $this->permissionRepository->with('groups')->select(['*']);

        return $dataTables->eloquent($model)
            ->addColumn('action', function ($permission){
                return view('permissions.actions', compact('permission'));
            })
            ->rawColumns(['action','status'])
            ->toJson();
    }

}