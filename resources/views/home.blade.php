@extends('layouts.app')

@section("breadcrumb")
    <div class="col-sm-4">
        <h2>Bienvenido</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ url('/') }}">Inicio</a>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
           
        </div>
    </div>
@endsection

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget style1 btn-primary">
                    <div class="row">
                        <div class="col-xs-4 text-center">
                            <i class="icon-briefcase fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Funcionarios </span>
                            <h2 class="font-bold">{{ count($employess) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 btn-success">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="icon-shield fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span>Supervisores </span>
                            <h2 class="font-bold">{{ count($supervisores) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 btn-info">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="icon-graduation fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Aprendices </span>
                            <h2 class="font-bold">{{ count($aprendices) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 btn-warning">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="icon-user fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Usuarios </span>
                            <h2 class="font-bold">{{ count($users) }}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="widget style1 btn-info">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="icon-docs fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Contratos </span>
                            <h2 class="font-bold">{{ count($contracts) }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
