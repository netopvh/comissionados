<?php
/**
 * Created by PhpStorm.
 * User: 00545841240
 * Date: 23/05/2018
 * Time: 13:36
 */

namespace App\Domains\Comissionado\Controllers\Api;

use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\CargoComissionadoRepository;
use Yajra\DataTables\DataTables;

class CargoComissionadoApiController extends Controller
{

    private $cargoComissionadoRepository;

    public function __construct(CargoComissionadoRepository $cargoComissionadoRepository)
    {
        $this->middleware('auth:api');
        $this->cargoComissionadoRepository = $cargoComissionadoRepository;
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        $query = $this->cargoComissionadoRepository->query();

        return $dataTables->eloquent($query)
            ->addColumn('action',function($cargos){
                return view('cargo_comissionados.action')->withCargos($cargos);
            })
            ->rawColumns(['action'])
            ->toJson();
    }

}