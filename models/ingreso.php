<?php 

	require_once "conexion.php";

	class ingresoModels
	{

		public function ingresoModel($datosModel,$tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuario where email_usuario=:email and password_usuario=:password");

			$stmt->bindParam(":email",$datosModel["email"], PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);

			$stmt->execute();

			$stmt->fetch();

			return $stmt->rowCount();

			$stmt->close();

		}
	}
 