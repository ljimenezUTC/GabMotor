/*==================================================
	Validar placas del vehiculo en la BD
=============================================*/

$("#ingresoPlacasVehiculo").on('change',function() {

	var placasVehiculo = $("#ingresoPlacasVehiculo").val();

	$.ajax({

		url: 'views/ajax/gestorVehiculos.php',
		type: 'POST',
		data: {"placasVehiculo": placasVehiculo}

	})
	.done(function(response) {

		if (response == "true") {

			$("#mensajeValidarPlacas").html('<span class=" has-error alert-dismissable">El usuario con esta cedula ya existe</span>').fadeIn('slow');

			$("#btnGuardarVehiculo").attr("disabled", true);

		}else{

			$("#mensajeValidarPlacas").fadeOut('slow');

			$("#btnGuardarVehiculo").attr("disabled", false);

		}

	})
	.fail(function() {

		console.log("error");

	})
	.always(function() {

		console.log("complete");

	});

});


/*===============================================================================
	Agregar cliente seleccionado a las cajas de texto en el ingreso de vehiculos
=================================================================================*/

function agregar (id, cedula, nombre, apellido, direccion, telefono) {
		
	$("#idClienteIngresoVehiculo").val(id);
	$("#cedulaClienteIngresoVehiculo").attr('value', cedula);
	$("#nombreClienteIngresoVehiculo").val(nombre + " " + apellido);
	$("#direccionClienteIngresoVehiculo").val(direccion);
	$("#telefonoClienteIngresoVehiculo").val(telefono);

	$("#idClienteEditarVehiculo").val(id);
	$("#cedulaClienteEditarVehiculo").attr('value', cedula);
	$("#nombreClienteEditarVehiculo").val(nombre + " " + apellido);
	$("#direccionClienteEditarVehiculo").val(direccion);
	$("#telefonoClienteEditarVehiculo").val(telefono);

	$("#myModal").modal('hide');

}




