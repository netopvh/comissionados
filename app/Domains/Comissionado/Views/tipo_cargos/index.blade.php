@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Tipos de Cargos</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('comissionados.tipos.index') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                    <br>
                    @permission('criar-tipo-cargos')
                    <a href="{{ route('comissionados.tipos.create') }}" class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                    @endpermission
                </div>
                <table class="table table-framed table-bordered table-striped text-size-base" data-form="deleteForm">
                        <thead>
                        <tr>
                            <th width="70">#</th>
                            <th>Nome Completo</th>
                            <th width="104" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tipoCargos))
                            @foreach($tipoCargos as $cargo)
                                <tr>
                                    <td>{{ $cargo->id }}</td>
                                    <td>{{ $cargo->descricao }}</td>
                                    <td>
                                        <ul class="icons-list">
                                            @permission('ver-tipo-cargos')
                                            <li><a href="{{ route('comissionados.tipos.show',['id' => $cargo->id]) }}"
                                                   data-popup="tooltip" title="Visualizar" data-placement="bottom"><i
                                                            class="icon-eye"></i></a>
                                            <li>
                                            @endpermission
                                            @permission('atualizar-tipo-cargos')
                                            <li><a href="{{ route('comissionados.tipos.edit',['id' => $cargo->id]) }}"
                                                   data-popup="tooltip" title="Editar" data-placement="bottom"><i
                                                            class="icon-pencil7"></i></a>
                                            </li>
                                            @endpermission
                                            @permission('remover-tipo-cargos')
                                            <li>
                                                <form class="form-delete"
                                                      action="{{ route('comissionados.tipos.destroy',['id'=>$cargo->id]) }}"
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
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center text-bold">Sem registros a serem exibidos</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
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