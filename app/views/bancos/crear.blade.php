@extends('layout')

@section('contenido')
<div class="row marketing">
	<h3>Crear Banco</h3>
	
	@if (Session::get('mensaje'))
        <div class="alert alert-success">{{Session::get('mensaje')}}</div>
    @endif

    @if ( $errors->has('numero') or $errors->has('tipo') )
        <div class="alert alert-danger">No se pudo agregar la cuenta</div>
    @endif
	
	<div class="collapse in" id="crearban" aria-expanded="true">
		{{ Form::open(array('url' => 'banco')) }}

	        @if( $errors->has('descripcion') )
	        	<div class="form-group has-error">
	        @else
				<div class="form-group">
			@endif
					{{ Form::label('descripcion','Descripcion') }}
					{{ Form::text('descripcion', Input::old('descripcion'), array('class'=>'form-control center-block', 'placeholder'=>'descripcion', 'autocomplete'=>'off')) }}
			        @if( $errors->has('descripcion') )
			            <span class="help-block"> @foreach($errors->get('descripcion') as $error) * {{ $error }} @endforeach </span>
			        @endif
				</div>
			{{ Form::submit('Guardar',array('class'=>'btn btn-success center-block'))}}
		{{ Form::close() }}
	</div>

	<div class="row marketing text-center">
		<button class="btn btn-primary" id="btncuenta" type="button" data-toggle="collapse" data-target="#agcuenta" aria-expanded="false">
			Agregar Cuenta
		</button>
	</div>

	<div class="collapse" id="agcuenta">
		{{ Form::open(array('url' => 'cuenta')) }}

			<div class="form-group">
				{{ Form::label('banco','Banco') }}
				<select class="form-control" name="banco_id">
					@foreach($bancos as $banco)
						<option value="{{$banco->id}}"> {{ $banco->descripcion }} </option>
					@endforeach
				</select>
			</div>

			@if( $errors->has('numero') )
	        	<div class="form-group has-error">
	        @else
				<div class="form-group">
			@endif
					{{ Form::label('numero','Numero') }}
					{{ Form::text('numero', Input::old('numero'), array('class'=>'form-control center-block', 'placeholder'=>'numero de cuenta', 'autocomplete'=>'off')) }}
			        @if( $errors->has('numero') )
			            <span class="help-block"> @foreach($errors->get('numero') as $error) * {{ $error }} @endforeach </span>
			        @endif
				</div>

			@if( $errors->has('tipo') )
	        	<div class="form-group has-error">
	        @else
				<div class="form-group">
			@endif
					{{ Form::label('tipo','Tipo') }}
					{{ Form::text('tipo', Input::old('tipo'), array('class'=>'form-control center-block', 'placeholder'=>'tipo de cuenta', 'autocomplete'=>'off')) }}
			        @if( $errors->has('tipo') )
			            <span class="help-block"> @foreach($errors->get('tipo') as $error) * {{ $error }} @endforeach </span>
			        @endif
				</div>

			{{ Form::submit('Guardar',array('class'=>'btn btn-success center-block'))}}
		{{ Form::close() }}
	</div>

</div>

@stop