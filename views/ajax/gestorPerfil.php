<?php 

	require_once "../../controllers/gestorPerfil.php";
	require_once "../../models/gestorPerfil.php";


	#CLASE Y METODOS
	#--------------------------------------------------------------
	
	class Ajax{

		#VALIDAR QUE LA CEDULA DEL CLIENTE INGRESADO NO SE ENCUENTRE EN LA BASE DE DATOS
		#-------------------------------------------------------------------------------
		
		public $passwordActual;
		public $idUsuarioPerfil;

		public function validarPasswordActual(){

			$datos = array("passwordActual"=>$this->passwordActual, "idUsuarioPerfil"=>$this->idUsuarioPerfil);

			$respuesta = GestorPerfilController::validarPasswordActualController($datos);
			
			echo $respuesta;

		}
	}

	#OBJETOS
	#--------------------------------------------------------------------------
	$action = (isset($_REQUEST["actionPerfil"]) && $_REQUEST["actionPerfil"] !=NULL) ? $_REQUEST["actionPerfil"]:"";

	if ($action == 'ajaxPerfil') {

		$a = new Ajax();

		if (isset($_REQUEST["idUsuarioPerfil"]) && !empty($_REQUEST["idUsuarioPerfil"])) {
		
			$a -> idUsuarioPerfil = $_REQUEST["idUsuarioPerfil"];

		}
		 if (isset($_REQUEST["passwordActual"]) && !empty($_REQUEST["passwordActual"])) {
			
			$a -> passwordActual = $_REQUEST["passwordActual"];
			
		}

		$a->validarPasswordActual();

	}


