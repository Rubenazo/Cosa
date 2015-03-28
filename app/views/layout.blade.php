<!DOCTYPE HTML>
<html>
	<head>
		<title>Cosa</title>
		{{HTML::style('css/bootstrap.min.css')}}
    	{{HTML::style('css/jumbotron-narrow.css')}}
    	{{HTML::style('css/custom.css')}}
    	{{HTML::script('js/jquery-1.11.2.js')}}
    	{{HTML::script('js/bootstrap.min.js')}}
    	{{HTML::script('js/custom.js')}}
	</head>

	<body>
		<div class="container">
			
			<div clas="header">
				@if (Auth::check())
					<ul class="nav nav-pills pull-right">
						<li>{{ HTML::link('/','Inicio') }}</li>
						<li>{{ HTML::link('usuario','Crear Usuario') }}</li>
						<li>{{ HTML::link('lista','Mostrar Usuarios') }}</li>
					</ul>
				@endif
				<h3 class="text-muted">Cosa</h3>
			</div>

			@yield('contenido')

			<div class="footer">
				@if (Auth::check())
					<h4 class="text-muted text-left col-xs-6" style="margin:0">Bienvenido {{Auth::user()->username}}</h4>	
					<h3 class="text-muted text-right col-xs-6" style="margin:0">Cosa</h3>
				@else
					<h3 class="text-muted text-right">Cosa</h3>
				@endif
			<div>

		</div>
	</body>
</html>