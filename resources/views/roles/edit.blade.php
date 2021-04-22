@extends("layouts.app")

@section("breadcrumb")
    @include("roles.common.breadcrumb", ["section" => "Editar"])
@endsection

@section("content")

 

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-briefcase fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Editar Rol</span>
                <h2 class="font-bold">{{ $role->name }}</h2>
            </div>
        </div>
    </div>


    <div class="row">
        {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PATCH', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}
            @include('roles.common.form', ['action'=>'edit'])
        {!!  Form::close() !!}
    </div>


    <br>
    <br>

    <!-- Form borrar -->
    {{ Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete', 'id'=>'form-delete']) }}
    {{ Form::close() }}



@endsection

@section('scripts')
    <script src="{{ asset('js/app/roles.js') }}"></script>
@stop
