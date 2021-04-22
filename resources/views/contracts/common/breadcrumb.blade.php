<div class="col-sm-4">
    <h2>Contratos</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('contratos') }}">Contratos</a>
            </li>
            @if($section != "Lista")
                <li>
                    <a href="{{ route('contratos.index', [$employee->id]) }}">{{ $employee->first_name }}</a>
                </li>
                <li class="active">{{ $section }}</li>
            @else 
                <li class="active">{{ $employee->first_name }}</li>
            @endif
            
        @else
            <li class="active">Contratos</li>
        @endif
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
         @if(isset($section))
            @if($section == "Lista")
                <a href="{{ route('contratos.create', $employee->id) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
                <a href="{{ url('contratos') }}" class="btn btn-default btn-cancel">Regresar</a>
            @elseif($section == "Ver" )
                <button type="button" class="btn btn-danger btn-space" id="btn-delete"><i class="fa fa-trash"></i> Eliminar</button>
                <a href="{{ route('contratos.edit', [$employee->id, $contract->id]) }}" class="btn btn-warning"><i class="fa fa-edit"></i> Editar</a>
                <a href="{{ route('contratos.index', [$employee->id]) }}" class="btn btn-default btn-cancel">Regresar</a>
            @elseif($section == "Editar")
                <button type="button" class="btn btn-danger btn-space" id="btn-delete"><i class="fa fa-trash"></i> Eliminar</button>
                <a href="{{ route('contratos.show', [$employee->id, $contract->id]) }}" class="btn btn-default btn-cancel">Regresar</a>
            @elseif($section == "Agregar")
                <a href="{{ route('contratos.index', [$employee->id]) }}" class="btn btn-default btn-cancel">Regresar</a>
            @endif
        @endif
    </div>
</div>