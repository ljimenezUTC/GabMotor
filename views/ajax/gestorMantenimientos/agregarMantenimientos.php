<?php 
	
	require_once "../../../models/gestorMantenimientos.php";
	require_once "../../../controllers/gestorMantenimientos.php";

	#CLASE Y METODOS
	#------------------------------------------------------------------------
	class Ajax{

		public $idMantenimiento;
		public $idMantenimientoTemporal;

		public function agregarMantenimientos(){

			$datos = $this->idMantenimiento;
			
			$respuesta = GestorMantenimientosController::agregarMantenimientosController($datos);

			echo  $respuesta;
			
		}

		public function EliminarIdTemporal(){

			$idTemporal = $this->idMantenimientoTemporal;

			$respuesta = GestorMantenimientosController::eliminarMantenimientosTemporalController($idTemporal);

			echo  $respuesta;

		}

	}




	#OBJETOS
	#------------------------------------------------------------------------
	

	if (isset($_POST["idMantenimiento"])) {

		$a = new Ajax();	
		$a->idMantenimiento = $_POST["idMantenimiento"];
		$a->agregarMantenimientos();

	}

	if (isset($_GET["idTemporalMantenimiento"])) {

		$b = new Ajax();
		$b->idMantenimientoTemporal = $_GET["idTemporalMantenimiento"];
		$b-> EliminarIdTemporal();
	}

	

	