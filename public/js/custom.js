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

$(document).ready(function() {
	$('#cuentas').hide();

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
					$('.table').empty();
					for (var i in response['cuentas'])
					{
						$('.table').append('<tr> <td>' + response['cuentas'][i].numero + '</td> <td>' + response['cuentas'][i].tipo + '</td> </tr>');
					}
					$('#cuentas').slideDown('slow'); 
				});
			}
		});
	})
});