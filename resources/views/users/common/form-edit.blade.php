<?php
    const EMPTY_FIELD = '-- Elige una opción --';

    $states = [
        'activo' => 'Activo',
        'inactivo' => 'Inactivo'
    ];
?>


<div class="col-md-6">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Datos del usuario</h5>
        </div>
        <div class="ibox-content">
            
            {!! Field::text('name', ['label' => 'Nombre completo', 'required']) !!}

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Correo electrónico <span class="f_req">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        {{ Form::input('text', 'email', null,  ['class'=>'form-control', 'id' => 'email']) }}
                    </div>
                    @if($errors->has('email'))
                        <p class="help-block">{{ $errors->first('email') }}</p>
                    @endif
            </div>                 
          
        </div>
    </div>
</div>


<div class="col-md-6">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Información de la cuenta</h5>
        </div>
        <div class="ibox-content">

            {!! Field::text('username', ['label' => 'Usuario', 'required']) !!}          
   

            {!! Field::select('role_id', $roles, $user->roles->first()->id, ['label' => 'Rol', 'empty' => EMPTY_FIELD, 'required']) !!}

            {!! Field::select('state', $states, 'activo', ['label' => 'Estado', 'empty' => EMPTY_FIELD, 'required']) !!}

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Cambiar contraseña
            </button>

        </div>
    </div>
</div>


<div class="col-md-12 text-right">
    <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
    <a href="{{ url('usuarios') }}" class="btn btn-default btn-cancel">Regresar</a>
</div>