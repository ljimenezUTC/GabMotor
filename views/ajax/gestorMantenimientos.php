<?php 
	
	require_once "../../models/gestorMantenimientos.php";
	require_once "../../controllers/gestorMantenimientos.php";

#CLASES Y METODOS
#-------------------------------------------------------------------------

class Ajax{

	public $idMantenimiento;
	public $idMantenimientoTemporal;

	public function registrarMantenimientos(){

		$datosAjax = array("idMantenimiento"=>$this->idMantenimiento["id"]);

		$respuesta = GestorMantenimientosController::registrarMantenimientosController($datosAjax);

		echo $respuesta;

	}

	public function EliminarIdTemporal(){

			$idTemporal = $this->idMantenimientoTemporal;

			$respuesta = GestorMantenimientosController::eliminarMantenimientosTemporalController($idTemporal);

			echo  $respuesta;

		}

}

#OBJETOS
#-------------------------------------------------------------------------
if (isset($_POST["idMantenimiento"])) {

	$a = new Ajax();
	$a->idMantenimiento = array("id"=>$_POST["idMantenimiento"]);
	$a->registrarMantenimientos();

}
#-------------------------------------------------------------------------
if (isset($_GET["idTemporalMantenimiento"])) {

		$b = new Ajax();
		$b->idMantenimientoTemporal = $_GET["idTemporalMantenimiento"];
		$b-> EliminarIdTemporal();
	}


 ?>