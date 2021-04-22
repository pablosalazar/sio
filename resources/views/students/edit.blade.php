@extends("layouts.app")
 
@section("breadcrumb")
    @include ('students.common.breadcrumb',['section' => 'Editar'])
@endsection
@section ('content')

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-graduation fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> editar info. del aprendiz</span>
                <h2 class="font-bold">{{ $student->name }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        {!! Form::model($student, ['route' => ['aprendices.update', $student->id], 'method'=> 'PATCH',  'id' => 'form', 'files' => true]) !!}
                @include ('students.common.form', ['action'=>'edit'])
        {!!  Form::close() !!}
    </div>
    
    {{ Form::open(['route' => ['aprendices.destroy', $student->id], 'method' => 'delete', 'id'=>'form-delete']) }}        
    {{ Form::close() }}  

    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/students.js') }}"></script>
@endsection