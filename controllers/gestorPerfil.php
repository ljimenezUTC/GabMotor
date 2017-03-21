<?php 
	
	class GestorPerfilController{

		#VALIDAR PASSWORD ACTUAL CORRECTO
		#-----------------------------------------------------------------------------
		public function validarPasswordActualController($datos){

			$datosController = array("passwordActual"=>$datos["passwordActual"],"idUsuarioPerfil"=>$datos["idUsuarioPerfil"]);

			$respuesta = GestorPerfilModel::validarPasswordActualModel($datosController, 'usuario');

			if ($respuesta == 1) {

				return 'success';

			}else{

				return 'error';

			}



		}


		# ACTUALIZAR PERFIL
		# -------------------------------------------------------------------------------------------------
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

