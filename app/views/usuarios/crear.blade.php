@extends('layout')

@section('contenido')
<div class="row marketing">
	<h3>Crear Usuario</h3>

	{{ Form::open(array('url' => 'usuario')) }}

		@if (Session::get('mensaje'))
        	<div class="alert alert-success">{{Session::get('mensaje')}}</div>
        @endif

        @if( $errors->has('nombre') )
        	<div class="form-group has-error">
        @else
			<div class="form-group">
		@endif
				{{ Form::label('nombre','Nombre') }}
				{{ Form::text('nombre', Input::old('nombre'), array('class'=>'form-control', 'placeholder'=>'nombre usuario', 'autocomplete'=>'off')) }}
		        @if( $errors->has('nombre') )
		            <span class="help-block"> @foreach($errors->get('nombre') as $error) * {{ $error }} @endforeach </span>
		        @endif
			</div>


		@if( $errors->has('apellido') )
        	<div class="form-group has-error">
        @else
			<div class="form-group">
		@endif
				{{ Form::label('apellido','Apellido') }}
				{{ Form::text('apellido', Input::old('apellido'), array('class'=>'form-control', 'placeholder'=>'apellido usuario', 'autocomplete'=>'off')) }}
				@if( $errors->has('apellido') )	
					<span class="help-block"> @foreach($errors->get('apellido') as $error) * {{ $error }} @endforeach </span>
				@endif
			</div>


		@if( $errors->has('correo') )
			<div class="form-group has-error">
		@else
			<div class="form-group">
		@endif
				{{ Form::label('correo','Correo') }}
				{{ Form::text('correo', Input::old('correo'), array('class'=>'form-control', 'placeholder'=>'correo usuario', 'autocomplete'=>'off')) }}
				@if( $errors->has('correo') )
					<span class="help-block"> @foreach($errors->get('correo') as $error) * {{ $error }} @endforeach </span>
				@endif	
			</div>


		@if( $errors->has('zona') )
			<div class="form-group has-error">
		@else
			<div class="form-group">
		@endif
				{{ Form::label('zona','Zona') }}
				{{ Form::text('zona', Input::old('zona'), array('class'=>'form-control', 'placeholder'=>'zona usuario', 'autocomplete'=>'off')) }}
				@if( $errors->has('zona') )
					<span class="help-block"> @foreach($errors->get('zona') as $error) * {{ $error }} @endforeach </span>
				@endif
			</div>
				

		<div class="form-group">
			{{ Form::label('plan','Plan') }}
			<select class="form-control" name="plan_id">
				@foreach($planes as $plan)
					<option value="{{$plan->id}}"> {{ $plan->descripcion }} </option>
				@endforeach
			</select>
		</div>

		{{ Form::submit('Guardar',array('class'=>'btn btn-success center-block', 'id'=>'botoncrear'))}}
	{{ Form::close() }}
</div>

@stop

