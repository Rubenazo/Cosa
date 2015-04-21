/* INICIO INICIO INICIO */

$(document).ready(function() { 	
	$('.jumbotron').hide();
	$('.jumbotron').fadeIn(1500);
	$('#login .form-group').hide();
	$('#login .btn').attr('type','button');

	$('#login .btn').mouseup(function() {
		$('#login .form-group').slideDown('slow', function() {
			$('.alert').fadeOut();
			$('#login .btn').attr('type','submit');	
		});
	});
});

/* CREAR USUARIO CREAR USUARIO CREAR USUARIO */

$(document).ready(function() { 	
	$('#botoncrear').mouseup(function() {
		$('#botoncrear').after('<button class="btn btn-warning center-block"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Cargando...</button>');
		$('#botoncrear').hide();
	});
});

/* CREAR BANCO CREAR BANCO CREAR BANCO */

$(document).ready(function() { 	
	$('#btncuenta').mouseup(function() {
		if ($('#crearban').attr('aria-expanded') == 'true')
			$('#crearban').collapse('hide');
		if ($('#agcuenta').attr('aria-expanded') == 'true')
			$('#crearban').collapse('show');
	});
});	

/* MOSTRAR MOSTRAR MOSTRAR */

$(document).ready(function() { 
	$('#buscar').keyup(function() {
		var busqueda = $(this).val();
		if (busqueda != '')
		{	
			$('.panel a').hide();
			$('.panel a:contains("'+busqueda+'")').show();
		}
		else
		{
			$('.panel a').show();
		}
	});
});

/* PAGAR PAGAR PAGAR */

$(document).ready(function() {
	$('#cuentas').hide();

	$('#btnf').mouseup(function() {
		if ($('#listpago').attr('aria-expanded') == 'true')
			$('#listpago').collapse('hide');
	});

	$('#btnl').mouseup(function() {
		if ($('#formpago').attr('aria-expanded') == 'true')
			$('#formpago').collapse('hide');
	});

	$('#bancos').change(function() {
		var id = $('#bancos option:selected').attr('value');
		
		$.ajax({
			url: '../formupago',
			type: 'GET',
			dataType: 'json',
			data: {'bancoid': id},
			success:function(response)
			{	
				$('#cuentas').slideUp('slow', function() { 
					$('#cuentas .table').empty();
					for (var i in response['cuentas'])
					{
						$('#cuentas .table').append('<tr> <td>' + response['cuentas'][i].numero + '</td> <td>' + response['cuentas'][i].tipo + 
							               '</td> <td> <input type="radio" name="num_cuenta_id" value=' + response['cuentas'][i].id + '> </td> </tr>');
					}
					$('#cuentas').slideDown('slow'); 
				});
			}
		});
	});
});

/* BUSCADOR BUSCADOR BUSCADOR */

$(document).ready(function() {
	var filtro = [];
	$('#busqueda').hide();
	$('#filtros label').mouseup(function() {
		if ($(this).attr('aria-pressed') == 'false')
		{	
			$(this).attr('aria-pressed','true');
			filtro.push($(this).children().attr('value'));
		}
		else
		{
			$(this).attr('aria-pressed','false');
			pos = filtro.indexOf($(this).children().attr('value'));
			filtro.splice(pos, 1);
		}
		if (filtro[0] == null)
		{
			$('#busqueda').slideUp('slow');
		}
		else
		{
				$('#busqueda').slideUp('slow');
				$('#busqueda').slideDown('slow');
		}
	});
});