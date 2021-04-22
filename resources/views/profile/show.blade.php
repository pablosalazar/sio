@extends("layouts.app")

@section("breadcrumb")
    @include("profile.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-sm-1">
                <i class="icon-user fa-4x"></i>
            </div>
            <div class="col-sm-11">
                <span>{{ $user->roles()->first()->name }}</span>
                <h2 class="font-bold">{{ $user->name }}</h2>
            </div>
        </div>
    </div>
    <br>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        <br>
    @endif

    <div class="row">
        {!!  Form::open(['route' => 'profile', 'method' => 'POST', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}

        @include ('profile.common.form')

        {!!  Form::close() !!}
    </div>
    <br>
    <br>

    <!-- Form para cambiar el password -->
    <div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-key modal-icon"></i>
                    <h4 class="modal-title">Cambiar contraseña</h4>
                </div>
                <div class="modal-body">
                    {!! Form::model($user, ['route' => ['usuarios.cambiar-password', $user->id], 'method' => 'POST', 'id' => 'password-form']) !!}

                        <input type="hidden" name="page" value="profile">
                   
                        {!! Field::password('password', ['required']) !!}

                        {!! Field::password('password_confirmation', ['required']) !!}

                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save-password-form">Guardar</button>
                    <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    



@endsection

@section('scripts')
    <script src="{{ asset('js/app/profile.js') }}"></script>
@stop