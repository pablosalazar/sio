<div class="col-sm-4">
    <h2>Usuarios</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('usuarios') }}">Usuarios</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Usuarios</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($section))
            @if($section == "Editar")
                <button type="button" class="btn btn-danger btn-space" id="btn-delete">
                <i class="fa fa-trash"></i> Eliminar
                </button>
            @endif
            <a href="{{ url('usuarios') }}" class="btn btn-default btn-cancel">Regresar</a>
        @endif
    </div>
</div>