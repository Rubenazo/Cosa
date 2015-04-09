@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>{{ $datos->descripcion }}</h3>
	<div class="panel list-group-item col-xs-6" style="background-color:#E5E5E5">Usuarios que han realizados pagos en este banco</div> 
	<div class="panel list-group-item col-xs-1" style="background-color:#7ED3FF; text-align:center">                                           
		<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></div>
	<div class="panel list-group-item col-xs-5" style="background-color:#E5E5E5">{{ $pagos->count() }}</div>

	@foreach($usuarios as $usuario)
		<!-- -->
	@endforeach

<div class="row marketing">
	<div class="well">
		@if($pagos->count() > 0)
			<table class="table table-striped" style="margin-bottom:0">
				<tr>
					<th>Usuarios</th>
					<th>Pagos</th>
				</tr>
				@foreach($pagos as $pago)
	  				<tr>
	  					<td>{{ $usuario::find($pago->usuario_id)->nombre .' '. $usuario::find($pago->usuario_id)->apellido }}</td>
	  					<td>{{ $pago->total }} Bs</td>
	  				</tr>
  				@endforeach
	  			<tr>
	  				<td>Total</td>
	  				<td>{{$pagos->sum('total')}} Bs</td>
	  			</tr>
			</table>
		@else
			<h5>No se ha guardado ningun pago en este banco</h5>
		@endif
	</div>
</div>

</div>

@stop