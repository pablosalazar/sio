@extends('layouts.app')

@section('breadcrumb')
    @include ('contracts.common.breadcrumb', ['section' => "Ver"])
@endsection

@section('content')

    {{ Form::open(['route' => ['contratos.destroy', $employee->id, $contract->id], 'method' => 'delete', 'id'=>'form-delete']) }}
        
    {{ Form::close() }} 

    <div class="widget style1">
        <div class="row">
            <div class="col-lg-8 col-sm-8">

                <figure class="avatar">

                    @if(isset($employee) && $employee->picture != "default.jpg")
                        <a href="{{ asset('pictures/employees/' . $employee->picture) }}" data-lightbox="image-1">
                            <img src="{{ asset('pictures/employees/thumbnails/' . $employee->picture) }}" id="picture_preview">
                        </a>
                    @else
                        <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
                    @endif
                </figure>
                <span>{{ $employee->type_employee }} <strong class="text-uppercase">{{ $employee->name }}</strong> </span>

                <h2 class="font-bold"><span class="text-muted">contrato #</span> {{ $contract->number }}</h2>
            </div>
            <div class=" col-lg-4 col-sm-4">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-doc fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('contrato/minuta', $contract->id) }}" target="_blank" class="btn btn-info">
                Minuta Contrato
            </a>
            <a href="{{ route('contrato/acta-inicio', $contract->id) }}" target="_blank" class="btn btn-success">
                Acta Inicio
            </a>
            <a href="{{ route('contrato/acta-idoneidad', $contract->id) }}" target="_blank" class="btn btn-success">
                Acta Idoneidad
            </a> 
        </div>
    </div>
    <br>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        <br>
    @endif
    
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Información contrato</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-3">
                    <small class="stats-label">Tipo de contrato</small>
                    <h4>{{ $contract->type }}</h4>
                </div>

                <div class="col-md-3">
                    <small class="stats-label"># contrato</small>
                    <h4>{{ $contract->number }}</h4>
                </div>

                <div class="col-md-3">
                    <small class="stats-label">SIIF</small>
                    <h4>{{ $contract->SIIF }}</h4>
                </div>

                <div class="col-md-3">
                    <small class="stats-label">Novedad</small>
                    @if($contract->novelty == "Cancelado")
                        <h4 class="text-danger">{{ $contract->novelty }}</h4>
                    @elseif($contract->novelty == "Finalizado")
                        <h4 class="text-warning">{{ $contract->novelty }}</h4>
                    @else 
                        <h4 class="text-info">{{ $contract->novelty }}</h4>
                    @endif
                </div>

            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-3">
                    <small class="stats-label">Fecha legalización del contrato</small>
                    <h4>{{ $contract->legalization_date }}</h4>
                </div>
                <div class="col-md-3">
                    <small class="stats-label">Fecha Inicio</small>
                    <h4>{{ $contract->start_date }}</h4>
                </div>

                <div class="col-md-3">
                    <small class="stats-label">Fecha Fin</small>
                    <h4>{{ $contract->end_date }}</h4>
                </div>

            </div>
        </div>

        <div class="ibox-content">
            <div class="row">
                <div class="col-md-3">
                    <small class="stats-label">Fuente</small>
                    <h4>{{ $contract->source }}</h4>
                </div>
                <div class="col-md-3">
                    <small class="stats-label">Recurso</small>
                    <h4>{{ $contract->resource }}</h4>
                </div>
                <div class="col-md-3">
                    <small class="stats-label">Valor del contrato</small>
                    <h4 class="text-success">{{ $contract->format_value }}</h4>
                </div>
                <div class="col-md-3">
                    <small class="stats-label">Valor mensualidad</small>
                    <h4 class="text-success">
                        <h4 class="text-success">{{ $contract->format_monthly_value }}</h4>
                    </h4>
                </div>
            </div>
        </div>

        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <small class="stats-label">Duración del contrato</small>
                    <h4>{{ $contract->duration }}</h4>
                </div>

                <div class="col-lg-4 col-md-6">
                    <small class="stats-label">Supervisor</small>
                    <h4>{{ $contract->supervisor? $contract->supervisor->name : '' }}</h4>
                </div>
                <div class="col-lg-4 col-md-6">
                    <small class="stats-label">Programa</small>
                    <h4>{{ $contract->program }}</h4>
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <small class="stats-label">Aseguradora</small>
                    <h4>{{ $contract->insurance }}</h4>
                </div>
                <div class="col-lg-3 col-md-6">
                    <small class="stats-label">Número de la poliza</small>
                    <h4>{{ $contract->number_policy }}</h4>
                </div>
                <div class="col-lg-3 col-md-6">
                    <small class="stats-label">Fecha expedicíon poliza</small>
                    <h4>{{ $contract->policy_expedition_date }}</h4>
                </div>

                <div class="col-lg-3 col-md-6">
                    <small class="stats-label">CDP</small>
                    <h4>{{ $contract->CDP }}</h4>
                </div>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    <small class="stats-label">Aréa</small>
                    <h4>{{ $contract->area ? $contract->area->name : "" }}</h4>
                </div>
            </div>
        </div>
        <br>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    <p><b>Objeto del contrato</b></p>
                    <hr>
                    <p class="text-justify">{{ $contract->object}}</p>
                </div>
                <div class="col-md-6">
                    <p><b>Forma de pago pactada</b></p>
                    <hr>
                    <p class="text-justify">{{ $contract->payment_method }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Seguridad social</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-4">
                    <small class="stats-label">Nombre ARL</small>
                    <h4>{{ $contract->arl_name }}</h4>
                </div>

                <div class="col-md-4">
                    <small class="stats-label">Clasificación ARL</small>
                    <h4>{{ $contract->arl_rating }}</h4>
                </div>

                <div class="col-md-4">
                    <small class="stats-label">Fecha expedición ARL</small>
                    <h4>{{ $contract->arl_expedition_date }}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <small class="stats-label">Nombre EPS</small>
                    <h4>{{ $contract->eps_name }}</h4>
                </div>

                <div class="col-md-4">
                    <small class="stats-label">Fondo pensión</small>
                    <h4>{{ $contract->pension_fund }}</h4>
                </div>

                <div class="col-md-4">
                    <small class="stats-label">Mes último pago aportes</small>
                    <h4>{{ $contract->last_month_payment_contribution }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Forma de pago</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    <small class="stats-label">Banco</small>
                    <h4>{{ $contract->bank }}</h4>
                </div>

                <div class="col-md-6">
                    <small class="stats-label"># cuenta de ahorros</small>
                    <h4>{{ $contract->account_number }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="text-right">
                <a href="{{ route('contratos.index', $employee->id) }}" class="btn btn-default">Regresar</a>
            </div>
        </div>
    </div>

    <br/>
    <br/>



@endsection

@section('scripts')
    <script src="{{ asset('js/app/contracts.js') }}"></script>
@endsection