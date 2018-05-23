@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Perfis de Usuário</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('roles.index') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    @permission('criar-perfil')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary legitRipple"><i class="icon-add"></i> Novo</a>
                    @endpermission
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <table class="table table-bordered table-condensed table-hover datatable-highlight" data-form="tblRoles" id="roles">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descricao</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
