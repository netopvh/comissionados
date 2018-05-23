<?php

namespace App\Domains\Comissionado\Controllers;

use App\Domains\Comissionado\Repositories\Contracts\ServidorRepository;
use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Prettus\Validator\Exceptions\ValidatorException;
use Yajra\DataTables\DataTables;

class ServidorController extends Controller
{
    /** @var  ServidorRepository */
    private $servidorRepository;

    public function __construct(ServidorRepository $servidorRepo)
    {
        $this->servidorRepository = $servidorRepo;
    }

    /**
     * Display a listing of the Servidor.
     *
     * @param Request $request
     * @return
     */
    public function index()
    {
        return view('servidores.index');
    }

    /**
     * Show the form for creating a new Servidor.
     *
     * @return View
     */
    public function create()
    {	if(in_admin_group() || is_null(auth()->user()->servidor_id)){
			return view('servidores.create');
		}else if(! is_null(auth()->user()->servidor_id)){
            return redirect()->route('comissionados.servidores.show',['id' => auth()->user()->servidor_id]);
        }
    }

    /**
     * Store a newly created Servidor in storage.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        try{
            $this->servidorRepository->create($request->all());
            return redirect()->route('comissionados.servidores.index')->with('success','Registro inserido com sucesso!');
        }catch (ValidatorException $e){
            return redirect()->back()->with('errors',$e->getMessageBag());
        }

    }

    /**
     * Display the specified Servidor.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        try {
            $estcivil = ['Solteiro(a)'=>'S','União Estável'=>'U','Casado(a)'=>'C','Divorciado(a)'=>'D','Viúvo(a)'=>'V'];
            return view('servidores.show')
                ->with('servidor', $this->servidorRepository->find($id))
                ->with('estcivil',$estcivil);
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Show the form for editing the specified Servidor.
     *
     * @param  int $id
     *
     * @return mixed
     */
    public function edit($id)
    {
        try {
            return view('servidores.edit')->with('servidor', $this->servidorRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Update the specified Servidor in storage.
     *
     * @param  int              $id
     * @param Request $request
     *
     * @return mixed
     */
    public function update($id, Request $request)
    {
        try {
            $this->servidorRepository->find($id);

            $this->servidorRepository->update($request->all(), $id);

            return redirect()->route('comissionados.servidores.index')->with('success','Registro atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.servidores.index')->with('errors','Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Remove the specified Servidor from storage.
     *
     * @param  int $id
     *
     * @return integer
     */
    public function destroy($id)
    {
        try {
            $this->servidorRepository->find($id);

            $this->servidorRepository->delete($id);

            return redirect()->back()->with('success','Registro removido com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('errors','Nenhum registro localizado no banco de dados');
        }
    }
}
