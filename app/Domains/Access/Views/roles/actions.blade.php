@permission('editar-perfil')
<ul class="icons-list">
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <i class="icon-menu9"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="{{ route('roles.edit',['id' => $role->id]) }}"><i class="icon-pencil7"></i> Editar</a></li>
        </ul>
    </li>
</ul>
@endpermission