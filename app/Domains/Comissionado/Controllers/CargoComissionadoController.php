<?php

namespace App\Domains\Comissionado\Controllers;

use App\Core\Exceptions\GeneralException;
Use App\Domains\Comissionado\Repositories\Contracts\CargoComissionadoRepository;
use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CargoComissionadoController extends Controller
{
    /** @var  CargoComissionadoRepository */
    private $cargoComissionadoRepository;

    /**
     * CargoComissionadoController constructor.
     * @param CargoComissionadoRepository $cargoComissionadoRepo
     */
    public function __construct(CargoComissionadoRepository $cargoComissionadoRepo)
    {
        $this->cargoComissionadoRepository = $cargoComissionadoRepo;
    }

    /**
     * Display a listing of the CargoComissionado.
     *
     * @return mixed
     */
    public function index()
    {
        return view('cargo_comissionados.index');
    }

    /**
     * Show the form for creating a new CargoComissionado.
     *
     * @return string
     */
    public function create()
    {
        return view('cargo_comissionados.create');
    }

    /**
     * Store a newly created CargoComissionado in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        try{
            $this->cargoComissionadoRepository->create($request->all());
            return redirect()
                ->route('comissionados.cargos.index')
                ->withSuccess(config('messages.create'));
        }catch (ValidatorException $e){
            return redirect()
                ->back()
                ->withErrors($e->getMessageBag());
        }
    }

    /**
     * Display the specified CargoComissionado.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        try {
            $cargo = $this->cargoComissionadoRepository->findExists('id',$id);
            return view('cargo_comissionados.show')
                ->withCargoComissionado($cargo);
        } catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.cargos.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified CargoComissionado.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        try {
            $cargo = $this->cargoComissionadoRepository->findExists('id',$id);
            return view('cargo_comissionados.edit')
                ->withCargoComissionado($cargo);
        } catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.cargos.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified CargoComissionado in storage.
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        try {
            $this->cargoComissionadoRepository->findExists('id',$id);
            $this->cargoComissionadoRepository->update($request->all(), $id);
            return redirect()->route('comissionados.cargos.index')
                ->withSuccess(config('messages.create'));
        }catch (ValidatorException $e){
            return redirect()
                ->back()
                ->withErrors($e->getMessageBag());
        } catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.cargos.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified CargoComissionado from storage.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $this->cargoComissionadoRepository->findExists('id',$id);
            $this->cargoComissionadoRepository->delete($id);
            return redirect()
                ->back()
                ->withSuccess(config('messages.delete'));
        } catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.cargos.index')
                ->withErrors($e->getMessage());
        }
    }
}
