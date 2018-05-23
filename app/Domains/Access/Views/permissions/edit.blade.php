@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Permissões de Usuário</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('permissions.edit') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <button class="btn btn-primary legitRipple" id="btnUpdatePermission"><i class="icon-database-insert"></i>
                        Gravar
                    </button>
                    <a class="btn btn-info legitRipple" href="{{ route('permissions.index') }}"><i
                                class="icon-reply"></i> Retornar</a>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('permissions.update',['id' => $permission->id]) }}" id="formUpdatePermission" class="form-validate" method="post"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12">
                                                <span class="text-bold">Nome: *</span>
                                                <input type="text" name="display_name" value="{{ $permission->display_name }}"
                                                       class="form-control text-uppercase"
                                                       placeholder="Exemplo: CRIAR USUARIO" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-md-12">
                                                <span class="text-bold">Grupo: *</span>
                                                <select name="group_id" class="select" required>
                                                    <option value="">Selecione..</option>
                                                    @foreach($groups as $group)
                                                        <option value="{{ $group->id }}" {{ $permission->group_id === $group->id?'selected':'' }}>{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
