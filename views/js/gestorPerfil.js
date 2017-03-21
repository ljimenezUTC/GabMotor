
/*====================================================================
	Validar constrasenia actual correcta
====================================================================*/
$("#passwordActual").on('change', function(){

	var passwordActual = $("#passwordActual").val();
	var idUsuarioPerfil = $("#idUsuarioPerfil").val();

	$.ajax({
		url: 'views/ajax/gestorPerfil.php',
		data: {'actionPerfil':'ajaxPerfil','passwordActual': passwordActual, 'idUsuarioPerfil': idUsuarioPerfil},
	})
	.done(function(datos) {

		console.log("--"+datos+"--");
		if (datos == "success") {

			$("#mensajeValidarPass").html('<span class=" has-error alert-dismissable">El password ingresado es incorrecto! </span>').fadeIn('slow');

			$("#idValidarPass").attr("disabled", true);

		}else{

			$("#mensajeValidarPass").fadeOut('slow');

			$("#idValidarPass").attr("disabled", false);

		}

	})
	.fail(function() {

		console.log("error");

	})
	.always(function() {

		console.log("complete");

	});
	

});