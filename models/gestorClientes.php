<?php 

	require_once "conexion.php";

	class GestorClientesModel{

		#REGISTRAR CLIENTES
		#------------------------------------
		public function ingresarClientesModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cedula_cliente, nombre_cliente, apellido_cliente, direccion_cliente, telefono_cliente, password_cliente, fecha_creacion_cliente) VALUES (:cedula , :nombre, :apellido, :direccion, :telefono, :password, NOW());");

			$stmt->bindParam(":cedula",$datosModel["cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre",$datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":apellido",$datosModel["apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion",$datosModel["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono",$datosModel["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":password",$datosModel["password"], PDO::PARAM_STR);

			if ($stmt->execute()) {
				
				return 'success';

			}else{

				return 'error';
				
			}

		}

		#LISTAR CLIENTES
		#------------------------------------
		public function listarClientesModel($tabla)
		{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla  ORDER BY cedula_cliente ASC");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();
		}

		#EDITAR CLIENTES
		#------------------------------------
		public function editarClientesModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where id_cliente = :id");

			$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();
		}


		#ACTUALIZAR CLIENTES
		#------------------------------------
		public function actualizarClientesModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET cedula_cliente = :cedula, nombre_cliente = :nombre, apellido_cliente = :apellido, direccion_cliente = :direccion, telefono_cliente = :telefono, password_cliente = :password where id_cliente = :id");

			$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
			$stmt->bindParam(":cedula", $datosModel["cedula"], PDO::PARAM_STR);
			$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
			$stmt->bindParam(":apellido", $datosModel["apellido"], PDO::PARAM_STR);
			$stmt->bindParam(":direccion", $datosModel["direccion"], PDO::PARAM_STR);
			$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
			$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

			if($stmt->execute()){

				return "success";

			}

			else{

				return "error";

			}

			$stmt->close();

		}

		#BORRAR CLIENTES
		#------------------------------------
		public function borrarClientesModel($datosModel, $tabla){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_cliente = :id");

			$stmt->bindParam(":id", $datosModel, PDO::PARAM_INT);

			if($stmt->execute()){

				return "success";

			}

			else{

				return "error";

			}

			$stmt->close();

		}

		#VALIDAR QUE LA CEDULA QUE INGRESA DEL CLIENTE NO EXISTA EN LA BASE DE DATOS
		#---------------------------------------------------------------------------
		public function validarCedulaClienteModel($datosModel,$tabla){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where cedula_cliente = :cedula");

			$stmt->bindParam(":cedula", $datosModel, PDO::PARAM_STR);

			$stmt->execute();

			$stmt->fetch();

			return $stmt->rowCount();

			$stmt->close();

		}

		


	}
 
 