
/*=============================================
	Validar cedula del cliente en la BD
=============================================*/

	$("#ingresoCedulaCliente").on('change',function(event) {
		event.preventDefault();
		/* Act on the event */

		var cedulaCLiente = $("#ingresoCedulaCliente").val();

		$.ajax({
			url: 'views/ajax/gestorClientes.php',
			type: 'POST',
			data: {cedula: cedulaCLiente},
		})
		.done(function(response) {

			if (response == "true") {
				console.log(response);

				$("#mensajeValidarCedula").html('<span class=" has-error alert-dismissable">El usuario con esta cedula ya existe</span>').fadeIn('slow');

				$("#boton_enviar").attr("disabled", true);

			
			}else{
				$("#mensajeValidarCedula").fadeOut('slow');

				$("#boton_enviar").attr("disabled", false);
				
			}
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});

	});
		


