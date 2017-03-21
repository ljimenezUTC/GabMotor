<?php 
	
	require_once "conexion.php";

	class GestorPerfilModel{


		#VALIDAR PASSWORD ACTUAL CORRECTO
		#-----------------------------------------------------------------------------
		public function validarPasswordActualModel($datosModel, $tablaUsuario){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaUsuario WHERE id_usuario = :idUsuario AND password_usuario = :passwordUsuario");

			$stmt->bindParam(":idUsuario", $datosModel["idUsuarioPerfil"], PDO::PARAM_INT);
			$stmt->bindParam(":passwordUsuario", $datosModel["passwordActual"], PDO::PARAM_STR);

			$stmt->execute();

			$stmt->fetch();

			return $stmt->rowCount();
			
			$stmt->close();

		}


		#
		#--------------------------------------------------------------------------------------------------------------
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

