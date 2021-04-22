@extends("layouts.app")

@section("breadcrumb")
    @include ('students.common.breadcrumb',['section' => 'Carga de fotos masiva']) 
@endsection

@section ('content')
    <div class="widget style1">
        <div class="row">
            <div class="col-md-1">
                <i class="icon-graduation fa-4x"></i>
            </div>
            <div class="col-md-10">
                <span> Carga de fotos masiva</span>
                <h2 class="font-bold">Aprendices</h2>
            </div>
            <div class="col-md-1 text-right">
               <i class="fa fa-image fa-4x"></i>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Dropzone área</h5>
                </div>
                <div class="ibox-content">
                    <div class="text-right">
                       <a href="{{ url('aprendices/subir-imagenes') }}" class="btn btn-success">Limpiar</a>
                    </div>
                    {!! Form::open(['route'=> 'subir-imagenes', 'method' => 'POST', 'files'=>'true', 'id' => 'my-dropzone' , 'class' => 'dropzone']) !!}
                        <div class="dropzone-previews"></div>
                        <div class="dz-default dz-message"><span>Da clic aquí o arrastra las imagenes</span></div>
                    {!! Form::open() !!}

                    <!-- {!! Form::open(['route'=> 'subir-imagenes', 'method' => 'POST', 'files'=>'true']) !!}
                        <input type="file" name="file">
                        <input type="submit" value="enviar">
                    {!! Form::open() !!} -->
                   
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    
@endsection