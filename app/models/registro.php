<?php 

	require_once "../../models/conexion.php";

	class LoginRegistroModel{

		public function loginModel($datosModel, $tablaCliente){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaCliente WHERE cedula_cliente = :cedula AND password_cliente = :password");

			$stmt->bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

			if ($stmt->execute()) {

				$cliente = $stmt->fetch();

				//Verificando usuario y password
				//Comprobar si la contraseña es la misma
				if ($datosModel["password"] == $cliente['password_cliente']) {
					# Uatenticacion del usuario es correcta
					return $cliente;
				}
			}else{
				return NULL;
			}

		}

	}

 ?>