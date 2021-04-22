@extends("layouts.app")

@section("breadcrumb")
    @include ('contracts.common.breadcrumb',['section' => 'Agregar']) 
@endsection
@section ('content')

    <div class="row">
        <div class="col-lg-12 text-right">
        </div>
    </div>

    <div class="widget style1">
        <div class="row">
            <div class="col-md-8">

                <figure class="avatar">
                    @if(isset($employee) && $employee->picture != "default.jpg")
                        <a href="{{ asset('pictures/employees/' . $employee->picture) }}" data-lightbox="image-1">
                            <img src="{{ asset('pictures/employees/thumbnails/' . $employee->picture) }}" id="picture_preview">
                        </a>
                    @else
                        <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
                    @endif
                </figure>
                <span>{{ $employee->type_employee }} <strong class="text-uppercase">{{ $employee->name }}</strong> </span>

                <h2 class="font-bold"><span class="text-muted">Nuevo</span> contrato</h2>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-10 text-right">
                    </div>
                    <div class="col-md-2">
                        <i class="icon-doc fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        {!!  Form::open(['route' => ['contratos.store' , $employee->id] ,'method' => 'POST', 'id' => 'form']) !!}

            @include ('contracts.common.form') 
            
        {!!  Form::close() !!}
    </div>

    <br/>
    <br>
@stop
@section('scripts')
    <script src="{{ asset('js/app/contracts.js') }}"></script>
@endsection