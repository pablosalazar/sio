<div class="col-sm-4">
    <h2>Roles</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('roles') }}">Roles</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Roles</li>
        @endif
    </ol>
</div>
@if(isset($section))
    <div class="col-sm-8">
        <div class="title-action">
            @if($section == "Editar")
                  <button type="button" class="btn btn-danger" id="btn-delete">Eliminar</button>
            @endif
            <a href="{{ route('funcionarios.index') }}" class="btn btn-default btn-cancel">Cancelar</a>
        </div>
    </div>
@endif