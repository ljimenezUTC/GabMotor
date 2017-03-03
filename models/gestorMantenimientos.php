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

		#AGREGAR LOS MANTENIMIENTOS EN LA TABLA TEMPORAL Y SU PRESENTACION EN LA VISTA AGREGAR MANTENIMIENTOS
		#---------------------------------------------------------------------------------------------------
		public function agregarMantenimientosModel($datosModel,$tablaTemporalMantenimientos, $tablaMantenimiento, $tablaCategoria){

			session_start();

			$sessionId = session_id();

			$stmtTmpInsertar = Conexion::conectar()->prepare("INSERT INTO $tablaTemporalMantenimientos (id_mantenimiento, session_id) VALUES(:idMantenimiento, :sessionId)");

			$stmtTmpInsertar->bindParam(":idMantenimiento",$datosModel, PDO::PARAM_INT);
			$stmtTmpInsertar->bindParam(":sessionId",$sessionId, PDO::PARAM_STR);

			if($stmtTmpInsertar->execute()){

				$stmt = Conexion::conectar()->prepare("SELECT $tablaTemporalMantenimientos.id_mantenimiento, $tablaTemporalMantenimientos.id_temporal, $tablaMantenimiento.descripcion_mantenimiento, $tablaCategoria.nombre_categoria FROM $tablaTemporalMantenimientos INNER JOIN $tablaMantenimiento ON $tablaTemporalMantenimientos.id_mantenimiento = $tablaMantenimiento.id_mantenimiento INNER JOIN categoria ON $tablaMantenimiento.id_categoria = $tablaCategoria.id_categoria ORDER BY $tablaCategoria.id_categoria ASC");

				$stmt->execute();

				return $stmt->fetchAll();

				$stmt->close();

			}else{

				return 'error';

			}

			$stmtTmpInsertar->close();

		}

		#
		#---------------------------------------------------------------------------------------------------
		public function eliminarMantenimientosTemporalModel($datosModel, $tablaTemporalMantenimientos, $tablaMantenimiento, $tablaCategoria){

			$stmtEliminar = Conexion::conectar()->prepare("DELETE FROM $tablaTemporalMantenimientos WHERE id_temporal = :idTemporal");

			$stmtEliminar->bindParam(":idTemporal", $datosModel, PDO::PARAM_INT);

			if ($stmtEliminar->execute()) {
				
				$stmt = Conexion::conectar()->prepare("SELECT $tablaTemporalMantenimientos.id_mantenimiento, $tablaTemporalMantenimientos.id_temporal, $tablaMantenimiento.descripcion_mantenimiento, $tablaCategoria.nombre_categoria FROM $tablaTemporalMantenimientos INNER JOIN $tablaMantenimiento ON $tablaTemporalMantenimientos.id_mantenimiento = $tablaMantenimiento.id_mantenimiento INNER JOIN categoria ON $tablaMantenimiento.id_categoria = $tablaCategoria.id_categoria ORDER BY $tablaCategoria.id_categoria ASC");

				$stmt->execute();

				return $stmt->fetchAll();

				$stmt->close();

			}else{

				return 'error';

			}

			$stmtEliminar->close();

		}

	}
 ?>