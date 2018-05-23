@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Designar Validador</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('comissionados.validacao.create') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-5">
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
                    <form action="{{ route('comissionados.validacao.designar.store') }}" id="formSend" class="form-validate" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <fieldset>
                            <legend class="text-semibold">selecione os servidores que serão designados para validação</legend>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-bold">Servidores:</label>
                                        <select name="validadores[]" multiple="multiple" class="form-control listbox" required>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}"{{ selected($user->id,$validador) }}>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="text-right">
                            <a href="{{ route('comissionados.validacao.designar') }}" class="btn btn-info legitRipple"><i class="icon-database-arrow"></i> Retornar</a>
                            <button type="submit" class="btn btn-primary legitRipple">Salvar Registro <i
                                        class="icon-database-insert position-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop