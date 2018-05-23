<ul class="icons-list">
    @permission('ver-cargos-comissionados')
    <li><a href="{{ route('comissionados.cargos.show',['id' => $cargos->id]) }}"
           data-popup="tooltip" title="Visualizar" data-placement="bottom"><i
                    class="icon-eye"></i></a>
    </li>
    @endpermission
    @permission('atualizar-cargos-comissionados')
    <li><a href="{{ route('comissionados.cargos.edit',['id' => $cargos->id]) }}"
           data-popup="tooltip" title="Editar" data-placement="bottom"><i
                    class="icon-pencil7"></i></a>
    </li>
    @endpermission
    @permission('remover-cargos-comissionados')
    <li>
        <form class="form-delete"
              action="{{ route('comissionados.cargos.destroy',['id' => $cargos->id]) }}"
              method="POST">
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