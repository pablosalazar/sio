<div class="col-sm-4">
    <h2>Aprendices</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('aprendices') }}">Aprendices</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Aprendices</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($section))
            @if($section == "Editar")
                <button type="submit" class="btn btn-danger btn-space" id="btn-delete">Eliminar</button>
            @endif
            <a href="{{ route('aprendices.index') }}" class="btn btn-default btn-cancel">Regresar</a>
        @endif
    </div>
</div>