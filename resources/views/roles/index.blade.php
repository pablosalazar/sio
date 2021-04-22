@extends("layouts.app")

@section("breadcrumb")
    @include("roles.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <span> Lista de </span>

                <h2 class="font-bold">Roles</h2>
            </div>
            <div class=" col-lg-6 col-sm-6">
                <div class="row">
                    <div class="col-lg-10 col-sm-10 text-right">
                        <span>Roles registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-organization fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('roles.common.filters')


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
                                    <th>Nombre del rol</th>
                                    <th>Permisos asignados</th>
                                    <th>Ver / Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td><a href=" {{ route('roles.edit', $item->id) }} ">{{$item->name}}</a></td>
                                        <td>{{ count($item->permissions) }}</td>
                                        <td class="text-right"><a href="{{ route('roles.edit', $item->id) }}">Ver / Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun no hay roles registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/app/roles.js') }}"></script>
@stop

