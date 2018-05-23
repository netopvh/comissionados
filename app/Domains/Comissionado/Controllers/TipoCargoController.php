<?php

namespace App\Domains\Comissionado\Controllers;

use App\Domains\Comissionado\Repositories\Contracts\TipoCargoRepository;
use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Repository\Criteria\RequestCriteria;

class TipoCargoController extends Controller
{
    /** @var  TipoCargoRepository */
    private $tipoCargoRepository;

    public function __construct(TipoCargoRepository $tipoCargoRepo)
    {
        $this->tipoCargoRepository = $tipoCargoRepo;
    }

    /**
     * Display a listing of the TipoCargo.
     *
     * @param Request $request
     * @return
     */
    public function index()
    {
        return view('tipo_cargos.index')
            ->with('tipoCargos',$this->tipoCargoRepository->paginate(8));
    }

    /**
     * Show the form for creating a new TipoCargo.
     *
     * @return View
     */
    public function create()
    {
        return view('tipo_cargos.create');
    }

    /**
     * Store a newly created TipoCargo in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        try{
            $this->tipoCargoRepository->create($request->all());
            return redirect()->route('comissionados.tipos.index')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
    }

    /**
     * Display the specified TipoCargo.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        try {
            return view('tipo_cargos.show')->with('tipoCargo', $this->tipoCargoRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->route('comissionados.tipos.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Show the form for editing the specified TipoCargo.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        try {
            return view('tipo_cargos.edit')->with('tipoCargo', $this->tipoCargoRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->route('comissionados.tipos.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Update the specified TipoCargo in storage.
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        try {
            $this->tipoCargoRepository->find($id);

            $this->tipoCargoRepository->update($request->all(), $id);

            return redirect()->route('comissionados.tipos.index')->with('success','Registro atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.tipos.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Remove the specified TipoCargo from storage.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $this->tipoCargoRepository->find($id);

            $this->tipoCargoRepository->delete($id);

            return redirect()->back()->with('success','Registro removido com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.tipos.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }
}
