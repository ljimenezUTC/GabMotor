<?php 
	
	class GestorPerfilModel{

		public function perfilUsuarioModel($datosModel, $tablaUsuario){


			$stmt = Conexion::conectar()->prepare("UPDATE usuario SET password_usuario = :password WHERE id_usuario = :idUsuario ");

			$stmt->bindParam(":idUsuario", $datosModel["idUsuario"], PDO::PARAM_INT);
			$stmt->bindParam(":password", $datosModel["passwordNuevo"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return 'success';
			}else{

				return 'error';
			}


			
		}
	}

