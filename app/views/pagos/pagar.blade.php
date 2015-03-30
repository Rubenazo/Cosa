@extends('layout')

@section('contenido')

<div class="row marketing">
	<h3>{{ $datos->nombre.' '.$datos->apellido }}</h3>
	<div class="panel list-group-item col-xs-6" style="background-color:#E5E5E5">{{ $plan->descripcion }}</div> 
	<div class="panel list-group-item col-xs-1" style="background-color:#7ED3FF; text-align:center">                                           
		<span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></div>
	<div class="panel list-group-item col-xs-5" style="background-color:#E5E5E5">{{ $plan->precio }}Bs</div>

	<div class="text-center panel-group" id="alternar">
		<button class="btn btn-primary" id="btnf" type="button" data-toggle="collapse" data-target="#formpago" aria-expanded="false">
			Formulario de Pago
		</button>
		<button class="btn btn-primary" id="btnl" type="button" data-toggle="collapse" data-target="#listpago" aria-expanded="false">
		  	Pagos Realizados
		</button>
		@if (Session::get('mensaje'))
        	<div class="alert alert-success">{{Session::get('mensaje')}}</div>
    	@endif
    	@if (Session::get('errors'))
        	<div class="alert alert-danger">No se pudo procesar el pago</div>
    	@endif
	</div>
	
	<!-- FORMULARIO DE PAGO -->

	<div class="collapse" id="formpago">
  		<div class="well">

			{{ Form::open(array('url' => 'banco')) }}

				<div class="form-group">

					<!-- LISTA DE BANCOS DESDE DONDE SE HACE LA TRANSFERENCIA -->
					
					@if( $errors->has('bantrans_id') )
						<div class="form-group col-xs-6 has-error">
					@else
						<div class="form-group col-xs-6">
					@endif
							{{ Form::label('bantrans','Seleccione el banco desde el que transfiere') }}
							<select id="bantrans" class="form-control" name="bantrans_id">
							    <option value="" disabled selected style="display:none">Seleccione</option>
								@foreach($bancos as $banco)
									<option value="{{$banco->id}}"> {{ $banco->descripcion }} </option>
								@endforeach
							</select>
							@if( $errors->has('bantrans_id') )
								<span class="help-block"> @foreach($errors->get('bantrans_id') as $error) * {{ $error }} @endforeach</span>
							@endif	
						</div>

					<!-- LISTA DE BANCOS A DONDE SE HACE LA TRANSFERENCIA -->

					@if( $errors->has('banco_id') )
						<div class="form-group col-xs-6 has-error">
					@else
						<div class="form-group col-xs-6">
					@endif	
							{{ Form::label('bancos','Seleccione el banco al que quiere transferir') }}
							<select id="bancos" class="form-control" name="banco_id">
							    <option value="" disabled selected style="display:none">Seleccione</option>
								@foreach($bancos as $banco)
									<option value="{{$banco->id}}"> {{ $banco->descripcion }} </option>
								@endforeach
							</select>
							@if( $errors->has('banco_id') )
								<span class="help-block"> @foreach($errors->get('banco_id') as $error) * {{ $error }} @endforeach</span>
							@endif	
						</div>

				</div>

				<!-- TABLA DE CUENTAS -->

				<div id="cuentas" class="form-group">
					<table class="table table-striped">

					</table>	
					@if( $errors->has('num_cuenta_id') )
						<div class="alert alert-danger"> @foreach($errors->get('num_cuenta_id') as $error) * {{ $error }} @endforeach</div>
					@endif	
				</div>
				

				<div id="transferencia" class="form-group">
				
					<!-- CAMPO TRANSFERENCIA -->

					@if( $errors->has('transferencia') )
						<div class="form-group col-xs-6 has-error">
					@else
						<div class="form-group col-xs-6">
					@endif
							{{ Form::label('transferencia','Numero de Transferencia') }}
							{{ Form::text('transferencia',Input::old('transferencia'),array('class'=>'form-control', 'placeholder'=>'Numero', 'autocomplete'=>'off')) }}
							@if( $errors->has('transferencia') )
								<span class="help-block"> @foreach($errors->get('transferencia') as $error) * {{ $error }} @endforeach</span>
							@endif
						</div>

					<!-- CAMPO MONTO -->

					@if( $errors->has('monto') )
						<div class="form-group col-xs-6 has-error">
					@else
						<div class="form-group col-xs-6">
					@endif		
							{{ Form::label('monto','Monto de Transferencia') }}
							{{ Form::text('monto',Input::old('monto'),array('class'=>'form-control', 'placeholder'=>'Monto', 'autocomplete'=>'off')) }}
							@if( $errors->has('transferencia') )
								<span class="help-block"> @foreach($errors->get('monto') as $error) * {{ $error }} @endforeach</span>
							@endif
						</div>
				
				</div>

				<input name="usuario_id" type="text" value="{{$datos->id}}" style="display:none">
				<input name="plan_id" type="text" value="{{$plan->id}}" style="display:none">
				{{ Form::submit('Guardar',array('class'=>'btn btn-success center-block'))}}

			{{ Form::close() }}

		</div>
	</div>

	<!-- LISTA DE PAGOS -->

	<div class="collapse" id="listpago">
  		<div class="well">
  			@if($pagos->count() > 0)
	  			<table class="table table-striped" style="margin-bottom:0">
	  				<tr>
	  					<th>Bancos</th>
	  					<th>Pagos</th>
	  				</tr>
	  				@foreach($pagos as $pago)
		  				<tr>
		  					<td>{{ $banco::find($pago->banco_id)->descripcion }}</td>
		  					<td>{{ $pago->total }} Bs</td>
		  				</tr>
		  			@endforeach
		  			<tr>
		  				<td>Total</td>
		  				<td>{{$pagos->sum('total')}} Bs</td>
		  			</tr>
	  			</table>
	  		@else
	  			<h5>No se ha guardado ningun pago para este usuario</h5>
	  		@endif
  		</div>
  	</div>

</div>

@stop