
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

			$("#mensajeValidarCedula").html('<div class="bg-danger text-white alert-validar">El usuario con esta cedula ya existe.!</div>').fadeIn('slow');

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
		


