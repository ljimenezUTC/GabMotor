<?php 
	
	class GestorVehiculosController {



		#LISTAR LISTA DE CLIENTES PARA EL REGISTRO DE LOS VEHICULOS
		#-------------------------------------------------------------------
		
		public function listarClientesVehiculosController(){

			$respuesta = GestorVehiculosModel::listarClientesVehiculosModel("cliente");

			echo ' 
					<table class=" table table-striped">
	
							<thead>
								<tr>
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th>Accion</th>
								</tr>
							</thead>

							<tbody>

			';

			foreach ($respuesta as $row => $item) {


				
				echo '
								<tr>
									<td>' . $item["cedula_cliente"] . '</td>
									<td>'. $item["nombre_cliente"] .' '. $item["apellido_cliente"] .'</td>
									<td>'. $item["direccion_cliente"] .'</td>
									<td>'. $item["telefono_cliente"] .'</td>
									<td><a href="#" onclick="agregar( \'' . $item["id_cliente"] . '\' , \'' . $item["cedula_cliente"] . '\' , \'' . $item["nombre_cliente"] . '\' , \'' . $item["apellido_cliente"] . '\' , \'' . $item["direccion_cliente"] . '\' , \'' . $item["telefono_cliente"] . '\')" class="btn btn-outline-success">Agregar</a></td>
								</tr>
							
				';
				
			}

			echo '
					
					</tbody>
							
				</table>
			
			';
		}

		#REGISTRAR VEHICULOS
		#----------------------------------------------------------------
		public function ingresarVehiculosController(){

			if (isset($_POST["idClienteIngresoVehiculo"]) && isset($_POST["ingresoPlacasVehiculo"])) {

				$datosController = array("idCliente"=>$_POST["idClienteIngresoVehiculo"],
											"placas"=>$_POST["ingresoPlacasVehiculo"],
											"marca"=>$_POST["ingresoMarcaVehiculo"],
											"modelo"=>$_POST["ingresoModeloVehiculo"],
											"anio"=>$_POST["ingresoAnioVehiculo"],
											"kilometraje"=>$_POST["ingresoKilometrajeVehiculo"]);


				$respuesta = GestorVehiculosModel::ingresarVehiculosModel($datosController, "vehiculo");

				if ($respuesta == 'success') {
					
					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El vehiculo ha sido insertado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "vehiculos";
									  } 
							});


						</script>';

				}else{

					echo $respuesta;

				}



			}

		}




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
