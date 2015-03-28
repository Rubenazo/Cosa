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
			url: '../banco',
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