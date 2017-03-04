<?php 
	
	require_once "conexion.php";
	
	class GestorMantenimientosModel
	{
		
		# LISTAR VEHICULOS PARA EL INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------
		public function listarVehiculosMantenimientosModel($tablaVehiculo, $tablaCliente){

			$stmt = Conexion::conectar()->prepare("SELECT $tablaCliente.nombre_cliente, $tablaCliente.apellido_cliente, $tablaVehiculo.* FROM $tablaVehiculo INNER JOIN cliente ON $tablaVehiculo.id_cliente = $tablaCliente.id_cliente ORDER BY $tablaCliente.id_cliente ASC");

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

		#ELIMINAR MANTENIMIENTOS DE LA TABLA TEMPORAL Y PRESENTACION EN LA VISTA DE AGREGAR MANTENIMIENTOS
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

		#GUARDAR LOS MANTENIMIENTOS REALIZADOS EN LA TABLA DE DETALLE Y ELIMINARLOS EN LA TABLA TEMPORAL
		#-----------------------------------------------------------------------------------------------
		public function registrarMantenimientosModel($datosModel){


			$stmt = Conexion::conectar()->prepare("INSERT INTO orden_pago (id_vehiculo, id_usuario, fecha_ingreso) VALUES(:idVehiculo, '21', NOW())");

			$stmt->bindParam(":idVehiculo",$datosModel,PDO::PARAM_INT);

			if ($stmt->execute()) {
				
				$stmtObtenerIdOrden = Conexion::conectar()->prepare("SELECT LAST_INSERT_ID(id_orden) as last FROM orden_pago ORDER BY id_orden DESC LIMIT 0,1");
				
				if($stmtObtenerIdOrden->execute()){

					$idOrden = $stmtObtenerIdOrden->fetch();
					

					$stmtTmpObtenerRegistros = Conexion::conectar()->prepare("SELECT id_mantenimiento FROM temporal_mantenimientos");

					if($stmtTmpObtenerRegistros->execute()){

						$registroTemporal = $stmtTmpObtenerRegistros->fetchAll();

						foreach ($registroTemporal as $row => $item) {

							$idOrdenPago =  $idOrden["last"];
							$idMantenimiento =  $item["id_mantenimiento"];

							$stmtInertarDetalleOrden = Conexion::conectar()->prepare("INSERT INTO detalle_orden_pago (id_orden, id_mantenimiento) VALUES($idOrdenPago, $idMantenimiento )"); 

							$stmtInertarDetalleOrden->execute();

							$stmtEliminarRegistrosTemporal = Conexion::conectar()->prepare("DELETE FROM temporal_mantenimientos");

							$stmtEliminarRegistrosTemporal->execute();

						}

						return 'success';


					}else{

							return 'error';
					}


				}else {

					return 'error';
				}


			}else{

				return 'error';

			}

		}

		#REPORTE FINAL DE LOS MANTENIMIENTOS INGRESADOS REFERENTES A CADA VEHICULO CON SUS RESPECTIVO CLIENTE
		#-----------------------------------------------------------------------------------------------------
		public function reporteFinalMantenimientosModel(){


			$stmt = Conexion::conectar()->prepare("SELECT cliente.cedula_cliente, cliente.nombre_cliente, cliente.apellido_cliente, vehiculo.placas_vehiculo, vehiculo.marca_vehiculo, vehiculo.modelo_vehiculo, vehiculo.kilometraje_vehiculo, orden_pago.fecha_ingreso, mantenimiento.descripcion_mantenimiento, categoria.nombre_categoria FROM detalle_orden_pago INNER JOIN mantenimiento ON detalle_orden_pago.id_mantenimiento = mantenimiento.id_mantenimiento INNER JOIN categoria ON mantenimiento.id_categoria = categoria.id_categoria    INNER JOIN orden_pago ON detalle_orden_pago.id_orden = orden_pago.id_orden INNER JOIN vehiculo ON orden_pago.id_vehiculo = vehiculo.id_vehiculo INNER JOIN cliente ON vehiculo.id_cliente = cliente.id_cliente ORDER BY cliente.id_cliente");

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->close();

		}

	}
 ?>