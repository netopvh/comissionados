<?php

namespace App\Domains\Comissionado\Controllers;

use App\Domains\Comissionado\Repositories\Contracts\ServidorRepository;
use App\Domains\Access\Repositories\Contracts\UserRepository;
use App\Core\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Validator\Exceptions\ValidatorException;
use Yajra\DataTables\DataTables;
use App\Domains\Access\Models\User;

class ValidacaoController extends Controller
{
    /** @var  ServidorRepository */
    private $servidorRepository;
    /** @var  userRepository */
    private $userRepository;

    public function __construct(ServidorRepository $servidorRepo,UserRepository $userRepo)
    {
        //$this->middleware('auth');
        $this->servidorRepository = $servidorRepo;
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Servidor.
     *
     * @param Request $request
     * @return
     */
    public function index()
    {
        return view('validacao.index');
    }


    /**
     * Show the form for creating a new Servidor.
     *
     * @return mixed
     */
    public function getServidor($id)
    {
        try {
            return view('validacao.show')->with('servidor', $this->servidorRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->route('comissionados.validacao.index')->with('errors', 'Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Update the specified Servidor in storage.
     *
     * @param  int $id
     * @param Request $request
     *
     * @return mixed
     */
    public function postValidacao($id, Request $request)
    {
        try {
            $this->servidorRepository->find($id);

            $this->servidorRepository->update($request->all(), $id);

            return redirect()->route('comissionados.validacao.index')->with('success', 'Registro atualizado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('comissionados.validacao.index')->with('errors', 'Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Show the form for creating a new Servidor.
     *
     * @return mixed
     */
    public function getRevalidar($id)
    {
        try {
            return view('validacao.show')->with('servidor', $this->servidorRepository->find($id));
        } catch (\Exception $e) {
            return redirect()->route('comissionados.validacao.index')->with('errors', 'Nenhum registro localizado no banco de dados');
        }
    }

    /**
     * Show the form for creating a new Servidor.
     *
     * @return mixed
     */
    public function getDesignacao()
    {
        try {
            $user = $this->userRepository->with('validadores')->find(auth()->user()->id);

            if(counter($user) && is_null($user->secretaria_id)){
                return redirect('/dashboard/users/secretaria');
            }else{
                return view('validacao.designar')->with('user',$user);
            }
        } catch (\Exception $e) {
            return redirect()->route('comissionados.validacao.index')->with('errors', $e->getMessage());
        }
    }

    public function getDesignacaoCreate()
    {
        try {

            $validadores = $this->userRepository->with('validadores')->find(auth()->user()->id,['id'])->validadores;
            if (count($validadores)>=1) {
                $validoresId = [];
                foreach ($validadores as $validador) {
                    $validadoresId[] = $validador->id;
                }
            }else{
                $validadoresId="";
            }

            return view('validacao.create')
            ->with('users', $this->userRepository->query()->where('secretaria_id', auth()->user()->secretaria_id)->whereNotIn('id',[auth()->user()->id])->get())
            ->with('validador',$validadoresId);
        } catch (\Exception $e) {
            return redirect()->route('comissionados.validacao.designar')->with('errors', $e->getMessage());
        }
    }

    public function getDesignacaoDestroy($id, User $userModel)
    {
        //Captura o Usuário Principal
        $user = $userModel->find(auth()->user()->id);
        //Remove dependetes do Usuário Principal
        $user->validadores()->detach($id);
        //Captura o usuário validador
        $userValidator = $userModel->find($id);
        //Remove permissões de validacao
        $userValidator->permissions()->detach();        
        return redirect()->back()->with('success', 'Registro atualizado com sucesso');
    }

    public function postDesignacao(Request $request, User $userModel)
    {
        try {
            //Recebe array com usuários
            $attributes = $request->validadores;
            //Localiza o usuário autenticado
            $user = $userModel->find(auth()->user()->id);
            //Sincroniza os usuários validadores
            $user->validadores()->sync($attributes);
            //Sincroniza as Permissões do usuários
            foreach ($attributes as $useValidator) {
                $userAtt = $userModel->find($useValidator);
                $userAtt->permissions()->sync(config('laratrust.validation_permissions'));
            }
            return redirect()->route('comissionados.validacao.designar')->with('success', 'Registro atualizado com sucesso');
            
        } catch (\Exception $e) {
            return redirect()->route('comissionados.validacao.designar')->with('errors', $e->getMessage());
        }
    }
}
