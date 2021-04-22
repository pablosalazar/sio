@extends("layouts.app")

@section("breadcrumb")
    @include("supervisors.common.breadcrumb")
@endsection

@section("content")

    <div class="widget style1">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <span> Lista de </span>

                <h2 class="font-bold">Suspervisores</h2>
            </div>
            <div class=" col-lg-6 col-sm-6">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                        <span> Suspervisores registrados </span>

                        <h2 class="font-bold">{{ count($supervisors) }}</h2>
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-shield fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('supervisors.common.form')

 
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <br>
                    @endif
                    @if(count($supervisors))
                        <table id="table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nombre completo</th>
                                <th>Cargo</th>
                                <th>Numeró de identificación</th>
                                <th>Contratos supervisados</th>
                                <th class="text-right">Remover</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($supervisors as $item)
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
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td class="text-right">{{ $item->document_number }}</td>
                                        <td class="text-center">{{ DB::table('contracts')->where('supervisor_id', $item->id)->count() }}</td>
                                        <td class="text-right">
                                            <a href="" data-id="{{ $item->id }}" class="btn-remove">Remover</a>
                                        </td> 
                                    </tr>
                                @endforeach               
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            Aún no hay supervisores asignados.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Form quitar un funcionario de la lista de supervisores -->
    {{ Form::open(['route' => ['supervisores.update', 'EMPLOYEE_ID'], 'method' => 'PATCH', 'id'=>'form-remove']) }} 
    {{ Form::close() }}

@endsection


@section('scripts')
    <script src="{{ asset('js/app/supervisors.js') }}"></script>
@stop

