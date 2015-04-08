@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>Lista de Usuarios</h3>

	<div class="form-horizontal">
		<div class="form-group has-feedback" style="width:40%; margin-left:60%">
			<input id="buscar" type="text" class="form-control" placeholder="Buscar" value="" style="border-radius:25px">
			<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
  		</div>
	</div>

	<div class="panel panel-primary">
		<ul class="list-group">
		@foreach($usuarios as $usuario)
			<a class="list-group-item" href="{{URL::to('pago/'.$usuario->id)}}"><li style="list-style-type:none">
				{{ $usuario->nombre .' '. $usuario->apellido }}
			</li></a>
		@endforeach
	</div>
</div>

@stop