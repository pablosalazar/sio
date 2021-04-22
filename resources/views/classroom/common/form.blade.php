<?php
    const EMPTY_FIELD = '-- Elige una opción --';
    
    if(count($areas) == 0) {
   
        $areas = [
            '' => EMPTY_FIELD
        ];   
    }
?>
@if( $errors->any() )
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
            <h5>Información de los Ambientes</h5>
        </div>
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-12">
                    {!! Field::text('name', null, ['label' => 'Nombre del ambiente', 'required' ]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    {!! Field::text('code',null, ['label' => 'Codigo', 'required' ]) !!}
                </div>
                <div class="col-md-6">
                    {!! Field::text('capacity', null,['label' => 'Capacidad' ]) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                        {!! Field::select('area_id', $areas, ['label' => 'Seleccione area','empty' => EMPTY_FIELD]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>