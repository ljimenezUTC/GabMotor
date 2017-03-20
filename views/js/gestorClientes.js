
/*=============================================
	Validar cedula del cliente en la BD
=============================================*/
$("#ingresoCedulaCliente").on('change',function(event) {

	event.preventDefault();

	var cedulaCLiente = $("#ingresoCedulaCliente").val();

	$.ajax({

		url: 'views/ajax/gestorClientes.php',
		type: 'POST',
		data: {cedula: cedulaCLiente},

	})
	.done(function(response) {

		if (response == "true") {

			$("#mensajeValidarCedula").html('<span class=" has-error alert-dismissable">El usuario con esta cedula ya existe</span>').fadeIn('slow');

			$("#guardarCliente").attr("disabled", true);

		
		}else{

			$("#mensajeValidarCedula").fadeOut('slow');

			$("#guardarCliente").attr("disabled", false);
			
		}

	})
	.fail(function() {

		console.log("error");

	})
	.always(function() {

		console.log("complete");

	});

});
		


