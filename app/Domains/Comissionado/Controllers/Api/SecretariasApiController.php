<?php

namespace App\Domains\Comissionado\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\SecretariasRepository;
use Yajra\DataTables\DataTables;

class SecretariasApiController extends Controller
{

    /**
     * @var SecretariasRepository
     */
    private $secretariasRepository;

    /**
     * SecretariasApiController constructor.
     * @param SecretariasRepository $secretariasRepository
     */
    public function __construct(SecretariasRepository $secretariasRepository)
    {
        $this->middleware('auth:api');
        $this->secretariasRepository = $secretariasRepository;
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        $query = $this->secretariasRepository->query();

        return $dataTables->eloquent($query)
            ->addColumn('action',function($secretaria){
                return view('secretarias.action')->withSecretaria($secretaria);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

}