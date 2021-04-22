@extends("layouts.app")

@section("breadcrumb")
    @include ('areas.common.breadcrumb',['section' => 'Editar']) 
@endsection
@section ('content')

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-direction fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span>Editar el área</span>
                <h2 class="font-bold">{{$area->name}}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        {!! Form::model($area, ['route' => ['areas.update', $area->id], 'method' => 'PATCH', 'id' => 'form']) !!}
                @include ('areas.common.form')  
        {!!  Form::close() !!}
    </div>

    <!-- Formulario para eliminar-->
    {{ Form::open(['route' => ['areas.destroy', $area->id], 'method' => 'delete', 'id'=>'form-delete']) }} 
    {{ Form::close() }} 

    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/areas.js') }}"></script>
@endsection