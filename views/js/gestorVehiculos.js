

$(document).ready(function() {
	
	load();

});

function load(){

	var parametros = {"action":"ajax"};
	$("#loader").fadeIn('slow');

	$.ajax({
		url: 'views/ajax/gestorVehiculos.php',
		data: parametros,

		beforeSend: function () {

		}, success: function (datos) {
				
				console.log(datos);
				$(".outer_div").html(datos);


		}, 
		error: function(error){
			
			console.log("error" + error);
		
		}
	});

	

}

function agregar (id, cedula, nombre, apellido, direccion, telefono)
		{
		
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


		}


