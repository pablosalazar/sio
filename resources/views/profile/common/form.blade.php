<!-- IMAGEN DE PERFIL -->
<!-- <div class="col-md-6">
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
<div class="clearfix"></div> -->

<div class="col-md-6">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Datos del usuario</h5>
        </div>
        <div class="ibox-content">
            
            {!! Field::text('name', $user->name, ['label' => 'Nombre completo', 'required', 'disabled']) !!}

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="control-label">Correo electrónico <span class="f_req">*</span></label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        {{ Form::input('text', 'email', $user->email,  ['class'=>'form-control', 'id' => 'email']) }}
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
            {!! Field::text('role', $user->roles()->first()->name, ['label' => 'rol', 'required', 'disabled']) !!}   

            {!! Field::text('username', $user->username, ['label' => 'Usuario', 'required']) !!}          

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Cambiar contraseña
            </button>

        </div>
    </div>
</div>


<div class="col-md-12 text-right">
    <button type="submit" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
    <a href="{{ url('usuarios') }}" class="btn btn-default btn-cancel">Regresar</a>
</div>

