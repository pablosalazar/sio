@extends("layouts.app")

@section("breadcrumb")
    @include ('students.common.breadcrumb',['section' => 'Importar aprendices desde Excel']) 
@endsection
@section ('content')
    <div class="widget style1">
        <div class="row">
            <div class="col-md-1">
                <i class="icon-graduation fa-4x"></i>
            </div>
            <div class="col-md-10">
                <span> Importar desde EXCEL</span>
                <h2 class="font-bold">Aprendices</h2>
            </div>
            <div class="col-md-1 text-right">
               <i class="fa fa-file-excel-o fa-4x"></i>
            </div>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-6">
    		<div class="ibox float-e-margins">
		        <div class="ibox-title">
		            <h5>Subir archivo</h5>
		        </div>
		        <div class="ibox-content">
		        	{!!  Form::open(['url' => 'aprendices/importar', 'method' => 'POST', 'id' => 'form', 'files' => true]) !!}
						<div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                            <label for="file">Seleccionar archivo EXCEL</label> <span class="f_req">*</span>
                            <br>
                            <input type="file" name="file" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            
                            @if($errors->has('file'))
                                <p class="help-block">{{ $errors->first('file') }}</p>
                            @endif
						</div>
                        <div class="text-right">
            			    <button type="submit" id="btn-save" class="btn btn-primary">Cargar archivo</button>
                        </div>

        			{!!  Form::close() !!}
                    <br>
                    @if(session('results'))
                        <?php $results = session('results') ?>
                        <div class="alert alert-success">
                            <div class="text-right">
                                <a href="{{ url('aprendices/importar') }}" class="btn btn-primary">Limpiar</a>
                            </div>
                            <h3>Resultados:</h3>
                            <ul>
                                <li>
                                    <h4>Nuevas áreas registradas: {{ count($results['areas']) }}</h4>
                                    <ul>
                                        @foreach( $results['areas'] as $area)
                                            <li>{{ $area }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h4>Nuevos programas registrados: {{ count($results['programs']) }}</h4>
                                    <ul>
                                        @foreach( $results['programs'] as $program)
                                            <li>{{ $program }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h4>Nuevas fichas registradas: {{ count($results['courses']) }}</h4>
                                    <ul>
                                        @foreach( $results['courses'] as $course)
                                            <li>{{ $course }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li>
                                    <h4>Nuevos aprendices ingresados: {{ count($results['students']) }}</h4>
                                    <ul>
                                        @foreach( $results['students'] as $student)
                                            <li>{{ $student }}</li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><h4>Total de registros procesados: {{ $results['total_students']}}</h4></li>
                                <li><h4>Aprendices que ya estaban en la base de datos: {{ $results['total_students'] - count($results['students']) }}</h4></li>
                            </ul>
                            <div class="text-right">
                                <a href="{{ url('aprendices/importar') }}" class="btn btn-primary">Limpiar</a>
                            </div>
                        </div>
                    @endif
        		</div>
        	</div>
        </div>

        <div class="col-md-6">
    		<div class="ibox float-e-margins">
		        <div class="ibox-title">
		            <h5>Indicaciones</h5>
		        </div>
		        <div class="ibox-content">
                    <div class="alert alert-info">
                        <h3>El archivo Excel debe tener los siguientes campos</h3>
                        <ul>
                            <li>Primer Apellido</li>
                            <li>Segundo Apellido</li>    
                            <li>Nombre</li>  
                            <li>Tipo de documento</li>   
                            <li>Número de documento</li> 
                            <li>Tipo de Sangre</li>  
                            <li>Nombre del Programa</li> 
                            <li>Código de Ficha</li> 
                            <li>Centro</li>  
                            <li>Red Tecnologica</li> 
                            <li>Fecha Finalización del Programa</li>
                        </ul>
                    </div>    
        		</div>
        	</div>
        </div>


    </div>
@stop
@section('scripts')
    <!-- <script src="{{ asset('js/app/student.js') }}"></script> -->
@endsection