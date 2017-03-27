<?php 
	
	require_once "../models/registro.php";
	class LoginRegistroController{

		public $cedula ;
		public $password;

		public function loginController(){

			$response = array('error'=>FALSE);
				
			$datosController = array("cedula"=>$this->cedula,
										"password"=>$this->password);

			$respuesta = LoginRegistroModel::loginModel($datosController, 'cliente');

			if ($respuesta != FALSE) {

				$response["error"] = FALSE;
				$response["cedula"] = $respuesta["cedula_cliente"];
				$response["nombre"] = $respuesta["nombre_cliente"];
				$response["direccion"] = $respuesta["direccion_cliente"];
				$response["telefono"] = $respuesta["telefono_cliente"];
				$response["fecha_creacion"] = $respuesta["fecha_creacion_cliente"];

					
				echo json_encode($response);
					
				}else{

					$response["error"] = TRUE;
					$response["error_msg"] = "Parametros requeridos cedula o password estan vacios! ";//Parametres required email or password is missing!

					echo json_encode($response);
				}

		}
}

	if (isset($_REQUEST["cedula"]) && isset($_REQUEST["password"])) {

		$a = new LoginRegistroController();
		$a->cedula = $_REQUEST["cedula"];
		$a->password = $_REQUEST["password"];
		$a->loginController();

	}
 ?>