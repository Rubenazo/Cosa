@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>{{ $datos->nombre.' '.$datos->apellido }}</h3>
	<div class="panel list-group-item col-xs-6" style="background-color:#E5E5E5">{{ $plan->descripcion }}</div> 
	<div class="panel list-group-item col-xs-1" style="background-color:#7ED3FF; text-align:center">                                           
		<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></div>
	<div class="panel list-group-item col-xs-5" style="background-color:#E5E5E5">{{ $plan->precio }}Bs</div>

	{{ Form::open(array('url' => 'banco')) }}
		
		<div class="form-group col-xs-6">
			{{ Form::label('bantrans','Seleccione el banco desde el que transfiere') }}
			<select id="bantrans" class="form-control" name="bantrans_id">
			    <option value="" disabled selected style="display:none">Seleccione</option>
				@foreach($bancos as $banco)
					<option value="{{$banco->id}}"> {{ $banco->descripcion }} </option>
				@endforeach
			</select>
		</div>

		<div class="form-group col-xs-6">
			{{ Form::label('bancos','Seleccione el banco al que quiere transferir') }}
			<select id="bancos" class="form-control" name="banco_id">
			    <option value="" disabled selected style="display:none">Seleccione</option>
				@foreach($bancos as $banco)
					<option value="{{$banco->id}}"> {{ $banco->descripcion }} </option>
				@endforeach
			</select>
		</div>

		<div id="cuentas" class="form-group">
			<table class="table table-striped">

			</table>		
		</div>
		
		<div id="transferencia" class="form-group">
			<div class="form-group col-xs-6">
				{{ Form::label('transferencia','Numero de Transferencia') }}
				{{ Form::text('transferencia',Input::old('transferencia'),array('class'=>'form-control',                                       			 'placeholder'=>'Numero', 'autocomplete'=>'off')) }}
			</div>

			<div class="form-group col-xs-6">
				{{ Form::label('monto','Monto de Transferencia') }}
				{{ Form::text('monto',Input::old('monto'),array('class'=>'form-control', 'placeholder'=>'Monto', 'autocomplete'=>'off')) }}
			</div>
		</div>

		<input name="usuario_id" type="text" value="{{$datos->id}}" style="display:none">
		<input name="plan_id" type="text" value="{{$plan->id}}" style="display:none">

		{{ Form::submit('Guardar',array('class'=>'btn btn-success center-block'))}}
	{{ Form::close() }}
</div>




@stop