@extends("layouts.app")

@section("breadcrumb")
    @include("programs.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <span> Lista de </span>

                <h2 class="font-bold">Programas</h2>
            </div>
            <div class=" col-lg-6 col-sm-6">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                        <span> Programas registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-briefcase fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('programs.common.filters')


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
                                    <th>Nombre</th>
                                    <th>Área</th>
                                    <th>Ver / Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        
                                        <td></td>
                                        <td class="text-right"><a href="{{ route('programas.edit', $item->id) }}">Ver / Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun hay programas registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ asset('js/app/programs.js') }}"></script>
@endsection

