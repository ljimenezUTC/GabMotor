<?php 

	class GestorVehiculosModel {

		#REGISTRAR VEHICULOS
		#----------------------------------------------------------------
				




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
		




		#ACTUALIZAR VEHICULOS
		#----------------------------------------------------------------
		




		#BORRAR VEHICULOS
		#----------------------------------------------------------------


	}