@extends('layouts.app')

@section('page-header')
    <div class="page-header page-header-default page-header-sm" style="border-left: 1px solid #ddd; border-right: 1px solid #ddd;">
        <div class="page-header-content">
            <div class="page-title">
                <h5><span class="text-semibold">Bem vindo ao Sistema e-Gestão</span></h5>
            </div>

            <div class="heading-elements">
                <div class="btn-group heading-btn">
                    <button class="btn bg-indigo btn-icon btn-sm dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-gear"></i>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="#"><i class="icon-camera pull-right"></i> Something else</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-spinner2 spinner pull-right"></i> One more line</a></li>
                    </ul>
                </div>
            </div>
        </div>
        {{ Breadcrumbs::render('home') }}
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default panel-bordered">
                <div class="panel-heading">
                    <h6 class="panel-title">Página Inicial</h6>
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
                            sad
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
