<?php 

	require_once "../../controllers/gestorClientes.php";
	require_once "../../models/gestorClientes.php";


	#CLASE Y METODOS
	#--------------------------------------------------------------
	
	class Ajax{

		#VALIDAR QUE LA CEDULA DEL CLIENTE INGRESADO NO SE ENCUENTRE EN LA BASE DE DATOS
		#-------------------------------------------------------------------------------
		
		public $cedulaCliente;

		public function validarCedulaClienteAjax(){

			$datos = $this->cedulaCliente;

			$respuesta = GestorClientesController::validarCedulaClienteController($datos);

			echo $respuesta;



		}
	}

	#OBJETOS
	#--------------------------------------------------------------------------
	if (isset($_POST["cedula"])) {
		
		$a = new Ajax();
		$a -> cedulaCliente = $_POST["cedula"];
		$a->validarCedulaClienteAjax();

	}