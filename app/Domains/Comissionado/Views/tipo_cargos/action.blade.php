<ul class="icons-list">
    @permission('ver-tipo-cargos')
    <li><a href="{{ route('comissionados.tipos.show',['id' => $tipo->id]) }}"
           data-popup="tooltip" title="Visualizar" data-placement="bottom"><i
                    class="icon-eye"></i></a>
    <li>
    @endpermission
    @permission('atualizar-tipo-cargos')
    <li><a href="{{ route('comissionados.tipos.edit',['id' => $tipo->id]) }}"
           data-popup="tooltip" title="Editar" data-placement="bottom"><i
                    class="icon-pencil7"></i></a>
    </li>
    @endpermission
    @permission('remover-tipo-cargos')
    <li>
        <form class="form-delete"
              action="{{ route('comissionados.tipos.destroy',['id'=>$tipo->id]) }}"
              method="POST">
            <input type="hidden" name="id" value="">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button name="delete-modal" data-popup="tooltip" title="Remover" data-placement="bottom" class="delete"
                    style="padding: 0 0 0 0;border: 0; background: transparent;">
                <i
                        class="icon-trash" style="padding-top: 2px;"></i>
            </button>
        </form>
    </li>
    @endpermission
</ul>