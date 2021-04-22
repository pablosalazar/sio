@extends("layouts.app")

@section('styles')
	<style type="text/css">
		.text-nofound {
			font-weight: bold;
			font-size: 40px;
			color: #b9b9b9;
		}

		.text-name {
			font-weight: bold;
			font-size: 36px;
			color: #676767;
		}

		.label {
		    font-size: 18px !important; 
		    padding: 7px 8px !important;
		}

		.frame {
			background: #fff;
			padding: 20px;
			border-radius: 5px 5px 0 0;
			margin-bottom: 0;

		}
		.footer-frame {
			background: #1ab394;
			color: #fff;
			padding: 10px 20px;
		}

		.text-mute {
			color:#000;
		}
	</style>

@endsection

@section("breadcrumb")
    @include("security.common.breadcrumb")
@endsection

@section("content")
   	
   	<div class="row">
        <div class="col-md-12">
			<div class="tabs-container">
                <div class="tabs-right">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="{{ url('porteria/busqueda-manual') }}"> Busqueda Manual</a></li>
                        <li class=""><a href="{{ url('porteria/busqueda-por-codigo-de-barras') }}">Busqueda con lector de código de barras</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div id="tab-8" class="tab-pane active">
                            <div class="panel-body">
                                <h3 class="text-info">Busqueda Manual</h3>
	                            {!!  Form::open(['url' => 'porteria/buscar', 'method' => 'POST', 'class' => 'form-inline', 'id' => 'form']) !!}
									
	 								<div class="input-group"> 
	 									<input class="form-control" name="search" id="search_field" placeholder="Digite el número de documento" style="width: 500px"> 
	 									<span class="input-group-btn"> 
	 										<button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button> 
	 									</span> 
	 								</div>
						        {!!  Form::close() !!}
                            </div>
                        </div>
                        <div id="tab-9" class="tab-pane">
                            <div class="panel-body">
                                <h3 class="text-info">Busqueda con lector de código de barras</h3>
	                            
	                            {!!  Form::open(['url' => 'porteria/buscar', 'method' => 'POST', 'class' => 'form-inline', 'id' => 'form']) !!}

						            <div class="input-group"> 
	 									<input class="form-control" name="search" placeholder="Digite el número de documento" style="width: 500px"> 
	 									<span class="input-group-btn"> 
	 										<button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button> 
	 									</span> 
	 								</div>

						        {!!  Form::close() !!} 
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
	</div>

	<br>
	
	@if(session('result'))
		
		@include('security.common.info', ['type' => 'manual'])

	@endif
	<br>
	<br>
@endsection


@section('scripts')
    <script src="{{ url('js/app/security.js') }}"></script>
@stop

