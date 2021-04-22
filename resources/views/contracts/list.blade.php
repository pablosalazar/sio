@extends("layouts.app")

@section("breadcrumb")
    @include("contracts.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <span> Lista de </span>

                <h2 class="font-bold">Contratistas</h2>
            </div>
            <div class=" col-lg-6 col-sm-6">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                        <span> Contratistas registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-docs fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('contracts.common.filters')

    <br>
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="{{ route('contrato/exportar') }}" class="btn btn-info btn-space">
                <i class="fa fa-file-excel-o"></i> Exportar a EXCEL
            </a>
        </div>
    </div>
    <br>


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
                                        <th>Foto</th>
                                        <th>Nombre completo</th>
                                        <th>Número de identificación</th>
                                        <th>Tipo de funcionario</th>
                                        <th>No. Contratos</th>
                                        <th>Contratos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $item)
                                        <tr>
                                            <td>
                                                <figure class="avatar avatar-table">
                                                    <a href="{{ route('contratos.index', $item->id) }}">
                                                        @if($item->picture != "default.jpg")
                                                            <img src="{{ asset('pictures/employees/thumbnails/' . $item->picture) }}" id="picture_preview">
                                                        @else
                                                            <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
                                                        @endif
                                                    </a>
                                                </figure>
                                            </td>
                                            <td><a href="{{ route('contratos.index', $item->id) }}">{{ $item->name }}</a></td>
                                            <td>{{ $item->document_number }}</td>
                                            <td>{{ $item->type_employee }}</td>
                                            <td class="text-right">{{ count($item->contracts) }}</td>
                                            <td class="text-right"><a href="{{ route('contratos.index', $item->id) }}">Contratos</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            No hay Contratistas registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/app/contracts.js') }}"></script>
@stop

