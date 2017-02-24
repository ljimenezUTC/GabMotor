<?php 
	
	class GestorVehiculosController {

		#REGISTRAR VEHICULOS
		#----------------------------------------------------------------
				




		#LISTAR VEHICULOS
		#----------------------------------------------------------------
		public function listarVehiculosController(){

			$respuesta = GestorVehiculosModel::listarVehiculosModel("vehiculo","cliente");


			foreach ($respuesta as $row => $item) {
				
				echo '
					<tr>
						<td class="text-center">' . $item["nombre_cliente"] . " " .  $item["apellido_cliente"] . '</td>

						<td class="text-center">' . $item["placas_vehiculo"] . '</td>

						<td class="text-center">' . $item["marca_vehiculo"] . '</td>

						<td class="text-center">' . $item["modelo_vehiculo"] . '</td>

						<td class="text-center">' . $item["anio_vehiculo"] . '</td>

						<td class="text-center">' . $item["kilometraje_vehiculo"] . '</td>

						<td class="acciones"><a href="#"><span class="fa fa-pencil"></span></a></td>

						<td class="acciones"><a href="#"><span class="fa fa-trash-o"></span></a></td>

						<!--<td class="text-center"><a href="#" class="btn btn-outline-success">Mantnimiento</a></td>-->

					</tr>
				';
			}

		}




		#EDITAR VEHICULOS
		#----------------------------------------------------------------
		




		#ACTUALIZAR VEHICULOS
		#----------------------------------------------------------------
		




		#BORRAR VEHICULOS
		#----------------------------------------------------------------

	}
