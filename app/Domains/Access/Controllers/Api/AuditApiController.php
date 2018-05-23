<?php

namespace App\Domains\Access\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Domains\Access\Repositories\Contracts\AuditRepository;

class AuditApiController extends Controller
{
    /**
     * @var AuditRepository
     */
    protected $auditRepository;

    /**
     * AuditApiController constructor.
     * @param AuditRepository $auditRepository
     */
    public function __construct(AuditRepository $auditRepository)
    {
        $this->middleware('auth:api');
        $this->auditRepository = $auditRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index(DataTables $dataTables, Request $request)
    {
        $model = $this->auditRepository->with('users')->select(['id','event','user_id','auditable_type','ip_address','created_at']);

        return $dataTables->eloquent($model)
            ->filter(function ($audit) use ($request){
                if($request->has('event')){
                    $audit->where('event', 'like', "%{$request->get('event')}%");
                }
                if($request->has('name')){
                    $audit->whereHas('users', function ($query) use ($request){
                        $query->where('nome', 'like', "%{$request->get('name')}%");
                    });
                }
            })
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
