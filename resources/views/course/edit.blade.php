@extends("layouts.app")

@section("breadcrumb")
    @include ('course.common.breadcrumb',['section' => 'Editar']) 
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
                <span> edita la ficha</span>
                <h2 class="font-bold">{{$course->code}}</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::model($course, ['route' => ['fichas.update', $course->id], 'method' => 'PATCH', 'id' => 'form']) !!}
            @include ('course.common.form')
            <div class="col-md-12 text-right">
                <a href="{{ route('fichas.index') }}" class="btn btn-default btn-cancel">Cancelar</a>
                <button type="button" id="btn-save" class="btn btn-primary"><i class="fa fa-check"></i> Guardar</button>
            </div>
        {!!  Form::close() !!}
    </div>

    <!-- Formulario para eliminar-->
    {{ Form::open(['route' => ['fichas.destroy', $course->id], 'method' => 'delete', 'id'=>'form-delete']) }} 
    {{ Form::close() }} 
    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/courses.js') }}"></script>
@endsection