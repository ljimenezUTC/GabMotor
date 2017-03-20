<?php 
	
	require_once "../../models/gestorMantenimientos.php";
	require_once "../../controllers/gestorMantenimientos.php";

#CLASES Y METODOS
#-------------------------------------------------------------------------

class Ajax{

	public $idMantenimiento;

	public function registrarMantenimientos(){

		$datosAjax = array("idMantenimiento"=>$this->idMantenimiento["id"]);

		$respuesta = GestorMantenimientosController::registrarMantenimientosController($datosAjax);

		echo $respuesta;

	}

}

#OBJETOS
#-------------------------------------------------------------------------
if (isset($_POST["idMantenimiento"])) {

	$a = new Ajax();
	$a->idMantenimiento = array("id"=>$_POST["idMantenimiento"]);
	$a->registrarMantenimientos();

}else{

	echo 'error';
}


 ?>