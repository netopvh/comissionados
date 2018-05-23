@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Auditoria de Transações</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('audit.index') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Auditoria de Transações<a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="POST" id="search-audit" class="form-inline"
                          role="form">
                        <div class="form-group">
                            <label class="display-block">
                                <span class="text-bold">Evento: </span>
                            </label>
                            <select name="event" class="form-control" id="auditEvent">
                                <option value="">Todos os Eventos</option>
                                <option value="created">Novo Registro</option>
                                <option value="updated">Modificação de Registro</option>
                                <option value="deleted">Remoção de Registro</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label class="display-block">
                                <span class="text-bold">Nome do Usuário: </span>
                            </label>
                            <input type="text" class="form-control" id="auditUser" value="">

                        </div>
                        <button type="submit" class="btn btn-primary">Pesquisar</button>
                    </form>
                </div>
                <table class="table table-bordered table-condensed table-hover datatable-highlight" data-form="tblAudit"
                       id="audit">
                    <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Evento</th>
                        <th>Usuário</th>
                        <th>Data</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop
