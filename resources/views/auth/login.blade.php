@extends('layouts.auth')

@section('content')



    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>

            <div>

               <h1 class="logo-name">SIO</h1>

            </div>
            <h3>Bienvenido a SIO</h3>
            <p>Digita tus credenciales.</p>

            @if(count($errors->all()))
                <div class="alert alert-warning">
                    Tus credenciales no coinciden con nuestros registros.
                </div>
            @endif


            <form method="POST" action="{{ route('login') }}" class="m-t">
                @csrf

                <div class="form-group {{ $errors->has('username') || $errors->has('email') ? ' has-warning' : '' }}">
                    <input type="text" class="form-control" name="login" value="{{ old('username') ?: old('email') }}" placeholder="Usuario o correo electrónico" autofocus>
                </div>

                <div class="form-group {{ $errors->has('password') ? ' has-warning' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                </div>

                <div class="form-group">

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar me
                        </label>
                    </div>

                </div>

                <button type="submit" class="btn btn-primary block full-width m-b text-uppercase">ENTRAR</button>

                <div class="text-center">
                    <a href="{{ route('password.request') }}"><small>¿Olvido su contraseña?</small></a>
                </div>
            </form>
            <p class="m-t"> <small><strong>SIO</strong> ©2018 Geostigma Media - Todos los derechos reservados.</small> </p>
        </div>
    </div>

@endsection
