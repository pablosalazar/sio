@extends("layouts.app")

@section("breadcrumb")
    @include ('students.common.breadcrumb',['section' => 'Agregar']) 
@endsection
@section ('content')
    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-graduation fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Agregar un nuevo</span>
                <h2 class="font-bold">Aprendiz</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::open(['route' => 'aprendices.store', 'method' => 'POST', 'id' => 'form', 'files' => true]) !!}

            @include ('students.common.form')

        {!!  Form::close() !!}
    </div>

    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/students.js') }}"></script>
@endsection