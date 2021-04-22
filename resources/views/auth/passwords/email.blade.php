@extends('layouts.auth')

@section('content')


    <div class="middle-box text-center loginscreen animated fadeInRight">
        <div>

            <div>

                <h1 class="logo-name">SIO</h1>

            </div>
            <h3>¿Olvido su contraseña?</h3>
            <p>Ingresa tu correo electrónico.</p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="m-t">
                @csrf

                <div class="form-group">

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>



                <button type="submit" class="btn btn-primary block full-width m-b text-uppercase">ENVIAR</button>

                <div class="text-center">
                    <a href="{{ route('login') }}"><small>Ir a iniciar sesión</small></a>
                </div>
            </form>
            <p class="m-t"> <small><strong>SIO</strong> ©2018 - Todos los derechos reservados.</small> </p>
        </div>
    </div>

@endsection
