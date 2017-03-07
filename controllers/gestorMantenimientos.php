<?php 

	
	class GestorMantenimientosController
	{
		
		# LISTAR VEHICULOS PARA EL INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------
		public function listarVehiculosMantenimientosController(){

			$respuesta = GestorMantenimientosModel::listarVehiculosMantenimientosModel("vehiculo", "cliente");

			echo '
				<table class="table datatable-basic table-bordered table-striped table-hover">
				 	<thead>
				 		<tr class="success tabla-header">
				 			<th>Cliente</th>
				 			<th>Placas</th>
				 			<th>Marca</th>
				 			<th>Modelo</th>
				 			<th>Año</th>
				 			<th>Kilometraje</th>
				 			<th>Acción</th>
				 		</tr>
				 	</thead>
				 	<tbody>
			';

			foreach ($respuesta as $row => $item) {

				echo '
					<tr>
						<td class="text-center">'.$item["nombre_cliente"]. ' '.$item["apellido_cliente"].'</td>
			 			<td class="text-center">'.$item["placas_vehiculo"].'</td>
			 			<td class="text-center">'.$item["marca_vehiculo"].'</td>
			 			<td class="text-center">'.$item["modelo_vehiculo"].'</td>
			 			<td class="text-center">'.$item["anio_vehiculo"].'</td>
			 			<td class="text-center">'.$item["kilometraje_vehiculo"].'</td>
			 			<td class="text-center class="acciones""><a href="#" onclick="agregarVehiculo(\''.$item["id_vehiculo"].'\', \''.$item["placas_vehiculo"].'\', \''.$item["marca_vehiculo"].'\', \''.$item["modelo_vehiculo"].'\', \''.$item["kilometraje_vehiculo"].'\', \''.$item["nombre_cliente"].'\', \''.$item["apellido_cliente"].'\')" class="btn btn-info"><span class="fa fa-car"></span> Agregar </a></td>
			 		</tr>
		 		';
			}

			echo '
				 	</tbody>
 				</table>
			';
		}

		#LISTAR LAS CATEGORIAS PARA IMPRIMIRLAS EN EL COMBOBOX DEL INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosController(){

			$respuesta = GestorMantenimientosModel::listarCategoriasMantenimientosModel("categoria");

			echo '
					<option value="0"> Seleccione una categoria</option>
				';

			foreach ($respuesta as $row => $item) {
				echo '
					<option value='.$item["id_categoria"].'>'.$item["nombre_categoria"].'</option>
				';
			}



		}

		#LISTAR LOS MANTENIMIENTOS PARA IMPRIMIRLOS EN EL COMBOBOX DE LA VISTA DE INGRESO DE MANTENIMIENTOS
		#--------------------------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosSubItemsController($datos){

			$datosController = $datos;

			$respuesta = GestorMantenimientosModel::listarCategoriasMantenimientosSubItemsModel("categoria", "mantenimiento", $datosController);

			echo '
					<option value="0"> Seleccione una opcion </option>
				';

			foreach ($respuesta as $row => $item) {
				echo '
					<option value='.$item["id_mantenimiento"].'>'.$item["descripcion_mantenimiento"].'</option>
				';
			}

		}

		#AGREGAR LOS MANTENIMIENTOS EN LA TABLA TEMPORAL Y SU PRESENTACION EN LA VISTA AGREGAR MANTENIMIENTOS
		#---------------------------------------------------------------------------------------------------
		public function agregarMantenimientosController($idMantenimiento){

			$datosController = $idMantenimiento;

			$respuesta = GestorMantenimientosModel::agregarMantenimientosModel($datosController," 	temporal_mantenimientos", "mantenimiento", "categoria");

			echo '
				<table class="table datatable-basic table-bordered table-striped table-hover">
					<thead class="success tabla-header">
						<tr>
							<th class="text-center">Categoria</th>
							<th class="text-center">Mantenimiento</th>
							<th class="text-center">Accion</th>
						</tr>
					</thead>
					<tbody>
			';

			foreach ($respuesta as $row => $item) {
				
				echo '
					<tr>
						<td class="text-center">' . $item["nombre_categoria"] . '</td>
						<td class="text-center">' . $item["descripcion_mantenimiento"] . '</td>
						<td class="text-center">
						<button type="button" onclick="eliminarMantenimiento(\'' . $item["id_temporal"] . '\')"><span class="fa fa-trash-o"></span></button></td>
					</tr>

					';

			}

			echo '
				
					</tbody>
				</table>

			';

		}

		#ELIMINAR MANTENIMIENTOS DE LA TABLA TEMPORAL Y PRESENTACION EN LA VISTA DE AGREGAR MANTENIMIENTOS
		#------------------------------------------------------------------------------------------------
		public function eliminarMantenimientosTemporalController($datos){

			$datosController = $datos;

			$respuesta = GestorMantenimientosModel::eliminarMantenimientosTemporalModel($datosController, "temporal_mantenimientos", "mantenimiento", "categoria");

			echo '
				<table class="table datatable-basic table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th class="text-center">Categoria</th>
							<th class="text-center">Mantenimiento</th>
							<th class="text-center">Accion</th>
						</tr>
					</thead>
					<tbody>
			';

			foreach ($respuesta as $row => $item) {
				
				echo '
					<tr>
						<td class="text-center">' . $item["nombre_categoria"] . '</td>
						<td class="text-center">' . $item["descripcion_mantenimiento"] . '</td>
						<td class="text-center"><button type="button" onclick="eliminarMantenimiento(\'' . $item["id_temporal"] . '\')"><span class="fa fa-trash"></span></button></td>
					</tr>

					';

			}

			echo '
				
					</tbody>
				</table>

			';

		}

		#GUARDAR LOS MANTENIMIENTOS REALIZADOS EN LA TABLA DE DETALLE Y ELIMINARLOS EN LA TABLA TEMPORAL
		#------------------------------------------------------------------------------------------------
		public function registrarMantenimientosController(){

			if (isset($_POST["idVehiculoIngresoMantenimiento"])) {

				$datosController = $_POST["idVehiculoIngresoMantenimiento"];

				$respuesta = GestorMantenimientosModel::registrarMantenimientosModel($datosController);

				if ($respuesta == 'success') {
					
					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡Los mantenimientos han sido insertados correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "mantenimientos";
									  } 
							});


						</script>';

				}else{

					echo $respuesta;
				}

			}
		}
		#REPORTE FINAL DE LOS MANTENIMIENTOS INGRESADOS REFERENTES A CADA VEHICULO CON SUS RESPECTIVO CLIENTE
		#----------------------------------------------------------------------------------------------------
		public function reporteFinalMantenimientosController(){

			$respuesta = GestorMantenimientosModel::reporteFinalMantenimientosModel();

			foreach ($respuesta as $row => $item) {
				
				echo '
					<tr>
						<td>' . $item["cedula_cliente"] . '</td>
						<td>' . $item["nombre_cliente"] . " " .  $item["apellido_cliente"] . '</td>
						<td>' . $item["placas_vehiculo"] . '</td>
						<td>' . $item["marca_vehiculo"] . ' '. $item["modelo_vehiculo"] . '</td>
						<td>' . $item["kilometraje_vehiculo"] . '</td>
						<td>' . $item["nombre_categoria"] . '</td>
						<td>' . $item["descripcion_mantenimiento"] . '</td>
						<td>' . $item["fecha_ingreso"] . '</td>
					</tr>
				';
			}

		}

	}


