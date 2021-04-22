<?php

const EMPTY_FIELD = '-- Elige una opción --';

$type_documents_list = [
    'C.C.' => 'C.C.',
    'T.I.' => 'T.I.',
    'C.E.' => 'C.E.'
];

$type_contract_list = [
    'Planta' => 'Planta',
    'Contratista' => 'Contratista'
];

$type_employees_list = [
    'Instructor' => 'Instructor',
    'Administrativo' => 'Administrativo'
];

$grades_list = [
    1 => 1,
    2 => 2,
    3 => 3,
    4 => 4,
    5 => 5,
    6 => 6,
    7 => 7,
    8 => 8,
    9 => 9,
    10 => 10,
    11 => 11
];

$denominations_list = [
    "Directivo" => "Directivo",
    "Asesor" => "Asesor",
    "Profesional" => "Profesional",
    "Técnico" => "Técnico",
    "Asistencial" => "Asistencial"
];

if(!count($areas)) {
    $areas = ['' => 'No hay areas registradas'];
}


?>

    @if( $errors->any() )
        <br>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Algunos campos presentan conflicto.
            </div>
        </div>
    @endif

    <div class="col-md-12">
        @if(isset($employee))
            <p class="text-right small">
                Fecha de registro: <strong>{{ \Carbon\Carbon::parse($employee->created_at)->format('d/m/Y') }}</strong><br>
                Fecha ultima actualización: <strong>{{ \Carbon\Carbon::parse($employee->updated_at)->format('d/m/Y') }}</strong>
            </p>
            <br>
        @endif
        <p class="text-muted text-right">
            Los campos marcados con (<span class="f_req">*</span>) son obligatorios
        </p> 
    </div>

    <!-- IMAGEN DE PERFIL -->
    <div class="col-md-6">
        <figure class="avatar avatar-form">
            @if(isset($employee) && $employee->picture != "default.jpg")
                <a href="{{ asset('pictures/employees/' . $employee->picture) }}" data-lightbox="image-1">
                    <img src="{{ asset('pictures/employees/thumbnails/' . $employee->picture) }}" id="picture_preview">
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

    <!-- TIPO DE FUNCIONARIOS -->
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Tipo de funcionario</h5> 
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                           {!! Field::select('type_contract', $type_contract_list, ['empty'=>EMPTY_FIELD, 'label' => 'Tipo de contrato', 'class'=>'','required', 'id'=>'type_contract']) !!}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                             {!! Field::select('type_employee', $type_employees_list, ['empty'=>EMPTY_FIELD, 'label' => 'Tipo de funcionario', 'class'=>'','required','id'=>'type_employee']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DATOS PERSONALES -->
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Datos personales</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::text('first_name', ['label' => 'Nombre', 'required']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('last_name', ['label' => 'Apellidos', 'required']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {!! Field::select('document_type', $type_documents_list, ['empty'=>EMPTY_FIELD, 'label' => 'Tipo de documento', 'class'=>'','required']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('document_number', ['label' => 'Numero de documento', 'required']) !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {!! Field::text('document_expedition_place', ['label' => 'Lugar de expedición del documento']) !!}
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('birthdate') ? ' has-error' : '' }}">
                            <label for="birthdate" class="control-label">Fecha de nacimiento</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {{ Form::input('text', 'birthdate', null,  array('class'=>'form-control', 'data-field'=>'date')) }}
                            </div>
                            @if($errors->has('birthdate'))
                                <p class="help-block">{{ $errors->first('birthdate') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('document_expedition_date') ? ' has-error' : '' }}">
                            <label for="document_expedition_date" class="control-label">Fecha de expedición del documento</label>
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                {{ Form::input('text', 'document_expedition_date', null,  array('class'=>'form-control', 'data-field'=>'date')) }}
                            </div>
                            @if($errors->has('document_expedition_date'))
                                <p class="help-block">{{ $errors->first('document_expedition_date') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- DATOS DE CONTACTO -->
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Datos de contacto</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        {!! Field::text('email', ['label' => 'Correo institucional  ', 'required']) !!}
                    </div>
                    <div class="col-md-12">
                        {!! Field::text('personal_email', ['label' => 'Correo personal']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('phone', ['label' => 'Teléfono']) !!}
                    </div>
                    <div class="col-md-6">
                        {!! Field::text('address', ['label' => 'Dirección']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('residence_place', ['label' => 'Lugar de residencia', 'required']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- PERFIL LABORAL -->
    <div class="col-md-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Perfil laboral</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">                       
                        {!! Field::select('area_id', $areas, ['label' => 'Área', 'class'=>'','required', 'id'=>'area_id']) !!}
                    </div>
                                  
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('salary') ? ' has-error' : '' }}">
                            <label for="salary" class="control-label">Salario</label>
                            <div class="input-group">
                                <span class="input-group-addon"><strong>$</strong></span>
                                {{ Form::text('salary', null,  ['class'=>'form-control text-right', 'id'=>'salary_field']) }}
                            </div>
                            @if($errors->has('salary'))
                                <label class="error">{{ $errors->first('salary') }}</label>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 field_position">
                        {!! Field::text('position', ['label' => 'Cargo']) !!}
                    </div>

                    <div class="col-md-6 field_experience_teacher">
                        {!! Field::text('experience_teacher', ['label' => 'Experiencia como docente']) !!}
                    </div>

                    <div class="col-md-6">
                        {!! Field::text('experience_area', ['label' => 'Experiencia en el área']) !!}
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

    <!-- ESCALA DE ASIGNACION BASICA MENSUAL -->
    <div class="col-md-6" id="fields_scale" style="display: none">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Escala de asignación básica mensual</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-5">
                        {!! Field::select('grade', $grades_list, ['empty' => EMPTY_FIELD, 'label' => 'Grado']) !!}
                    </div>
                    <div class="col-md-7">
                        {!! Field::select('denomination', $denominations_list, ['empty' => EMPTY_FIELD, 'label' => 'Denominación']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- ESTUDIOS REALIZADOS -->
    
    @include ('employees.common.form-education')

    <!-- OBSERVACIONES -->
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Observación (es)</h5>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::textarea('observation', null, ['rows' => '3', 'class'=>'form-control']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="col-md-12 text-right">
        <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
        <a href="{{ url('funcionarios') }}" class="btn btn-default btn-cancel">Regresar</a>
    </div>