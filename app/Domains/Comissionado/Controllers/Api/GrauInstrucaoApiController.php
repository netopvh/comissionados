<?php

namespace App\Domains\Comissionado\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\GrauInstrucaoRepository;
use Yajra\DataTables\DataTables;

class GrauInstrucaoApiController extends Controller
{

    /**
     * @var GrauInstrucaoRepository
     */
    private $grauInstrucaoRepository;

    /**
     * GrauInstrucaoApiController constructor.
     * @param GrauInstrucaoRepository $grauInstrucaoRepository
     */
    public function __construct(GrauInstrucaoRepository $grauInstrucaoRepository)
    {
        $this->middleware('auth:api');
        $this->grauInstrucaoRepository = $grauInstrucaoRepository;
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        $query = $this->grauInstrucaoRepository->query();

        return $dataTables->eloquent($query)
            ->addColumn('action',function($instrucao){
                return view('grau_instrucao.action')->withInstrucao($instrucao);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

}