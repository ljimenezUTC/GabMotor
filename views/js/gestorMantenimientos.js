$(document).ready(function() {

	listarVehiculosAgregar();
	listarCategoriasMantenimientos();
	listarCategoriasMantenimientosSubItems();
	agregarMantenimiento();

});

function listarVehiculosAgregar(){

	var parametros = {"action":"ajax"};
	$("#loader").fadeIn('slow');

	$.ajax({
		url: 'views/ajax/gestorMantenimientos/gestorMantenimientos.php',
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
		url: 'views/ajax/gestorMantenimientos/cargarCategorias.php',
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
			url: 'views/ajax/gestorMantenimientos/cargarMantenimientos.php',
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

function agregarMantenimiento(){

	$("#agregarIdMantenimiento").on('click', function(){

		var idMantenimiento = $("#ingresoTipoMantenimiento").val();
		var idCategoria = $("#ingresoCategoriaMantenimiento").val();

		if (idCategoria == "0" ) {

			$("#resultados").html("Seleccione una categoria");

		}else{

			if (idMantenimiento == "0") {

				$("#resultados").html("Seleccione un mantenimiento");

			}else{

				$.ajax({
					type: 'POST',
					url: 'views/ajax/gestorMantenimientos/agregarMantenimientos.php',
					data: {"idMantenimiento":idMantenimiento}
				})
				.done(function(datos){

					//alert(datos);
					console.log(datos);
					$("#resultados").html(datos);

				})
				.fail(function(){

				})
				.always(function() {
					console.log("complete");
				});

			}

		}

	});
}
