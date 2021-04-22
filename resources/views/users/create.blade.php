@extends("layouts.app")

@section("breadcrumb")
    @include("users.common.breadcrumb", ["section" => "Agregar"])
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-user fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Agregar un nuevo</span>
                <h2 class="font-bold">Usuario</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}

        @include ('users.common.form')

        {!!  Form::close() !!}
    </div>

    <br/>
    <br>


@endsection

@section('scripts')
    <script src="{{ asset('js/app/users.js') }}"></script>
@stop