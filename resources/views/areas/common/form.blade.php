@if( $errors->any() )
    <div class="col-md-12">
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Algunos campos presentan conflicto
        </div>
    </div> 
@endif

<div class="col-md-12">
    @if(isset($area))
        <p class="text-right small">
            Fecha de registro: <strong>{{ \Carbon\Carbon::parse($area->created_at)->format('d/m/Y') }}</strong><br>
            Fecha ultima actualización: <strong>{{ \Carbon\Carbon::parse($area->updated_at)->format('d/m/Y') }}</strong>
        </p>
        <br>
    @endif
    <p class="text-muted text-right">
        Los campos marcados con (<span class="f_req">*</span>) son obligatorios
    </p> 
</div>

<div class="col-md-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Información del área</h5>
        </div>
        <div class="ibox-content">
			{!! Field::text('name',null, ['label' => 'Nombre del área', 'required']) !!}
		</div>
	</div>
</div> 

<div class="col-md-12 text-right">
        <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
        <a href="{{ url('areas') }}" class="btn btn-default btn-cancel">Regresar</a>
    </div>
@section('scripts')
    <script src="{{ asset('js/app/areas.js') }}"></script>
@endsection