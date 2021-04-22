<?php

const EMPTY_FIELD = '-- Elige una opción --';

$estado = array(
    'Activo' => 'Activo',
    'Inactivo' => 'Inactivo'
);

$tipo_documento = array(
    'C.C.' => 'C.C.',
    'T.I.' => 'T.I.',
    'C.E.' => 'C.E.'
);

$tipo_sangre = [
    'O-'  => 'O-',
    'O+'  => 'O+',
    'A-'  => 'A-',
    'A+'  => 'A+',
    'B-'  => 'B-',
    'B+'  => 'B+',
    'AB-' => 'AB-',
    'AB+' => 'AB+'
];

?>

@if( $errors->any() )
    <br>
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Algunos campos presentan conflicto
        </div>
    </div>
@endif

<div class="col-md-6">
    <figure class="avatar avatar-form">
        @if(isset($student) && $student->picture != "default.jpg")
            <a href="{{ asset('pictures/students/' . $student->picture) }}" data-lightbox="image-1">
                <img src="{{ asset('pictures/students/thumbnails/' . $student->picture) }}" id="picture_preview">
            </a>
        @else
            <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
        @endif
    </figure>
    <br>
    <h4>Cambiar foto</h4>
    <input type="file" name="picture" id="picture">
    <p class="help-block help-error">{{ $errors->first('picture') }}</p>
</div>



<div class="col-md-12">
    @if(isset($student))
        <p class="text-right small">
            Fecha de registro: <strong>{{ \Carbon\Carbon::parse($student->created_at)->format('d/m/Y') }}</strong><br>
            Fecha ultima actualización: <strong>{{ \Carbon\Carbon::parse($student->updated_at)->format('d/m/Y') }}</strong>
        </p>
        <br>
    @endif
    <p class="text-muted text-right">
        Los campos marcados con (<span class="f_req">*</span>) son obligatorios
    </p>
</div>

<div class="col-md-6">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Datos personales</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-6">
                    {!! Field::text('first_name', ['label' => 'Nombres', 'required']) !!}
                </div>
                <div class="col-md-6">
                    {!! Field::text('last_name', ['label' => 'Apellidos', 'required']) !!}
                </div>
                <div class="col-md-6">
                    {!! Field::select('document_type', $tipo_documento, ['label' => 'Tipo de documento','empty' => EMPTY_FIELD, 'required']) !!}
                </div>
                <div class="col-md-6">
                    {!! Field::text('document_number', ['label' => 'Número de documento', 'required']) !!}
                </div>

                <div class="col-md-12">
                    {!! Field::select('blood_type', $tipo_sangre, ['label' => 'Tipo de sangre','empty' => EMPTY_FIELD]) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Datos de contacto</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-12">
                    {!! Field::text('email', ['label' => 'Correo electrónico institucional', 'required']) !!}
                </div>
                <div class="col-md-12">
                    {!! Field::text('personal_email', ['label' => 'Correo electrónico personal']) !!}
                </div>
                <div class="col-md-12">
                    {!! Field::text('phone', ['label' => 'Teléfono']) !!}
                </div>
                <div class="col-md-12">
                    {!! Field::text('address', ['label' => 'Dirección']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Datos de la formación</h5>
        </div>
        <div class="ibox-content">
            <div class="row">

                <div class="col-md-6">
                   {!! Field::select('course_id', $course, ['label' => 'Fichas' , 'required']) !!}
                   <hr>
                </div>
                <div class="clearfix"></div>
                

                <div class="col-md-6">
                    {!! Field::text('area', null,  ['label' => 'Área', 'class'=>'form-control', 'disabled']) !!} 
                </div>

                <div class="col-md-6">
                    {!! Field::text('programa', null, ['class'=>'form-control', 'disabled']) !!} 
                </div>

                <div class="col-md-6">
                    <div class="form-group fecha">
                        {{ Form::label('fecha_inicio', 'Fecha de inicio del curso') }}
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::text('start_date', null, ['class'=>'form-control', 'id' => 'start_date', 'disabled']) }}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group fecha">
                        {{ Form::label('fecha_finalizacion', 'Fecha de finalización del curso') }}
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                            {{ Form::text('end_date', null, ['class'=>'form-control', 'id' => 'end_date', 'disabled']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 text-right">
    <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
    <a href="{{ url('aprendices') }}" class="btn btn-default btn-cancel"> Regresar</a>
</div>
