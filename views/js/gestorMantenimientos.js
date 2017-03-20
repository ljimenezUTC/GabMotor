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

		url: 'views/ajax/cargarMantenimientos.php',
		data: {"action":"ajaxMantenimiento"}

	})
	.done(function(datos){

		$("#resultados").html(datos);

	})
	.fail(function(error){

		console.log("complete" + error);

	})
	.always(function() {

		console.log("complete");

	});

}

/*---------------------------------------------------------------------------
	Despliega el formulario de mantenimientos
-----------------------------------------------------------------------------*/
$("#btnDesplegarMantenimientos").on('click', function(){

	$("#vistaMantenimientos").toggle(400);
	//iniciarPdf();

});


/*--------------------------------------------------------------------------------
	Registra los mantenimientos seleccionados en la tabla temporal para su 
	posterior procesamiento.
--------------------------------------------------------------------------------*/

$("#btnRegistrarMantenimientos").on('click', function(){

	$.ajax({
		url: 'views/ajax/gestorMantenimientos.php',
		type: 'POST',
		data: $("#registrarMantenimientos").serialize(),
	})
	.done(function(response) {

		//console.log("--" + response);
		$("#resultadosMantenimientosTmp").html(response);

	})
	.fail(function() {

		console.log("error");

	})
	.always(function() {

		console.log("complete");

	});
	

	$("#vistaMantenimientos").toggle(400);

});


/*-------------------------------------------------------------------------------
	Desplegar el documento pdf con la factura en caso de que los mantenimientos 
	seleccionados se guarden correctamento.
---------------------------------------------------------------------------------*/
function iniciarPdf(){

	var theURL = "views/pdf/documentos/pedido_pdf.php";

	var winName = "Pedido";

	var features = "";

	var myWidth = "1024";

	var myHeight = "768";

	var isCenter = "true";

	if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!="")?",":"";
    features+=",left="+myLeft+",top="+myTop;
  }
  window.open(theURL,winName,features+((features!="")?",":"")+"width="+myWidth+",height="+myHeight);
}


