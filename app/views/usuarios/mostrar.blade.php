@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>Lista de Usuarios</h3>
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