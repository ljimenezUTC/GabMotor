<?php 

	require_once "../../models/gestorVehiculos.php";
	require_once "../../controllers/gestorVehiculos.php";
	

	#CLASE Y METODOS
	#--------------------------------------------------------------

		class Ajax{

			public $placasVehiculo;

			#VALIDAR PLACAS EXITENTES DEL VEHICULO EN LA BD
			#----------------------------------------------------------------------------------------------------
			public function validarPlacasVehiculo(){

				$datos = $this->placasVehiculo;

				$respuesta = GestorVehiculosController::validarPlacasVehiculoController($datos);

				echo $respuesta;
			}

		}



	#OBJETOS
	#--------------------------------------------------------------------------
	
	if (isset($_POST["placasVehiculo"])) {

			$d = new Ajax();
			$d->placasVehiculo = $_POST["placasVehiculo"];
			$d->validarPlacasVehiculo();
	}

 ?>