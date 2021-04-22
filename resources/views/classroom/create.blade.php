@extends("layouts.app")

@section("breadcrumb")
    @include ('classroom.common.breadcrumb',['section' => 'Agregar']) 
@endsection

@section ('content')

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-doc fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Agregar un nuevo</span>
                <h2 class="font-bold">Ambiente</h2>
            </div>
        </div>
    </div>
    <div class="row">
        {!!  Form::open(['route' => ['ambientes.store' , $classroom->id] ,'method' => 'POST', 'id' => 'form']) !!}
            @include ('classroom.common.form') 
        <div class="col-md-12 text-right">
            <a href="{{ route('ambientes.index', $classroom->id) }}" class="btn btn-default btn-cancel">Cancelar</a>
            <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
        </div>
        {!!  Form::close() !!}
    </div>

    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/classrooms.js') }}"></script>
@endsection