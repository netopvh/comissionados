<?php

namespace App\Domains\Comissionado\Controllers;

use App\Core\Exceptions\GeneralException;
use App\Domains\Comissionado\Repositories\Contracts\GrauInstrucaoRepository;
use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;

class GrauInstrucaoController extends Controller
{
    /** @var  GrauInstrucaoRepository */
    private $grauInstrucaoRepository;

    /**
     * GrauInstrucaoController constructor.
     * @param GrauInstrucaoRepository $grauInstrucaoRepo
     */
    public function __construct(GrauInstrucaoRepository $grauInstrucaoRepo)
    {
        $this->grauInstrucaoRepository = $grauInstrucaoRepo;
    }

    /**
     * Display a listing of the GrauInstrucao.
     *
     * @param Request $request
     * @return mixed
     */
    public function index()
    {
        return view('grau_instrucao.index');
    }

    /**
     * Show the form for creating a new GrauInstrucao.
     *
     * @return View
     */
    public function create()
    {
        return view('grau_instrucao.create');
    }

    /**
     * Store a newly created GrauInstrucao in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
       try{
            $this->grauInstrucaoRepository->create($request->all());
            return redirect()
                ->route('comissionados.instrucao.index')
                ->withSuccess(config('messages.create'));
        }catch (ValidatorException $e){
            return redirect()
                ->back()
                ->with('errors',$e->getMessageBag());
        }
    }

    /**
     * Display the specified GrauInstrucao.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        try {
            $instrucao = $this->grauInstrucaoRepository->findExists('id',$id);
            return view('grau_instrucao.show')
                ->withGrauInstrucao($instrucao);
        } catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.instrucao.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified GrauInstrucao.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        try {
            $instrucao = $this->grauInstrucaoRepository->findExists('id',$id);
            return view('grau_instrucao.edit')
                ->withGrauInstrucao($instrucao);
        } catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.instrucao.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified GrauInstrucao in storage.
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        try {
            $this->grauInstrucaoRepository->findExists('id',$id);
            $this->grauInstrucaoRepository->update($request->all(), $id);
            return redirect()
                ->route('comissionados.instrucao.index')
                ->withSuccess(config('messages.create'));
        } catch (ValidatorException $e){
            return redirect()
                ->back()
                ->withErrors($e->getMessageBag());
        }catch (GeneralException $e) {
            return redirect()
                ->route('comissionados.instrucao.index')
                ->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified GrauInstrucao from storage.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $this->grauInstrucaoRepository->find($id);

            $this->grauInstrucaoRepository->delete($id);

            return redirect()->back()->with('success','Registro removido com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.instrucao.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }
}
