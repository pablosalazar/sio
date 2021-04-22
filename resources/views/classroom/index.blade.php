@extends("layouts.app")

@section("breadcrumb")
    @include("classroom.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-md-6">
                <span> Lista de </span>

                <h2 class="font-bold">Ambientes</h2>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-10 text-right">
                        <span> Ambientes registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class="col-md-2">
                        <i class="icon-briefcase fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('classroom.common.filters')


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
                                        <th>Nombre de ambiente</th>
                                        <th>Codigo</th>
                                        <th>Area</th>
                                        <th>Ver / Editar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->area->name }}</td>
                                        <td class="text-right"><a href="{{ route('ambientes.edit', $item->id) }}">Ver / Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun no hay fichas registradas.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('js/app/classrooms.js') }}"></script>
@endsection

