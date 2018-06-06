<?php

namespace App\Domains\Comissionado\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\RegimeTrabRepository;
use Yajra\DataTables\DataTables;

class RegimeTrabApiController extends Controller
{

    /**
     * @var RegimeTrabRepository
     */
    private $regimeTrabRepository;

    /**
     * RegimeTrabApiController constructor.
     * @param RegimeTrabRepository $regimeTrabRepository
     */
    public function __construct(RegimeTrabRepository $regimeTrabRepository)
    {
        $this->middleware('auth:api');
        $this->regimeTrabRepository = $regimeTrabRepository;
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        $query = $this->regimeTrabRepository->query();

        return $dataTables->eloquent($query)
            ->addColumn('action',function($regime){
                return view('regime_trabalho.action')->withRegime($regime);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

}