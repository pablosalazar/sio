@extends("layouts.app")

@section("breadcrumb")
    @include("users.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-md-6">
                <span> Lista de </span>

                <h2 class="font-bold">Usuarios</h2>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10 text-right">
                        <span> Usuarios registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class="col-md-2">
                        <i class="icon-user fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('users.common.filters')

    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <br>
                    @endif
                    @if(count($list))
                        <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Nombre completo</th>
                                    <th>Rol</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Estado</th>
                                    <th>Ver / Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td><a href="{{ route('usuarios.edit', $item->id) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->roles->implode('name', ', ') }}</td>
                                        <td>{{ $item->username }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->state }}</td>
                                        <td class="text-right"><a href="{{ route('usuarios.edit', $item->id) }}">Ver / Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun no hay usuarios registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/app/users.js') }}"></script>
@stop

