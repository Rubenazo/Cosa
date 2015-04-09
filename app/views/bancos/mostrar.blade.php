@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>Lista de Bancos</h3>

	<div class="form-horizontal">
		<div class="form-group has-feedback" style="width:40%; margin-left:60%">
			<input id="buscar" type="text" class="form-control" placeholder="Buscar" value="" style="border-radius:25px">
			<span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
  		</div>
	</div>

	<div class="panel panel-primary">
		<ul class="list-group">
		@foreach($bancos as $banco)
			<a class="list-group-item" href="{{URL::to('pagoban/'.$banco->id)}}"><li style="list-style-type:none">
				{{ $banco->descripcion }}
			</li></a>
		@endforeach
	</div>
</div>

@stop