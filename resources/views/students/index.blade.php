@extends ('layouts.app')

@section('breadcrumb')
    @include ('students.common.breadcrumb', ['seccion' => 'Agregar'])
@stop

@section ('content')
    <div class="widget style1">
        <div class="row">
            <div class="col-md-6">
                <span> Lista de </span>

                <h2 class="font-bold">Aprendices</h2>
            </div>
            <div class=" col-md-6">
                <div class="row">
                    <div class=" col-md-10 text-right">
                        <span> Aprendices registrados </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class="col-md-2">
                        <i class="icon-graduation fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

     @include('students.common.filters')

    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <a href="{{ url('aprendices/importar') }}" class="btn btn-primary"><i class="fa fa-file-excel-o"></i>&nbsp Importar aprendices desde EXCEL </a>
                <a href="{{ url('aprendices/subir-imagenes') }}" class="btn btn-primary btn-space"><i class="fa fa-image"></i>&nbsp Carga de fotos masiva </a>
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
                                    <th>Foto</th>
                                    <th>Nombre completo</th>
                                    <th>Número de documento</th>
                                    <th>Ficha</th>
                                    <th>Fecha de finalización</th>
                                    <th>Ver / Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>
                                            <figure class="avatar avatar-table">
                                                <a href="{{ route('aprendices.edit', $item->id) }}">
                                                    @if($item->picture != "default.jpg")
                                                        <img src="{{ asset('pictures/students/thumbnails/' . $item->picture) }}" id="picture_preview">
                                                    @else
                                                        <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
                                                    @endif
                                                </a>
                                            </figure>
                                        </td>
                                       <td><a href=" {{ route('aprendices.edit', $item->id) }}">{{ $item->name }}</a></td>
                                       <td>{{ $item->document_number }}</td>
                                       <td>{{ $item->course ? $item->course->code : '' }}</td>
                                       <td class="text-right">{{ $item->course ? $item->course->end_date : '' }}</td>
                                       <td class="text-right"><a href=" {{ route('aprendices.edit', $item->id) }}">Ver / Editar</a>
                                       </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun hay aprendices registrados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script src="{{ asset('js/app/students.js') }}"></script>
@endsection


