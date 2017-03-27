<?php 

	class GestorCitasModel{

		#
		#--------------------------------------------------------------
		public function listarCitasDelDiaModel(){

			$stmt = Conexion::conectar()->prepare("SELECT cliente.nombre_cliente, cliente.apellido_cliente, vehiculo.placas_vehiculo, vehiculo.marca_vehiculo, vehiculo.modelo_vehiculo , cita.* FROM cita INNER JOIN vehiculo ON cita.id_vehiculo = vehiculo.id_vehiculo INNER JOIN cliente ON vehiculo.id_cliente = cliente.id_cliente WHERE cita.estado_cita = 1  AND cita.fecha_cita = CURDATE()");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();

		}

		public function realizarCitaModel($datosModel, $tablaCita){

			$stmt = Conexion::conectar()->prepare("UPDATE $tablaCita SET estado_cita = '0' WHERE id_cita = :idCita");

			$stmt->bindParam(":idCita", $datosModel, PDO::PARAM_INT);

			if($stmt->execute()){

				return 'success';

			}else{

				return 'error';

			}

			$stmt->close();
		}

	}
