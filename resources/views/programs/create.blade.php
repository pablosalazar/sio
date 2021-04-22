@extends("layouts.app")

@section("breadcrumb")
    @include ('programs.common.breadcrumb',['section' => 'Agregar']) 
@endsection
@section ('content')

    <div class="row">
        <div class="col-lg-12 text-right">
        </div>
    </div>

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-doc fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span>Agregar un nuevo</span>
                <h2 class="font-bold">Programa</h2>
            </div>
        </div>
    </div>
    <div class="row">
        {!!  Form::open(['route' => ['programas.store' , $program->id] ,'method' => 'POST', 'role' => 'form', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
            @include ('programs.common.form') 
        <div class="col-md-12 text-right">
            <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
            <a href="{{ route('programas.index', $program->id) }}" class="btn btn-default btn-cancel">Regresar</a>
        </div>
        {!!  Form::close() !!}
    </div>

    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/programs.js') }}"></script>
@endsection