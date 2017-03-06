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

function agregarVehiculo( id, placas, marca, modelo, kilometraje, nombreCliente, apellidoCliente){

	$("#idVehiculoIngresoMantenimiento").attr('value', id);
	$("#placasVehiculoIngresoMantenimiento").attr('value', placas);
	$("#marcaVehiculoIngresoMantenimiento").attr('value', marca);
	$("#modeloVehiculoIngresoMantenimiento").attr('value', modelo);
	$("#kilometrajeVehiculoIngresoMantenimiento").attr('value', kilometraje);

	$("#nombresClienteIngresoMantenimiento").attr('value', nombreCliente + ' ' + apellidoCliente);
	

	
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

			$("#resultados").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Clos'><span aria-hidden='true'>&times;</span></button>Debe seleccionar una categoría.</div>");

		}else{

			if (idMantenimiento == "0") {

				$("#resultados").html("<div class='alert alert-danger alert-dismissible fade show' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Clos'><span aria-hidden='true'>&times;</span></button>Debe seleccionar un mantenimiento.</div>");

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


function eliminarMantenimiento(idTemporalMantenimiento) {


	$.ajax({
		url: 'views/ajax/gestorMantenimientos/agregarMantenimientos.php',
		type: 'GET',
		data: {'idTemporalMantenimiento': idTemporalMantenimiento},
	})
	.done(function(datos) {

		//alert(datos);
		//console.log(datos);
		$("#resultados").html(datos);

	})
	.fail(function() {

		console.log("error");

	})
	.always(function() {

		console.log("complete");

	});
	
}