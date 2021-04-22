<?php

$type_contract = [
    ''     => '-- Todos --',
    'Planta' => 'Planta',
    'Contratista' => 'Contratista'
];

$type_employee = [
    ''     => '-- Todos --',
    'Instructor' => 'Instructor',
    'Administrativo' => 'Administrativo'
];

?>


<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form id="form-filters" class="form-inline">
                    <div class="form-group">
                        {{ Form::text('search_name', null, ['class' => 'form-control filter', 'placeholder' => 'Nombre del funcionario', 'autocomplete' => 'off']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::select('search_type_contract', $type_contract, null, ['class' => 'form-control filter']) }}
                    </div>
                    <div class="form-group">
                       {{ Form::select('search_type_employee', $type_employee, null, ['class' => 'form-control filter']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::text('search_document_number', null, ['class' => 'form-control filter', 'placeholder' => 'Número de identificación', 'autocomplete' => 'off']) }}
                    </div>

                    <div class="form-group m-t-xs m-l-xs">
                        <a href="{{ route('funcionarios.index') }}" class="btn btn-default">Mostrar todos</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('funcionarios.create') }}" class="btn btn-primary m-t-xs"><i class="fa fa-plus"></i> Agregar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



