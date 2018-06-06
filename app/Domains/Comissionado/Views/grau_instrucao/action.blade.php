<ul class="icons-list">
    @permission('ver-grau-instrucao')
    <li>
        <a href="{{ route('comissionados.instrucao.show',['id' => $instrucao->id]) }}"
           data-popup="tooltip" title="Visualizar" data-placement="bottom"><i
                    class="icon-eye"></i>
        </a>
    </li>
    @endpermission
    @permission('atualizar-grau-instrucao')
    <li>
        <a href="{{ route('comissionados.instrucao.edit',['id' => $instrucao->id]) }}"
           data-popup="tooltip" title="Editar" data-placement="bottom"><i
                    class="icon-pencil7"></i>
        </a>
    </li>
    @endpermission
    @permission('remover-grau-instrucao')
    <li>
        <form class="form-delete"
              action="{{ route('comissionados.instrucao.destroy',['id'=>$instrucao->id]) }}"
              method="POST">
            <input type="hidden" name="id" value="">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete-modal" class="delete"
                    style="padding: 0 0 0 0;border: 0; background: transparent;"><i
                        class="icon-trash" style="padding-top: 2px;"></i></button>
        </form>
    </li>
    @endpermission
</ul>