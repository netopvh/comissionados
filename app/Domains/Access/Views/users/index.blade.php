@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Usuários</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('users.index') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    @permission('criar-usuario')
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary legitRipple"><i class="icon-database-add"></i> Novo</a>
                    @endpermission
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <table class="table table-bordered table-condensed table-hover datatable-highlight" data-form="tblUsersRowIdentify" id="tblUsers">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
