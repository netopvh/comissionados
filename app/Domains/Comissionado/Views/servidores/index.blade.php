@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Servidores</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('comissionados.servidores.index') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <br>
                    @permission('criar-servidores')
                    <a href="{{ route('comissionados.servidores.create') }}" class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                    @endpermission
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="tblServidores" class="table table-framed table-bordered table-striped text-size-base" data-form="deleteForm">
                            <thead>
                            <tr>
                                <th >Matrícula</th>
                                <th>Nome Completo</th>
                                <th>Lotação</th>
                                <th >Tipo</th>
                                <th>Cargo</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Remoção de registro</h4>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja remover este registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Remover</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@stop