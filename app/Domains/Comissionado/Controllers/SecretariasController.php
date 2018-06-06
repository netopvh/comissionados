<?php

namespace App\Domains\Comissionado\Controllers;

use App\Domains\Comissionado\Repositories\Contracts\SecretariasRepository;
use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Repository\Criteria\RequestCriteria;

class SecretariasController extends Controller
{
    /** @var  SecretariasRepository */
    private $secretariasRepository;

    public function __construct(SecretariasRepository $secretariasRepo)
    {
        $this->secretariasRepository = $secretariasRepo;
    }

    /**
     * Display a listing of the Secretarias.
     *
     * @param Request $request
     * @return mixed
     */
    public function index()
    {
        return view('secretarias.index');
    }

    /**
     * Show the form for creating a new Secretarias.
     *
     * @return View
     */
    public function create()
    {
        return view('secretarias.create');
    }

    /**
     * Store a newly created Secretarias in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        try{
            $this->secretariasRepository->create($request->all());
            return redirect()->route('comissionados.secretarias.index')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }
    }

    /**
     * Display the specified Secretarias.
     *
     * @param  int $id
     *
     * @return View
     */
    public function show($id)
    {
        try {
            return view('secretarias.show')->with('secretaria', $this->secretariasRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->route('comissionados.secretarias.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Show the form for editing the specified Secretarias.
     *
     * @param  int $id
     *
     * @return View
     */
    public function edit($id)
    {
        try {
            return view('secretarias.edit')->with('secretaria', $this->secretariasRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->route('comissionados.secretarias.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Update the specified Secretarias in storage.
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        try {
            $this->secretariasRepository->find($id);

            $this->secretariasRepository->update($request->all(), $id);

            return redirect()->route('comissionados.secretarias.index')->with('success','Registro atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.secretarias.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Remove the specified Secretarias from storage.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $this->secretariasRepository->find($id);

            $this->secretariasRepository->delete($id);

            return redirect()->back()->with('success','Registro removido com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.secretarias.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }
}
