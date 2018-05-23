@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Validação de Servidores</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('comissionados.validacao.index') }}
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
                </div>
                <div class="panel-body">
                    <form method="POST" id="searchServidorValidacao" class="form-inline" role="form">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control upper" id="servidorNome" placeholder="Pesquisar nome">
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="validado" id="servidorValidado" class="form-control">
                                <option value="N">Não Validado</option>
                                <option value="S">Validado</option>
                                <option value="P">Pendente</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </form>
                </div>
                <div class="table-responsive">
                        <table id="tblValidacao" class="table table-framed table-bordered table-striped text-size-base">
                            <thead>
                            <tr>
                                <th >Matrícula</th>
                                <th>Nome Completo</th>
                                <th>Lotação</th>
                                <th>Tipo</th>
                                <th>Validado</th>
                                <th class="text-center">Ações</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
            </div>
        </div>
    </div>
@stop