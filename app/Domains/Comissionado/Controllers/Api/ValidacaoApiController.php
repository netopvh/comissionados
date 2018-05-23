<?php
/**
 * Created by PhpStorm.
 * User: 00545841240
 * Date: 23/05/2018
 * Time: 13:11
 */

namespace App\Domains\Comissionado\Controllers\Api;


use App\Core\Http\Controllers\Controller;
use App\Domains\Comissionado\Repositories\Contracts\ServidorRepository;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ValidacaoApiController extends Controller
{

    /**
     * @var ServidorRepository
     */
    private $servidorRepository;

    /**
     * ValidacaoApiController constructor.
     * @param ServidorRepository $servidorRepository
     */
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
    public function index(DataTables $dataTables, Request $request)
    {
        $query = $this->servidorRepository->with(['secretaria', 'tipocargo', 'cargocomissionado'])->query();//->whereNotIn('servidores.id',[auth()->user()->id])

        return $dataTables->eloquent($query)
            ->addColumn('lotacao', function ($servidor) {
                return $servidor->secretaria->descricao;
            })
            ->addColumn('tipo', function ($servidor) {
                return $servidor->tipocargo->descricao;
            })
            ->addColumn('cargo', function ($servidor) {
                return $servidor->cargocomissionado->descricao;
            })
            ->addColumn('validado', function ($servidor) {
                switch ($servidor->validado) {
                    case 'N':
                        return '<span class="label label-warning">Não Validado</span>';
                        break;
                    case 'S':
                        return '<span class="label label-success">Validado</span>';
                        break;
                    case 'P':
                        return '<span class="label label-danger">Pendente</span>';
                        break;
                }
            })
            ->addColumn('action', function ($servidor) {
                return view('validacao.buttons.action')->with('servidor', $servidor);
            })
            ->rawColumns(['validado', 'action'])
            ->filter(function ($servidor) use ($request) {
                if ($request->has('nome')) {
                    $servidor->where('nome', 'like', "%{$request->get('nome')}%");
                }
                if ($request->has('validado')) {
                    $servidor->where('validado', $request->get('validado'));
                }
            })
            ->toJson();
    }

}