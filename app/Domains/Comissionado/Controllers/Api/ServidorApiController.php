<?php
/**
 * Created by PhpStorm.
 * User: 00545841240
 * Date: 23/05/2018
 * Time: 11:53
 */

namespace App\Domains\Comissionado\Controllers\Api;


use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\ServidorRepository;
use Yajra\DataTables\DataTables;

class ServidorApiController extends Controller
{

    private $servidorRepository;

    public function __construct(ServidorRepository $servidorRepository)
    {
        $this->middleware('auth:api');
        $this->servidorRepository = $servidorRepository;
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(DataTables $dataTables)
    {
        $query = $this->servidorRepository->with(['secretaria','tipocargo','cargocomissionado'])->query();

        return $dataTables->eloquent($query)
            ->addColumn('lotacao',function ($servidor){
                return $servidor->secretaria->descricao;
            })
            ->addColumn('tipo',function ($servidor){
                return $servidor->tipocargo->descricao;
            })
            ->addColumn('cargo',function ($servidor){
                return $servidor->cargocomissionado->descricao;
            })
            ->addColumn('action',function($servidor){
                return view('servidores.buttons.action')->with('servidor',$servidor);
            })
            ->toJson();
    }

}