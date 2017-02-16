<?php 
	
	class IngresoControllers
	{

		public function ingresoController( array $datos){

			$_SESSION['logged_in'] = false;
			
			if (!empty($datos)) {

					
					$datosController = array("email"=>$datos["emailIngreso"],
										 "password"=>$datos["passwordIngreso"]);

					if((!$datosController["email"]) || (!$datosController["password"]) ) {

						throw new Exception( LOGIN_FIELDS_MISSING );
					}

					$respuesta = IngresoModels::ingresoModel($datosController, "usuario");

					if ($respuesta == 1) {

						$_SESSION = $datos;

						$_SESSION['logged_in'] = true;

						return true;

					}else{

						throw new Exception( LOGIN_FAIL );
					}
			
			}else{
				
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
		}
	
	}

 ?>





