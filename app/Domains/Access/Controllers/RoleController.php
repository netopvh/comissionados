<?php
namespace App\Domains\Access\Controllers;

use App\Core\Exceptions\GeneralException;
use App\Core\Http\Controllers\Controller;
use App\Domains\Access\Models\Role;
use App\Domains\Access\Repositories\Contracts\PermissionGroupRepository;
use App\Domains\Access\Repositories\Contracts\PermissionRepository;
use App\Domains\Access\Repositories\Contracts\RoleRepository;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @var PermissionGroupRepository
     */
    protected $permissionGroupRepository;

    /**
     * Instancia objeto do repositorio
     *
     * RoleController constructor.
     * @param RoleRepository $roleRepository
     */
    public function __construct(
        RoleRepository $roleRepository,
        PermissionRepository $permissionRepository,
        PermissionGroupRepository $permissionGroupRepository
    )
    {
        $this->middleware('auth');
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
        $this->permissionGroupRepository = $permissionGroupRepository;
    }
    /**
     * Exibe a pagina inicial dos usuários
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('roles.index');
    }

    /**
     * Exibe formulário de criação de novo usuários
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('roles.create')
            ->withGroups($this->permissionGroupRepository->with(['children','parent'])->all())
            ->withPermissions($this->permissionRepository->all());
    }

    /**
     * Salva registro no banco de dados
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try{
            dd($request->all());
            $this->roleRepository->create($request->all());
            return redirect()->route('roles.index')
                ->withSuccess(config('messages.create'));
        }catch (ValidatorException $e){
            return redirect()->route('roles.create')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

    /**
     * Localiza registro para edição
     *
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function edit($id)
    {
        try{
            $role = $this->roleRepository->with('permissions')->findExists('id',$id);
            return view('roles.edit')
                ->withGroups($this->permissionGroupRepository->with(['children','parent'])->all())
                ->withPermissions($this->permissionRepository->all())
                ->withUserPermissions($this->getPermissions($role))
                ->withRole($role);
        }catch(GeneralException $e){
            return redirect()->route('roles.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Atualiza registro no banco de dados
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try{
            $this->roleRepository->update($request->all(), $id);
            return redirect()->route('roles.index')
                ->withSuccess(config('messages.update'));
        }catch (ValidatorException $e){
            return redirect()->route('roles.create')
                ->withErrors($e->getMessageBag())
                ->withInput();
        }
    }

    /**
     * Pega todoas as permissões de acordo com o perfil do usuario
     *
     * @param Role $role
     * @return array
     */
    private function getPermissions(Role $role): array
    {
        $userPermissions = [];
        foreach ($role->permissions as $permission) {
            $userPermissions[] = $permission->id;
        }
        return $userPermissions;
    }
}