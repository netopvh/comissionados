<ul class="icons-list">
    @permission('ver-regime-trabalho')
    <li><a href="{{ route('comissionados.regime.show',['id' => $regime->id]) }}"
           data-popup="tooltip" title="Visualizar" data-placement="bottom"><i
                class="icon-eye"></i></a>
    <li>
        @endpermission
        @permission('atualizar-regime-trabalho')
    <li><a href="{{ route('comissionados.regime.edit',['id' => $regime->id]) }}"
           data-popup="tooltip" title="Editar" data-placement="bottom"><i
                class="icon-pencil7"></i></a>
    </li>
    @endpermission
    @permission('remover-regime-trabalho')
    <li>
        <form class="form-delete"
              action="{{ route('comissionados.regime.destroy',['id'=>$regime->id]) }}"
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