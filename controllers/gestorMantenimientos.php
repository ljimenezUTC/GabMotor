<?php 

	
	class GestorMantenimientosController
	{
		
		# LISTAR VEHICULOS PARA EL INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------
		public function listarVehiculosMantenimientosController(){

			$respuesta = GestorMantenimientosModel::listarVehiculosMantenimientosModel("vehiculo");

			echo '
				<table class="table table-striped">
				 	<thead>
				 		<tr>
				 			<th class="text-center">Placas</th>
				 			<th class="text-center">Marca</th>
				 			<th class="text-center">Modelo</th>
				 			<th class="text-center">Año</th>
				 			<th class="text-center">Kilometraje</th>
				 			<th class="text-center">Acción</th>
				 		</tr>
				 	</thead>
				 	<tbody>
			';

			foreach ($respuesta as $row => $item) {

				echo '
					<tr>
			 			<td class="text-center">'.$item["placas_vehiculo"].'</td>
			 			<td class="text-center">'.$item["marca_vehiculo"].'</td>
			 			<td class="text-center">'.$item["modelo_vehiculo"].'</td>
			 			<td class="text-center">'.$item["anio_vehiculo"].'</td>
			 			<td class="text-center">'.$item["kilometraje_vehiculo"].'</td>
			 			<td class="text-center"><a href="#" onclick="agregarVehiculo(\''.$item["id_vehiculo"].'\', \''.$item["placas_vehiculo"].'\', \''.$item["marca_vehiculo"].'\', \''.$item["modelo_vehiculo"].'\', \''.$item["kilometraje_vehiculo"].'\')" class="btn btn-outline-success"> Agregar </a></td>
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
					<option value="0"> Seleccione una categoria </option>
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

		
	}

?>
