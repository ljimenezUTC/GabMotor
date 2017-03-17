$(document).ready(function() {

	listarCategoriasMantenimientosSubItems();
});


/*========================================================================================
	Agregar vehiculos seleccionado a las cajas de texto en el ingreso de mantenimientos
==========================================================================================*/
function agregarVehiculo( id, placas, marca, modelo, kilometraje, nombreCliente, apellidoCliente ){

	$("#idVehiculoIngresoMantenimiento").attr('value', id);
	$("#placasVehiculoIngresoMantenimiento").attr('value', placas);
	$("#marcaVehiculoIngresoMantenimiento").attr('value', marca);
	$("#modeloVehiculoIngresoMantenimiento").attr('value', modelo);
	$("#kilometrajeVehiculoIngresoMantenimiento").attr('value', kilometraje);

	$("#nombresClienteIngresoMantenimiento").attr('value', nombreCliente + ' ' + apellidoCliente);

	$("#myModal").modal('hide');
	
}


/*========================================================================
	Listar categorias y mantenimientos en la vista ingreso mantenimientos
==========================================================================*/
function listarCategoriasMantenimientosSubItems(){

	$.ajax({

		type: 'POST',
		url: 'views/ajax/cargarMantenimientos.php',
		data: {"action":"ajaxMantenimiento"}

	})
	.done(function(datos){

		//console.log(datos);
		$("#resultados").html(datos);

	})
	.fail(function(error){

		console.log("complete" + error);

	})
	.always(function() {

		console.log("complete");

	});

}