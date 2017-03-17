<?php 
	
	require_once "conexion.php";

	class GestorVehiculosModel {

		#LISTAR LISTA DE CLIENTES PARA EL REGISTRO DE LOS VEHICULOS
		#-------------------------------------------------------------------
		
		public function listarClientesVehiculosModel($tablaCliente){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaCliente");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();


		}


		#
		#-------------------------------------------------------------------------------------------------------------
		 public function validarPlacasVehiculoModel($datosModel, $tablaVehiculo){

			 $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaVehiculo WHERE placas_vehiculo = :placasVehiculo");

			 $stmt->bindParam(":placasVehiculo", $datosModel, PDO::PARAM_STR);

			 $stmt->execute();

			 $stmt->fetch();

			 return $stmt->rowCount();

			 $stmt->close();

		 }




		#REGISTRAR VEHICULOS
		#----------------------------------------------------------------
		public function ingresarVehiculosModel($datosModel, $tablaVehiculo){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tablaVehiculo (id_cliente, placas_vehiculo, marca_vehiculo, modelo_vehiculo, anio_vehiculo, kilometraje_vehiculo) VALUES ( :idCliente, :placas, :marca, :modelo, :anio, :kilometraje);");

			$stmt->bindParam(":idCliente",$datosModel["idCliente"], PDO::PARAM_INT);
			$stmt->bindParam(":placas", $datosModel["placas"], PDO::PARAM_STR);
			$stmt->bindParam(":marca", $datosModel["marca"], PDO::PARAM_STR);
			$stmt->bindParam(":modelo", $datosModel["modelo"], PDO::PARAM_STR);
			$stmt->bindParam(":anio", $datosModel["anio"], PDO::PARAM_INT);
			$stmt->bindParam(":kilometraje", $datosModel["kilometraje"], PDO::PARAM_INT);
			

			if ($stmt->execute()) {
				
				return 'success';

			}else{

				return 'error';
				
			}

			$stmt->close();


		}



		#LISTAR VEHICULOS
		#----------------------------------------------------------------
		public function listarVehiculosModel($tablaVehiculo, $tablaCliente){

			$stmt = Conexion::conectar()->prepare("SELECT $tablaVehiculo.*, $tablaCliente.id_cliente, $tablaCliente.cedula_cliente, $tablaCliente.nombre_cliente, $tablaCliente.apellido_cliente FROM $tablaVehiculo INNER JOIN $tablaCliente ON $tablaVehiculo.id_cliente = $tablaCliente.id_cliente  ORDER BY $tablaCliente.id_cliente ASC");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();

		}




		#EDITAR VEHICULOS
		#----------------------------------------------------------------
		public function editarVehiculosModel($datosModel, $tablaVehiculo, $tablaCliente){

			$stmt = Conexion::conectar()->prepare("SELECT $tablaVehiculo.*, $tablaCliente.* FROM $tablaVehiculo INNER JOIN $tablaCliente ON $tablaVehiculo.id_cliente = $tablaCliente.id_cliente WHERE id_vehiculo = :idVehiculo");

			$stmt->bindParam(":idVehiculo",$datosModel, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetch();

			$stmt->close();

		}




		#ACTUALIZAR VEHICULOS
		#----------------------------------------------------------------
		public function actualizarVehiculosModel($datosModel, $tablaVehiculo){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablaVehiculo SET id_cliente = :idCliente, placas_vehiculo = :placas, marca_vehiculo = :marca, modelo_vehiculo = :modelo, anio_vehiculo = :anio, kilometraje_vehiculo = :kilometraje WHERE id_vehiculo = :idVehiculo");

			$stmt->bindParam(":idVehiculo", $datosModel["idVehiculo"], PDO::PARAM_INT);

			$stmt->bindParam(":idCliente", $datosModel["idCliente"], PDO::PARAM_INT);
			$stmt->bindParam(":placas", $datosModel["placas"], PDO::PARAM_STR);
			$stmt->bindParam(":marca", $datosModel["marca"], PDO::PARAM_STR);
			$stmt->bindParam(":modelo", $datosModel["modelo"], PDO::PARAM_STR);
			$stmt->bindParam(":anio", $datosModel["anio"], PDO::PARAM_INT);
			$stmt->bindParam(":kilometraje", $datosModel["kilometraje"], PDO::PARAM_INT);

			if ($stmt->execute()) {

				return 'success';

			}else{

				return 'error';

			}

			$stmt->close();

		}




		#BORRAR VEHICULOS
		#----------------------------------------------------------------
		public function borrarVehiculosModel($datosModel, $tablaVehiculo){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tablaVehiculo WHERE id_vehiculo = :idVehiculo");

			$stmt->bindParam(":idVehiculo", $datosModel, PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				return 'success';

			}else{

				return 'error';

			}

			$stmt->close();

		}


	}