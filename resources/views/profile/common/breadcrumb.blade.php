<div class="col-sm-6">
    <h2>Mi perfil</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ url('/') }}">Inicio</a>
        </li>

        @if(isset($section))
            <li>
                <a href="{{ url('areas') }}">áreas</a>
            </li>
            <li class="active">{{ $section }}</li>
        @else
            <li class="active">Mi perfil</li>
        @endif
    </ol>
</div> 
<div class="col-sm-6">
    <div class="title-action">
       {{--  @if(isset($section))
            @if($section == "Editar")
               <button type="button" class="btn btn-danger" id="btn-delete">Eliminar</button>
            @endif
            <a href="{{ route('areas.index') }}" class="btn btn-default btn-cancel">Regresar</a>
        @endif --}}
    </div>   
</div>