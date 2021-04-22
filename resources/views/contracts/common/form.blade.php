<?php

    const EMPTY_FIELD = '-- Elige una opción --';
    const EMPTY_FIELD_CREATE = '-- Escribe o selecciona una opción --';

    $arl_ratings_list = [ 1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5];


    $novelty_list = [
        'Activo' => 'Activo',
        'Finalizado' => 'Finalizado',
        'Liquidado' => 'Liquidado',
        'Reanudado' => 'Reanudado',
        'Cancelado' => 'Cancelado',
        'Licencia de maternidad' => 'Licencia de maternidad',
        'Cesión' => 'Cesión',
    ];

    $months_list = [
        "Enero" => "Enero",
        "Febrero" => "Febrero",
        "Marzo" => "Marzo",
        "Abril" => "Abril",
        "Mayo" => "Mayo",
        "Junio" => "Junio",
        "Julio" => "Julio",
        "Agosto" => "Agosto",
        "Septiembre" => "Septiembre",
        "Octubre" => "Octubre",
        "Noviembre" => "Noviembre",
        "Diciembre" => "Diciembre"
    ];

    $type_contract_list = [
        'Periodos fijos mensuales' => 'Periodos fijos mensuales',
        'Por horas' => 'Por horas'
    ];


    $sources_list =  [
        'Nación' => 'Nación',
        'Propios' => 'Propios'
    ];

    $resources_list =  [
        'Fondos especiales' => 'Fondos especiales',
        'Otros recursos de tesorería' => 'Otros recursos de tesorería',
        'Rentas parafiscales' => 'Rentas parafiscales'
    ];

    if(!count($areas)) {
        $areas = ['' => 'No hay areas registradas'];
    }
?>

@if( $errors->any() )
    <br>
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span
                        aria-hidden="true">&times;</span></button>
            Algunos campos presentan conflicto
        </div>
    </div>
@endif


<div class="col-md-12">
    <p class="text-muted">
        Los campos marcados con (<span class="f_req">*</span>) son obligatorios
    </p>
