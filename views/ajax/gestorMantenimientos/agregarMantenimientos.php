<?php 
	
	require_once "../../../models/gestorMantenimientos.php";
	require_once "../../../controllers/gestorMantenimientos.php";

	#CLASE Y METODOS
	#------------------------------------------------------------------------
	class Ajax{

		public $idMantenimiento;

		public function agregarMantenimientos(){

			$datos = $this->idMantenimiento;

			$respuesta = GestorMantenimientosController::agregarMantenimientosController($datos);

			echo $respuesta;
			
		}
	}




	#OBJETOS
	#------------------------------------------------------------------------
	if (isset($_POST["idMantenimiento"])) {
		
		$a = new Ajax();
		$a->idMantenimiento = $_POST["idMantenimiento"];
		$a->agregarMantenimientos();

	}
