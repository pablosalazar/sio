@extends('layouts.app')

@section('breadcrumb')
    @include ('contracts.common.breadcrumb', ["section" => "Lista" ])
@endsection

@section('content')  

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
                <span>Lista de </span>

                <h2 class="font-bold"><span class="text-muted">Contratos de</span> {{ $employee->name }}</h2>
            </div>
            <div class=" col-lg-4 col-sm-4">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                        <span> Contratos registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-docs fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        <br>
    @endif
    <div class="row">
        <div class="col-lg-12">
            @if(count($list))
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1"> Contratos Vigentes</a></li>
                        <li class=""><a data-toggle="tab" href="#tab-2">Contratos Terminados</a></li>
                    </ul>
                    <div class="tab-content tab-contratos">
                        <div id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <h3 class="text-info">Lista de contratos vigentes</h3>
                                <hr>
                                <?php $ban = 0; ?>
                                @foreach($list as $contract)
                                    @if($contract->isValid())
                                        <?php $ban = 1; ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <small class="stats-label">Tipo de contrato</small>
                                                                <h4>{{ $contract->type }}</h4>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <small class="stats-label"># Contrato</small>
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
                                                                    {{ $contract->format_monthly_value }}
                                                                </h4>
                                                            </div>
                                                        </div>
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
                                                            <div class="col-md-3">
                                                                <small class="stats-label">Supervisor</small>
                                                                <h4>{{ $contract->supervisor?$contract->supervisor->name:'' }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <small class="stats-label">Área</small>
                                                                <h4>{{ $contract->area? $contract->area->name : ""}}</h4>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="text-right m-t-sm">
                                                                    <a href="{{ route('contratos.show', [$employee->id, $contract->id]) }}" class="btn btn-primary">Ver más</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach

                                <?php if($ban == 0) {?>
                                <div class="alert alert-warning">
                                    No hay contratos vigentes para el {{$employee->position}} {{ $employee->name }}.
                                </div>
                                <?php } ?>
                                <div class="col-md-12 text-right">
                                    <a href="{{ url('contratos') }}" class="btn btn-default btn-cancel">Regresar</a>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <h3 class="text-warning">Lista de contratos terminados</h3>
                                <hr>
                                <?php $ban2 = 0; ?>
                                @foreach($list as $contract)
                                    @if(!$contract->isValid())
                                        <?php $ban2 = 1; ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="ibox float-e-margins">
                                                    <div class="ibox-content">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <small class="stats-label">Tipo de contrato</small>
                                                                <h4>{{ $contract->type }}</h4>
                                                            </div>

                                                            <div class="col-md-3">
                                                                <small class="stats-label"># Contrato</small>
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
                                                                    {{ $contract->format_monthly_value }}
                                                                </h4>
                                                            </div>
                                                        </div>
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
                                                            <div class="col-md-3">
                                                                <small class="stats-label">Supervisor</small>
                                                                <h4>{{ $contract->supervisor?$contract->supervisor->name:'' }}</h4>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-8">
                                                                <small class="stats-label">Área</small>
                                                                <h4>{{ $contract->area? $contract->area->name : ""}}</h4>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="text-right m-t-sm">
                                                                    <a href="{{ route('contratos.show', [$employee->id, $contract->id]) }}" class="btn btn-primary">Ver más</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    @endif
                                @endforeach
                                <?php if($ban2 == 0) {?>
                                    <div class="alert alert-warning">
                                        No hay contratos finalizados para el {{$employee->position}} {{ $employee->name }}.
                                    </div>
                                <?php } ?>
                                <div class="col-md-12 text-right">
                                    <a href="{{ url('contratos') }}" class="btn btn-default btn-cancel">Regresar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="alert alert-warning">
                    Aun no hay contratos registrados para {{ $employee->name }}.
                </div>
            @endif

        </div>
    </div>
    <br>
    <br>



@endsection

@section('scripts')
    <script src="{{ asset('js/app/contracts.js') }}"></script>
@endsection