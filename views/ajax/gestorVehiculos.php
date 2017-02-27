
<?php 
		
	
	require_once "../../models/gestorVehiculos.php";
	require_once "../../controllers/gestorVehiculos.php";


	#CLASE Y METODOS
	#--------------------------------------------------------------

		class Ajax{

			public function listarClientesVehiculos(){

				$respuesta = GestorVehiculosController::listarClientesVehiculosController();

				echo $respuesta;
			}



		}

	#OBJETOS
	#--------------------------------------------------------------------------
	
	$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] != NULL)?$_REQUEST["action"]:"";
	
	if ($action == "ajax") {
		
		$a = new Ajax();
		$a->listarClientesVehiculos();

	}

