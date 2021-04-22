<?php $result = session('result'); ?>
		
<div class="row">
	<div class="col-md-offset-1 col-md-10">

		@if($result['type'] == 'none')
			<h1 class="text-center text-nofound">NO SE ENCONTRARON RESULTADOS</h1>
			<div class="text-right" style="width: 80%; margin: 0 auto">
				@if($type == 'manual')
					<a href="{{ url('porteria/busqueda-manual') }}" class="btn btn-primary">Limpiar</a>
				@else 
					<a href="{{ url('porteria/busqueda-por-codigo-de-barras') }}" class="btn btn-primary">Limpiar</a>
				@endif
			</div>
		@elseif($result['type'] == 'student')
			<div id="{{ $type=='barcode'? 'info': ''}}">
				<h1 class="text-center text-name">{{ $result['name'] }}</h1>
				<br>
				<div class="col-md-3">
					<figure class="avatar avatar-frame animated flipInX" style="float:none; margin:0 auto">
						@if($result['picture'] != "default.jpg")
                        	<img src="{{ asset('pictures/students/' . $result['picture']) }}" id="picture_preview">
	                    @else
	                        <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
	                    @endif
                	</figure>
				</div>
				<div class="col-md-9">
					<div class="frame">
						
						<h2 style="font-weight: bold; margin-top: 0">
							Aprendiz
							@if($result['state'] == 'Activo')
								<span class="label label-info pull-right">{{ $result['state'] }}</span>
							@else
								<span class="label label-danger pull-right">{{ $result['state'] }}</span>
							@endif 

						</h2>
						<br>
		        		<ul class="list-group">
		        			<li class="list-group-item"><h3>Ficha: <span class="text-mute">{{ $result['ficha'] }}</span></h3></li>
		        			<li class="list-group-item"><h3>Programa: <span class="text-mute">{{ $result['program'] }}</span></h3></li>
		        			<li class="list-group-item"><h3>Área: <span class="text-mute">{{ $result['area'] }}</span></h3></li>
		        			<li class="list-group-item"><h3>Fecha de terminacion de la ficha: <span class="text-mute">{{ $result['end_date_course'] }}</span></h3></li>
		        		</ul>					            
					</div>
					<div class="footer-frame">
						<h3>Centro de teleinformatica y producción multimedia</h3>
						<h2>Regional Cauca</h2>
					</div>
						
				</div>
			</div>
		@else 
			<div id="{{ $type=='barcode'? 'info': ''}}">
				<h1 class="text-center text-name">{{ $result['name'] }}</h1>
				<br>
				<div class="col-md-3">
					<figure class="avatar avatar-frame animated flipInX" style="float:none; margin:0 auto">
						@if($result['picture'] != "default.jpg")
                        	<img src="{{ asset('pictures/employees/' . $result['picture']) }}" id="picture_preview">
	                    @else
	                        <img src="{{ asset('pictures/default.jpg') }}" id="picture_preview" class="profile-landscape">
	                    @endif
                	</figure>
				</div>
				<div class="col-md-9">
					<div class="frame">
						
						<h2 style="font-weight: bold; margin-top: 0">
							Funcionario
							@if($result['state'] == 'Activo')
								<span class="label label-info pull-right">{{ $result['state'] }}</span>
							@else
								<span class="label label-danger pull-right">{{ $result['state'] }}</span>
							@endif 

						</h2>
						<br>
		        		<ul class="list-group">
		        			<li class="list-group-item"><h3>Tipo: <span class="text-mute">{{ $result['type_contract'] }}</span></h3></li>
		        			<li class="list-group-item"><h3>Cargo: <span class="text-mute">{{ $result['type_employee'] }}</span></h3></li>
		        			<li class="list-group-item"><h3>Área: <span class="text-mute">{{ $result['area'] }}</span></h3></li>
		        			
		        		</ul>					            
					</div>
					<div class="footer-frame">
						<h3>Centro de teleinformatica y producción multimedia</h3>
						<h2>Regional Cauca</h2>
						<div class="text-right">
						@if($type == 'manual')
							<a href="{{ url('porteria/busqueda-manual') }}" class="btn btn-success btn-warning">Limpiar</a>
						@else 
							<a href="{{ url('porteria/busqueda-por-codigo-de-barras') }}" class="btn btn-success btn-warning">Limpiar</a>
						@endif
						
						</div>
					</div>
						
				</div>
			</div>
		@endif
	</div>
</div>