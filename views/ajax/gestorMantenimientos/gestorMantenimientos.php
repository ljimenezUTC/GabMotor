<?php 

	require_once "../../../models/gestorMantenimientos.php";
	require_once "../../../controllers/gestorMantenimientos.php";

	# CLASE Y METODOS
	# -----------------------------------------------------------------------
	class ajax
	{
		

		#LISTAR LOS VEHICULOS PARA IMPRIMIRLOS EN EL MODAL
		#-----------------------------------------------------------------------------------------
		public function listarVehiculosMantenimientos(){

			$respuesta = GestorMantenimientosController::listarVehiculosMantenimientosController();

			echo $respuesta;

		}
		
	}

	#OBJETOS
	#---------------------------------------------------------------------------------------------
	$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] !=NULL) ? $_REQUEST["action"]:"";

	if ($action == "ajax") {

		$a = new Ajax();
		$a->listarVehiculosMantenimientos();

	}
	
 ?>