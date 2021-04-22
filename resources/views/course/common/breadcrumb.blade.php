<div class="col-sm-4">
    <h2>Fichas</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('fichas') }}">Fichas</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Fichas</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($section))
            @if($section == "Editar")
                <button type="button" class="btn btn-danger btn-space" id="btn-delete">Eliminar</button>
            @endif
            <a href="{{ route('fichas.index') }}" class="btn btn-default btn-cancel">Cancelar</a>
        @endif
    </div>
</div>