@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>Buscador de Clientes</h3>
	
	<label>Filtrar resultados por:</label>
	<div id="filtros" class="row marketing btn-group" data-toggle="buttons" style="margin-left:25px">
	 	<label class="btn btn-primary" aria-pressed="false">
	    	<input type="checkbox" value="zona"> Zona
	  	</label>
	  	<label class="btn btn-primary" aria-pressed="false">
	   	 	<input type="checkbox" value="plan_id"> Plan
	  	</label>
	  	<label class="btn btn-primary" aria-pressed="false">
	    	<input type="checkbox" value="banco_id"> Banco
	  	</label>
	</div>

	<div id="busqueda" class="panel panel-default">
		<ul class="list-group">
			@foreach($zonas as $zona)
				<li class="list-group-item">
					{{ $zona->zona }}
					<ul>
						@foreach($usuarios as $usuario)
							@if($usuario->zona == $zona->zona)
								<li class="list-group-item"> {{ $usuario->nombre }} </li>
							@endif
						@endforeach
					</ul>
				</li>
			@endforeach
		</ul>
	</div>

</div>

@stop