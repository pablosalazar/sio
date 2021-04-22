@extends("layouts.app")

@section("breadcrumb")
    @include("employees.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-md-6">
                <span> Lista de </span>

                <h2 class="font-bold">Funcionarios</h2>
            </div>
            <div class=" col-md-6">
                <div class="row">
                    <div class=" col-md-10 text-right">
                        <span> Funcionarios registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class="col-md-2">
                        <i class="icon-briefcase fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('employees.common.filters')

    <div class="row">
        <div class="col-lg-12">
            <div class="pull-right">
                <a href="{{ url('funcionarios/exportar_nivel_academico') }}" class="btn btn-info m-t-xs"><i class="fa fa-file-excel-o"></i> Nivel Académico </a>
                <a href="{{ url('funcionarios/exportar') }}" class="btn btn-success m-t-xs"><i class="fa fa-file-excel-o"></i> Exportar Contratistas </a>
            </div>
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
                                    <th style="width: 40px">Foto</th>
                                    <th>Nombre completo</th>
                                    <th>Tipo de contrato</th>
                                    <th>Tipo de funcionario</th>
                                    <th>Número de identificación</th>                                    
                                    <th class="text-right">Ver / Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>
                                            <figure class="avatar avatar-table">
                                                <a href="{{ route('funcionarios.edit', $item->id) }}">
                                                    @if($item->picture != "default.jpg")
                                                        <img src="{{ asset('pictures/employees/thumbnails/' . $item->picture) }}" id="picture_preview">
                                                    @else
                                                        <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
                                                    @endif
                                                </a>
                                            </figure>
                                        </td>
                                        <td><a href="{{ route('funcionarios.edit', $item->id) }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->type_contract }}</td>
                                        <td>{{ $item->type_employee }}</td>
                                        <td>{{ $item->document_number }}</td>
                                        <td class="text-right"><a href="{{ route('funcionarios.edit', $item->id) }}">Ver / Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun no hay funcionarios registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script src="{{ url('js/app/employees.js') }}"></script>
@stop

