@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm"
         style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
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
                    <a href="{{ route('comissionados.tipos.create') }}"
                       class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                    @endpermission
                </div>
                <table id="tblTipoCargos" class="table table-framed table-condensed table-bordered table-striped text-size-base">
                    <thead>
                    <tr>
                        <th width="70">#</th>
                        <th>Nome Completo</th>
                        <th width="104" class="text-center">Ações</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop