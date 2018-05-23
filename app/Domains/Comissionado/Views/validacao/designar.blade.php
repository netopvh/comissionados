@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Designar Validador</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('comissionados.validacao.index') }}
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
                    <a href="{{ route('comissionados.validacao.create') }}" class="btn btn-primary btn-raised legitRipple"><i
                                class="icon-database-add"></i>
                        Cadastrar</a>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="text-bold display-block">Secretário/Responsável:</label>
                                {{ $user->name }}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>Validadores Designados</legend>
                                <table class="table table-condesed table-bordered table-stripe">
                                    <thead>
                                        <tr>
                                            <th>Nome do Servidor</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($user->validadores)>=1)
                                            @foreach($user->validadores as $validador)
                                                <tr>
                                                    <td>{{ $validador->name }}</td>
                                                    <td width="80">
                                                        <a href="/dashboard/validacao/designar/{{ $validador->id }}"
                                                            data-popup="tooltip" title="Remover Permissão" data-placement="bottom">
                                                            <i class="icon-new-tab2"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="2" class="text-center text-bold">Nenhum Servidor Designado</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop