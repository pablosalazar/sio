@extends("layouts.app")

@section("breadcrumb")
    @include("areas.common.breadcrumb", ["section" => "Agregar"])
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-direction fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Agregar una nueva</span>
                <h2 class="font-bold">Área</h2>
            </div>
        </div>
    </div>

    <div class="row">
        {!!  Form::open(['route' => 'areas.store', 'method' => 'POST', 'id' => 'form']) !!}

            @include ('areas.common.form')

        {!!  Form::close() !!}
    </div>

    <br/>
    <br>


@endsection

@section('scripts')
    <script src="{{ asset('js/app/areas.js') }}"></script>
@stop