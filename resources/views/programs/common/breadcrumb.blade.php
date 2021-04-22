<div class="col-sm-4">
    <h2>Programas</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('programas') }}">Programas</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Programas</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($section))
            @if($section == "Editar")
                <button  type="button" class="btn btn-danger btn-space" id="btn-delete">Eliminar</button>
            @endif
            <a href="{{ route('programas.index') }}" class="btn btn-default btn-cancel">Regresar</a>
        @endif
    </div>
</div>