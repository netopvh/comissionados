@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm"
         style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Perfis de Usuário</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('roles.create') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <button class="btn btn-primary legitRipple" id="btnCreateRole"><i class="icon-database-insert"></i>
                        Gravar
                    </button>
                    <a class="btn btn-info legitRipple" href="{{ route('roles.index') }}"><i
                                class="icon-reply"></i> Retornar</a>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('roles.store') }}" id="formCreateRole" class="form-validate" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12">
                                                <span class="text-bold">Nome:</span>
                                                <input type="text" name="display_name" value="{{ old('display_name') }}"
                                                       class="form-control text-uppercase" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="col-md-12">
                                                <span class="text-bold">Descrição:</span>
                                                <input type="text" name="description" value="{{ old('description') }}"
                                                       class="form-control text-uppercase">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="controls text-right">
                                    <button class="btn-sm btn-primary" id="btn-action"
                                            onclick="event.preventDefault();">Expandir
                                    </button>
                                </div>
                                <div class="well border-left-info border-left-lg">
                                    <ul class="tree">
                                        @foreach($groups as $group)
                                            @if(is_null($group->parent_id))
                                                <li class="has">
                                                    <label>{{ $group->name }}</label>
                                                    @if(count($group->children))
                                                        <ul>
                                                            @foreach($permissions as $permission)
                                                                @if($group->id === $permission->group_id)
                                                                    <li class="has">
                                                                        <input type="checkbox"
                                                                               name="permissions[]"
                                                                               class="styled"
                                                                               value="{{ $permission->id }}">
                                                                        <label>{{ $permission->display_name }}</label>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            @foreach($group->children as $child)
                                                                <li>
                                                                    <label>{{ $child->name }}</label>
                                                                    <ul>
                                                                        @foreach($permissions as $permission)
                                                                            @if($child->id === $permission->group_id)
                                                                                <li class="has">
                                                                                    <input type="checkbox"
                                                                                           class="styled"
                                                                                           name="permissions[]"
                                                                                           value="{{ $permission->id }}">
                                                                                    <label>{{ $permission->display_name }}</label>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
