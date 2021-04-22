@extends("layouts.app")

@section("breadcrumb")
    @include ('classroom.common.breadcrumb',['section' => 'Editar']) 
@endsection

@section ('content')

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-doc fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> edita el ambiente</span>
                <h2 class="font-bold">{{ $classroom->name }}</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::model($classroom, ['route' => ['ambientes.update', $classroom->id], 'method'=> 'PATCH', 'id' => 'form']) !!}
            @include ('classroom.common.form')
        <div class="col-md-12 text-right">
            <a href="{{ route('ambientes.index') }}" class="btn btn-default btn-cancel">Cancelar</a>
            <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
        </div>
        {!!  Form::close() !!}
    </div>
    
    {{ Form::open(['route' => ['ambientes.destroy', $classroom->id], 'method' => 'delete', 'id'=>'form-delete']) }} 
    {{ Form::close() }} 
    <br/>
    <br>
@stop

@section('scripts')
    <script src="{{ asset('js/app/classrooms.js') }}"></script>
@endsection