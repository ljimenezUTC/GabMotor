<?php 
	
	require_once "conexion.php";
	
	class GestorMantenimientosModel
	{
		
		# LISTAR VEHICULOS PARA EL INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------
		public function listarVehiculosMantenimientosModel($tablaVehiculo){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaVehiculo ");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();

		}

		#LISTAR LAS CATEGORIAS PARA IMPRIMIRLAS EN EL COMBOBOX DEL INGRESO DE MANTENIMIENTOS
		#--------------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosModel($tablaCategoria){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaCategoria");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();

		}

		#LISTAR LOS MANTENIMIENTOS PARA IMPRIMIRLOS EN EL COMBOBOX DE LA VISTA DE INGRESO DE MANTENIMIENTOS
		#---------------------------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosSubItemsModel($tablaCategoria, $tablaMantenimiento, $datosModel){

			$stmt = Conexion::conectar()->prepare("SELECT $tablaMantenimiento.* FROM $tablaMantenimiento INNER JOIN $tablaCategoria ON $tablaMantenimiento.id_categoria = $tablaCategoria.id_categoria  WHERE $tablaMantenimiento.id_categoria = :idCategoria");

			$stmt->bindParam(":idCategoria",$datosModel, PDO::PARAM_INT);

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();

		}

	}
 ?>