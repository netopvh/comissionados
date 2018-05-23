<?php

namespace App\Domains\Access\Controllers;

use App\Domains\Access\Repositories\Contracts\PermissionGroupRepository;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Repositories\Contracts\PermissionRepository;
use Prettus\Validator\Exceptions\ValidatorException;

class PermissionGroupController extends Controller
{
    /**
     * @var PermissionGroupRepository
     */
    protected $permissionsGroupRepository;

    /**
     * PermissionController constructor.
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(PermissionGroupRepository $permissionGroupRepository)
    {
        $this->permissionsGroupRepository = $permissionGroupRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try{
            $this->permissionsGroupRepository->create($request->all());
            return redirect()->route('permissions.index')
                ->withSuccess(config('messages.create'));
        }catch (ValidatorException $e){
            return redirect()->route('permissions.index')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

}