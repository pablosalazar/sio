<?php

    const EMPTY_FIELD = '-- Elige una opción --';

    $jornada = [
        'Manaña' => 'Manaña',
        'Tarde' => 'Tarde',
        'Noche' => 'Noche',
    ];

    if(count($programs) == 0) {
   
        $programs = [
            '' => EMPTY_FIELD
        ];   
    }

?>

@if($errors->any())
    <br>
    <div class="col-lg-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
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
            <h5>Información de las Fichas</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-12">
                    {!! Field::text('code', ['label' => 'Número de ficha' ]) !!}
                </div>
            </div>
    
            <div class="row">
                <div class="col-md-6">
                     <div class="form-group fecha">
                        {{ Form::label('start_date', 'Fecha de Inicio') }} <span class="f_req">*</span>

                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'start_date', null,  array('class'=>'form-control', 'data-field'=>'date')) }}
                        </div>
                        <label class="error">{{ $errors->first('start_date') }}</label>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <div class="form-group fecha">
                        {{ Form::label('end_date', 'Fecha de fin') }} <span class="f_req">*</span>

                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::input('text', 'end_date', null,  array('class'=>'form-control', 'data-field'=>'date')) }}
                        </div>
                        <label class="error">{{ $errors->first('end_date') }}</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">  
                    {!! Field::select('journey', $jornada, ['label' => 'Jornada','empty' => EMPTY_FIELD ]) !!}
                </div>
                <div class="col-md-6">  
                    {!! Field::select('program_id', $programs, ['label' => 'Programa','empty' => EMPTY_FIELD ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>