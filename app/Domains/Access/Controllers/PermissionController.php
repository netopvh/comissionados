<?php

namespace App\Domains\Access\Controllers;

use App\Core\Exceptions\GeneralException;
use App\Domains\Access\Repositories\Contracts\PermissionGroupRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Domains\Access\Repositories\Contracts\PermissionRepository;

class PermissionController extends Controller
{
    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @var PermissionGroupRepository
     */
    protected $permissionsGroupRepository;

    /**
     * PermissionController constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionRepository $permissionRepository, PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionRepository = $permissionRepository;
        $this->permissionsGroupRepository = $permissionGroupRepository;
    }

    /**
     * Tela incial das permissoes
     *
     * @return mixed
     */
    public function index()
    {
        if(! Session::has('permission')){
            Session::flash('group','active');
        }
        return view('permissions.index')
            ->withGroups($this->permissionsGroupRepository->with(['children','parent'])->all())
            ->withPermissions($this->permissionRepository->all());
    }

    public function create()
    {
        return view('permissions.create')
            ->withGroups($this->permissionsGroupRepository->all());
    }
    
    public function store(Request $request)
    {
        try{
            $this->permissionRepository->create($request->all());
            return redirect()->route('permissions.index')
                ->withPermission('active')
                ->withSuccess(config('messages.create'));
        }catch (ValidatorException $e){
            return redirect()->route('permissions.create')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

    public function edit($id)
    {
        try{
            $permission = $this->permissionRepository->findExists('id',$id);
            return view('permissions.edit')
                ->withGroups($this->permissionsGroupRepository->all())
                ->withPermission($permission);
        }catch(GeneralException $e){
            return redirect()->route('permissions.index')
                ->withErrors($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $this->permissionRepository->update($request->all(), $id);
            return redirect()->route('permissions.index')
                ->withPermission('active')
                ->withSuccess(config('messages.update'));
        }catch (ValidatorException $e){
            return redirect()->route('permissions.create')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

}