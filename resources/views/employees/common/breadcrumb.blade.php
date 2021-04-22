<div class="col-sm-4">
    <h2>Funcionarios</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>
        @if(isset($section))
            <li>
                <a href="{{ url('funcionarios') }}">Funcionarios</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Funcionarios</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        @if(isset($section))
            @if($section == "Editar")
                <a href="{{ route('contratos.index', $employee->id) }}" class="btn btn-warning btn-space">Ver contratos</a>
                <button type="submit" class="btn btn-danger btn-space" id="btn-delete">
                <i class="fa fa-trash"></i> Eliminar
                </button>
            @endif
            <a href="{{ route('funcionarios.index') }}" class="btn btn-default btn-cancel">Regresar</a>
        @endif
    </div>
</div>