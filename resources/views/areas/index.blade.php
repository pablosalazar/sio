@extends("layouts.app")

@section("breadcrumb")
    @include("areas.common.breadcrumb")
@endsection

@section("content")
      <div class="widget style1">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <span> Lista de</span>

                <h2 class="font-bold">Áreas</h2>
            </div>
            <div class=" col-lg-6 col-sm-6">
                <div class="row">
                    <div class=" col-lg-10 col-sm-10 text-right">
                        <span> Áreas registradas </span>

                        <h2 class="font-bold">{{ count($list) }}</h2>
                    </div>
                    <div class=" col-lg-2 col-sm-2">
                        <i class="icon-direction fa-4x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('areas.common.filtros')

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
                    @if(count($list))
                    <div class="table-responsive">
                            <table id="table" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nombre del área</th>
                                    <th>Ver / Editar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td><a href="{{route('areas.edit', $item->id)}}">Ver / Editar</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-warning">
                            Aun no hay áreas registradas.
                        </div>
                    @endif
                </div>
            </div>
        </div> 
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/app/areas.js') }}"></script>
@endsection







