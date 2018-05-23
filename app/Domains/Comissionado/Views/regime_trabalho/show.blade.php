@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Regime de Trabalho</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('comissionados.regime.show') }}
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
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label class="display-block">Descrição:</label>
                            <span class="text-bold">{{ $regimeTrab->descricao }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <legend>Servidores Vinculados</legend>
                                <table class="table table-condensed">
                                    <thead>
                                        <tr>
                                            <th width="120">Matrícula</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       @if(count($regimeTrab->servidores))
                                            @foreach($regimeTrab->servidores as $servidor)
                                                <tr>
                                                    <td>{{  $servidor->matricula }}</td>
                                                    <td>{{  $servidor->nome }}</td>
                                                </tr>
                                            @endforeach
                                       @else
                                            <tr>
                                                <td colspan="2" class="text-center text-bold">Sem registros a serem exibidos</td>
                                            </tr> 
                                       @endif
                                    </tbody>
                                </table>
                            </fieldset>
                            <div class="text-right">
                                <a href="{{ route('comissionados.regime.index') }}" class="btn btn-info legitRipple"><i class="icon-database-arrow"></i> Retornar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop