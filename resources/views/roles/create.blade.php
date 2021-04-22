@extends("layouts.app")

@section("styles")
    <link href="{{ asset('plugins/iCheck/custom.css') }}" rel="stylesheet">
@endsection

@section("breadcrumb")
    @include("roles.common.breadcrumb", ["section" => "Agregar"])
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-organization fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Agregar un nuevo</span>
                <h2 class="font-bold">Rol</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::open(['route' => 'roles.store', 'method' => 'POST', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}

            @include ('roles.common.form')

        {!!  Form::close() !!}
    </div>

    <br/>
    <br>


@endsection

@section('scripts')
    <script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('js/app/roles.js') }}"></script>
@stop