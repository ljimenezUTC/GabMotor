$(document).ready(function() {

	listarVehiculosAgregar();
	listarCategoriasMantenimientos();
	listarCategoriasMantenimientosSubItems();

});

function listarVehiculosAgregar(){

	var parametros = {"action":"ajax"};
	$("#loader").fadeIn('slow');

	$.ajax({
		url: 'views/ajax/gestorMantenimientos.php',
		data: parametros,

		beforeSend: function(){

		},

		success: function(datos){

			//console.log(datos);

			$(".listaVehiculosModal").html(datos);

		},

		error: function(error){
			console.log("error"+error);
		}

	});
}

function agregarVehiculo(id, placas, marca, modelo, kilometraje){

	$("#idVehiculoIngresoMantenimiento").attr('value', id);
	$("#placasVehiculoIngresoMantenimiento").attr('value', placas);
	$("#marcaVehiculoIngresoMantenimiento").attr('value', marca);
	$("#modeloVehiculoIngresoMantenimiento").attr('value', modelo);
	$("#kilometrajeVehiculoIngresoMantenimiento").attr('value', kilometraje);

	
}

function listarCategoriasMantenimientos(){

	var parametros = {"action":"ajaxCategoria"};

	$.ajax({
		url: 'views/ajax/cargarCategorias.php',
		data: parametros
	})
	.done(function(datos){

		//console.log(datos);
		$("#ingresoCategoriaMantenimiento").html(datos);

	})
	.fail(function(){

	})
	.always(function() {
		console.log("complete");
	});
}

function listarCategoriasMantenimientosSubItems(){

	$("#ingresoCategoriaMantenimiento").on('change', function(){

		var idCategoria = $("#ingresoCategoriaMantenimiento").val();

		$.ajax({
			type: 'POST',
			url: 'views/ajax/cargarMantenimientos.php',
			data: {"idCategoria":idCategoria, "action":"ajaxMantenimiento"}
		})
		.done(function(datos){

			//console.log(datos);
			$("#ingresoTipoMantenimiento").html(datos);

		})
		.fail(function(){

		})
		.always(function() {
			console.log("complete");
		});
	});

}
