<?php 
	
	class GestorPerfilController{

		public function perfilUsuarioController( array $datos){

			$trimmed_data = array_map('trim', $datos);

			if (!empty($datos)) {
				
				$datosController = array( 	"idUsuario"=>$datos["idUsuarioPerfil"],
											"passwordNuevo"=>$datos["passwordNuevo"],
											"confirmarPassword"=>$datos["confirmarPassword"]);


				if (!$datosController["passwordNuevo"] || !$datosController["confirmarPassword"]) {
				
					throw new Exception(FIELDS_MISSING);
				
				}

				if ($datosController["passwordNuevo"] != $datosController["confirmarPassword"]) {
				
					throw new Exception(PASSWORD_NOT_MATCH);

				}

				$respuesta = GestorPerfilModel::perfilUsuarioModel($datosController, 'usuario');

			}

			if ($respuesta == 'success') {
				
				return true;

			}else{

				throw new Exception( FIELDS_MISSING );

			}

		}


	}

