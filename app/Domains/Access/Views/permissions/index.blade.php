@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Permissões de Usuário</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('permissions.index') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-9">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <h6 class="panel-title">Permissões<a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="tabbable tab-content-bordered">
                    <ul class="nav nav-tabs nav-tabs-highlight nav-justified">
                        <li class="{{ Session::has('group')? Session::get('group') :''  }}">
                            <a href="#permissions-group" data-toggle="tab" aria-expanded="{{ Session::has('group')? 'true' :'false'  }}">
                                Grupos de Permissões
                            </a>
                        </li>
                        <li class="{{ Session::has('permission')? Session::get('permission') :''  }}">
                            <a href="#permissions" data-toggle="tab" aria-expanded="{{ Session::has('permission')? 'true' :'false'  }}">
                                Permissões
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane has-padding {{ Session::has('group')? Session::get('group') :''  }}" id="permissions-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <fieldset>
                                        <legend>Cadastrar Grupo</legend>
                                        <form action="{{ route('groups.store') }}" class="form-validate" method="post">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-8">
                                                        <span class="text-bold">Nome:</span>
                                                        <input type="text" name="name" class="form-control" required>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <label class="col-md-8">
                                                        <span class="text-bold">Referência:</span>
                                                        <select name="parent_id" class="select">
                                                            <option value="">Selecione...</option>
                                                            @foreach($groups as $group)
                                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary legitRipple"><i
                                                                class="icon-database-insert"></i> Cadastrar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <div class="tree-default well border-left-info border-left-lg">
                                        <ul>
                                            @foreach($groups as $group)
                                                @if(is_null($group->parent_id))
                                                    <li data-jstree='{"opened":true}'>{{ $group->name }}
                                                        @if(count($group->children))
                                                            <ul>
                                                                @foreach($permissions as $permission)
                                                                    @if($group->id === $permission->group_id)
                                                                        <li data-jstree='{"icon":"icon-unlocked2"}'>
                                                                            {{ $permission->display_name }}
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                                @foreach($group->children as $child)
                                                                    <li>{{ $child->name }}
                                                                        <ul>
                                                                            @foreach($permissions as $permission)
                                                                                @if($child->id === $permission->group_id)
                                                                                    <li data-jstree='{"icon":"icon-unlocked2"}'>{{ $permission->display_name }}</li>
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
                        </div>

                        <div class="tab-pane has-padding {{ Session::has('permission')? Session::get('permission') :''  }}" id="permissions">
                            @permission('criar-permissoes')
                            <a href="{{ route('permissions.create') }}" class="btn btn-primary legitRipple"><i
                                        class="icon-add"></i> Novo</a>
                            @endpermission
                            <br><br>
                            <table class="table table-bordered table-condensed table-hover datatable-highlight"
                                   data-form="tblPermissions" id="permission">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Grupo</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
