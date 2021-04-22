@extends("layouts.app")

@section("breadcrumb")
    @include("employees.common.breadcrumb", ["section" => "Agregar"])
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-briefcase fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Agregar un nuevo</span>
                <h2 class="font-bold">Funcionario</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::open(['route' => 'funcionarios.store', 'method' => 'POST', 'id' => 'form', 'files' => true]) !!}

            @include ('employees.common.form')

        {!!  Form::close() !!}
    </div>

    <br/>
    <br>


@endsection

@section('scripts')
    <script src="{{ asset('js/app/educations.js') }}"></script>
    <script src="{{ asset('js/app/employees.js') }}"></script>
@stop