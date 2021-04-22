@extends("layouts.app")

@section("breadcrumb")
    @include("employees.common.breadcrumb", ["section" => "Editar"])
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-briefcase fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span> Editar info. del funcionario</span>
                <h2 class="font-bold">{{ $employee->name }}</h2>
            </div>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        <br>
    @endif

    
    <div class="row">
        {!! Form::model($employee, ['route' => ['funcionarios.update', $employee->id], 'method' => 'PATCH', 'id' => 'form', 'files' => true]) !!}
                @include('employees.common.form', ['action'=>'edit'])
        {!!  Form::close() !!}
    </div>

    <!-- Form eliminar -->
    {{ Form::open(['route' => ['funcionarios.destroy', $employee->id], 
    'method' => 'delete', 'id'=>'form-delete']) }}
    {{ Form::close() }}

    <br>
    <br>



@endsection

@section('scripts')
    <script src="{{ asset('js/app/educations.js') }}"></script>
    <script src="{{ asset('js/app/employees.js') }}"></script>
@stop
