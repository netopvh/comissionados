@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm"
         style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Usuários</span></h5>
            </div>
        </div>
        {{ Breadcrumbs::render('users.edit') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default border-grey">
                <div class="panel-heading">
                    <button class="btn btn-primary legitRipple" type="submit" id="btnUpdateUser"><i class="icon-database-insert"></i>
                        Gravar
                    </button>
                    <a class="btn btn-info legitRipple" href="{{ route('users.index') }}"><i
                                class="icon-reply"></i> Retornar</a>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse" class=""></a></li>
                            <li><a data-action="reload"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('users.update',['id' => $user->id]) }}" id="formUpdateUser" class="form-validate" method="post"
                          autocomplete="off">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="text-bold">ID</label>
                                    <input type="text" class="form-control"
                                           value="{{ str_pad($user->id, 5, "0", STR_PAD_LEFT) }}" readonly="">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="text-bold">Login:</label>
                                    <input type="text" class="form-control" value="{{ $user->username }}" readonly
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-bold">Nome:</label>
                                    <input type="text" name="nome" class="form-control text-uppercase"
                                           value="{{ $user->nome }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-bold">Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}"
                                           required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-bold">Perfil:</label>
                                    <select name="role_id" class="select">
                                        <option value="">Selecione</option>
                                        @foreach($roles as $role)
                                            <option {{ isset($user) ? ($role->id === $user->roles()->first()->id ? 'selected': '') : '' }} value="{{ $role->id }}">{{ $role->display_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
