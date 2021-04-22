@extends('layouts.app')

@section('breadcrumb')
    @include ('contracts.common.breadcrumb', ['section' => "Editar"])
@endsection

@section('content')

   <div class="widget style1">
        <div class="row">
            <div class="col-lg-8 col-sm-8">

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

                <h2 class="font-bold"><span class="text-muted">Editar contracto </span> #{{ $contract->number }}</h2>
            </div>
            <div class=" col-lg-4 col-sm-4">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-doc fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="row">
        {!!  Form::model($contract, ['route' => ['contratos.update', $employee->id, $contract->id], 'method' => 'PATCH', 'id' => 'form']) !!}
            @include ('contracts.common.form')
        {!!  Form::close() !!}
    </div>
 

    <br>
    <br>

@stop

@section('scripts')
    <script src="{{ asset('js/app/contracts.js') }}"></script>
@endsection

