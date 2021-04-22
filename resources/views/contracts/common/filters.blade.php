<?php

$type_employee = [
    ''     => '-- Todos --',
    'Instructor' => 'Instructor',
    'Administrativo' => 'Administrativo'
];

?>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <form id="form-filters" class="form-inline">
                    <div class="form-group">
                        {!! Form::text('nombre', null, ['class' => 'form-control filter', 'placeholder' => 'Contratista']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::text('numero', null, ['class' => 'form-control filter', 'placeholder' => 'Número de identificación']) !!}
                    </div>
                    <div class="form-group">
                       {!! Form::select('search_type_employee', $type_employee, null, ['class' => 'form-control filter']) !!}
                    </div>

                    <div class="form-group m-t-xs m-l-xs">
                        <a href="{{ url('contratos') }}" class="btn btn-default">Mostrar todos</a>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>