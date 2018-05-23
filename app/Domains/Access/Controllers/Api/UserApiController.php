<?php

namespace App\Domains\Access\Controllers\Api;

use App\Core\Exceptions\GeneralException;
use Illuminate\Http\Request;
use App\Core\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use Illuminate\Support\Str;
use App\Domains\Access\Models\User;

class UserApiController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth:api');
        $this->userRepository = $userRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(DataTables $dataTables)
    {
        $model = $query = User::with('roles')->select('users.*');
        return $dataTables->eloquent($model)
            ->addColumn('active', function ($user){
                return $user->active? '<span class="label label-success">Ativo</span>':'<span class="label label-warning">Inativo</span>';
            })
            ->addColumn('display_name',function (User $user){
                return remove_bars($user->roles->pluck('display_name'));
            })
            ->addColumn('action', function ($user){
                return view('users.actions', compact('user'));
            })
            ->rawColumns(['action','active'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $this->userRepository->setUserStatus($request->all(), $id);
            return null;
        }catch (GeneralException $e){
            return response()->json([
                'error' => $e->getMessage()
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