</div>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Información del contrato</h5>
        </div>
        <div class="ibox-content">
        
            <div class="row">
                <div class="col-md-3">
                    {!! Field::select('type', $type_contract_list, [ 'label' => 'Tipo de contrato', 'empty' => EMPTY_FIELD, 'required' ]) !!}
                </div>
                <div class="col-md-2">
                    {!! Field::text('number', ['label' => 'Número de contrato', 'required' ]) !!}
                </div>
                <div class="col-md-2">
                    {!! Field::text('SIIF', ['label' => 'SIIF', 'required' ]) !!}
                </div>
                <div class="col-md-5">
                    {!! Field::select('novelty', $novelty_list, [ 'label' => 'Novedades', 'empty' => EMPTY_FIELD ]) !!}
                </div>
            </div>
    
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('legalization_date') ? ' has-error' : '' }}">
                        <label for="legalization_date" class="control-label">Fecha de legalización</label> <span class="f_req">*</span>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'legalization_date', null,  ['class'=>'form-control calendar']) }}
                        </div>
                        @if($errors->has('legalization_date'))
                            <p class="help-block">{{ $errors->first('legalization_date') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                     <div class="form-group {{ $errors->has('start_date') ? ' has-error' : '' }}">
                        
                        <label for="start_date" class="control-label">Fecha inicio</label> <span class="f_req">*</span>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'start_date', null,  ['class'=>'form-control calendar']) }}
                        </div>
                        @if($errors->has('start_date'))
                            <label class="error">{{ $errors->first('start_date') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('end_date') ? ' has-error' : '' }}">
                        <label for="end_date" class="control-label">Fecha fin </label> <span class="f_req">*</span>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'end_date', null,  ['class'=>'form-control calendar']) }}
                        </div>
                        @if($errors->has('end_date'))
                            <label class="error">{{ $errors->first('end_date') }}</label>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('value') ? ' has-error' : '' }}">
                        <label for="value" class="control-label">Valor del contrato</label> <span class="f_req">*</span>
                        <div class="input-group">
                            <span class="input-group-addon"><strong>$</strong></span>
                            {{ Form::text('value', null,  ['class'=>'form-control']) }}
                        </div>
                        @if($errors->has('value'))
                            <label class="error">{{ $errors->first('value') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        {{ Form::label('monthly_value', 'Valor mensualidad') }}
                        <div class="input-group">
                            <span class="input-group-addon"><strong>$</strong></span>
                            {{ Form::text('monthly_value', null,  ['class'=>'form-control']) }}
                        </div>
                        @if($errors->has('monthly_value'))
                            <label class="error">{{ $errors->first('monthly_value') }}</label>
                        @endif
                    </div>
                </div>

                <div class="col-md-3">
                    {!! Field::select('source', $sources_list, ['label' => 'Fuente', 'empty' => EMPTY_FIELD]) !!}
                </div>  

                <div class="col-md-3">  
                       {!! Field::select('resource', $resources_list, ['label' => 'Recursos', 'empty' => EMPTY_FIELD]) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="duration" class="control-label">Duración del contrato </label>
                   
                        {{ Form::text('duration', null,  ['class'=>'form-control']) }}
                        <span class="help-block m-b-none">Ej. 2 meses y 15 días</span>  
                    </div>
                    
                </div>

                 <div class="col-md-4">
                    {!! Field::select('supervisor_id', $supervisors, ['label' => 'Supervisor', 'empty' => EMPTY_FIELD, 'required']) !!}
                </div>

                <div class="col-md-4">
                    {!! Field::text('program', ['label' => 'Número de la poliza' ]) !!}
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    {!! Field::text('insurance' ,['label' => 'Aseguradora' ]) !!}
                </div>

                <div class="col-md-3">
                    {!! Field::text('number_policy', ['label' => 'Número de la poliza' ]) !!}
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('policy_expedition_date') ? ' has-error' : '' }}">
                        <label for="policy_expedition_date" class="control-label">Fecha Expedición Poliza
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'policy_expedition_date', null,  ['class'=>'form-control calendar']) }}
                        </div>
                        @if($errors->has('policy_expedition_date'))
                            <label class="error">{{ $errors->first('policy_expedition_date') }}</label>
                        @endif
                    </div>
                </div>
                <div class="col-md-3">
                    {!! Field::text('CDP', ['label' => 'CDP', 'title'=>'Certificado de Disponibilidad Presupuestal' ]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                  
                    {!! Field::select('area_id', $areas, ['empty'=> EMPTY_FIELD_CREATE, 'label' => 'Área', 'class'=>'','required', 'id'=>'area_id']) !!}
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('objeto', 'Objeto del contrato') }}
                        {{ Form::textarea('object', null,  ['class'=>'form-control', 'size' => '30x6']) }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('forma_pago', 'Forma de pago pactada') }}
                        {{ Form::textarea('payment_method', null,  ['class'=>'form-control', 'size' => '30x6']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Seguridad social</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    {!! Field::text('arl_name', ['label' => 'Nombre ARL' ]) !!}
                </div>
                <div class="col-md-3">
                    {!! Field::select('arl_rating', $arl_ratings_list, ['label' => 'clasificación ARL', 'empty' => EMPTY_FIELD]) !!}
                </div>
                <div class="col-md-3">
                    <div class="form-group {{ $errors->has('arl_expedition_date') ? ' has-error' : '' }}">
                        <label for="arl_expedition_date" class="control-label">Fecha expedición ARL </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'arl_expedition_date', null,  ['class'=>'form-control calendar']) }}
                        </div>
                        @if($errors->has('arl_expedition_date'))
                            <label class="error">{{ $errors->first('arl_expedition_date') }}</label>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    {!! Field::text('eps_name', ['label' => 'Nombre EPS' ]) !!}
                </div>
                <div class="col-md-4">
                    {!! Field::text('pension_fund', ['label' => 'Fondo pension' ]) !!}
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_month_payment_contribution" class="control-label">Mes último pago aportes </label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'last_month_payment_contribution', null,  ['class'=>'form-control calendar_only_month_year']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Forma de pago</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    {!! Field::text('bank', ['label' => 'Banco']) !!}
                </div>
                <div class="col-md-6">
                    {!! Field::text('account_number', ['label' => '# cuenta de ahorros']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

 <div class="col-md-12 text-right">
    <button type="button" class="btn btn-primary" id="btn-save"><i class="fa fa-check"></i> Guardar</button>
    <a href="{{ URL::previous() }}" class="btn btn-default btn-volver">Regresar</a>
</div>

