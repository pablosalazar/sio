<?php

const EMPTY_FIELD = '-- Elige una opción --';

if(count($employees) == 0) {
   
    $employees = [
        '' => EMPTY_FIELD
    ];   
}

?>
<div class="row">
    <div class="col-md-12">
        <div class="ibox float-e-margins">
           
            <div class="ibox-content">
                {!!  Form::open(['route' => 'supervisores.store', 'method' => 'POST', 'class' => 'form-inline', 'id' => 'form']) !!}
                    <div class="form-group">
                        {!! Field::select('id', $employees, ['label' => 'Lista funcionarios' , 'id' => 'employees_select', 'style' => 'width:600px','empty' => EMPTY_FIELD]) !!}
                    </div>
                    <div class="form-group m-l-xs">
                        <button class="btn btn-primary" type="submit" style="margin-top:23px">Agregar</button>
                    </div>
                {!!  Form::close() !!}
            </div>
        </div>
    </div>
</div>
