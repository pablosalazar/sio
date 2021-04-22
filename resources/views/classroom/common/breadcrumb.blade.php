<div class="col-sm-4">
    <h2>Ambientes</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('ambientes') }}">Ambientes</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Ambientes</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($section))
            @if($section == "Editar")
                <button type="button"  class="btn btn-danger" id="btn-delete">Eliminar</button>
            @endif
            <a href="{{ route('ambientes.index') }}" class="btn btn-default btn-cancel">Cancelar</a>
        @endif
    </div>
</div>