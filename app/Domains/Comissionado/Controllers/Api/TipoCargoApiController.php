<?php

namespace App\Domains\Comissionado\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\TipoCargoRepository;
use Yajra\DataTables\DataTables;

class TipoCargoApiController extends Controller
{

    /**
     * @var TipoCargoRepository
     */
    private $tipoCargoRepository;

    /**
     * TipoCargoApiController constructor.
     * @param TipoCargoRepository $tipoCargoRepository
     */
    public function __construct(TipoCargoRepository $tipoCargoRepository)
    {
        $this->middleware('auth:api');
        $this->tipoCargoRepository = $tipoCargoRepository;
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        $query = $this->tipoCargoRepository->query();

        return $dataTables->eloquent($query)
            ->addColumn('action',function($tipo){
                return view('tipo_cargos.action')->withTipo($tipo);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

}