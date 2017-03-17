<?php 


	class GestorMantenimientosController
	{
		
		# LISTAR VEHICULOS PARA EL INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------
		public function listarVehiculosMantenimientosController(){

			$respuesta = GestorMantenimientosModel::listarVehiculosMantenimientosModel("vehiculo", "cliente");


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

		}

		#LISTAR LOS MANTENIMIENTOS PARA IMPRIMIRLOS EN EL COMBOBOX DE LA VISTA DE INGRESO DE MANTENIMIENTOS
		#--------------------------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosSubItemsController(){

			$respuestaCategorias = GestorMantenimientosModel::listarCategoriasMantenimientosSubItemsModel("categoria");

			echo '<div class="container">';

				echo '<div class="row">';

					

					foreach ($respuestaCategorias as $row => $itemCategorias) {

						echo '<div class="col-md-3">';

							echo '<article>';

							$datosController = array("idCategoria"=>$itemCategorias["id_categoria"]);

							$respuestaMantenimientos = GestorMantenimientosModel::listarCategorias2Model($datosController,"mantenimiento");

									
							echo '<h6>' . $itemCategorias["nombre_categoria"] . '</h6>';

							foreach ($respuestaMantenimientos as $row => $itemMantenimientos) {

							echo '<p>';
								echo  '<input type="checkbox" name="idMantenimiento[]" value="'. $itemMantenimientos["id_mantenimiento"] .'">' . $itemMantenimientos["descripcion_mantenimiento"] . '</input>' . '<input type="number" value="'.$itemMantenimientos["costo_mantenimiento"].'" readonly></input>';

								}

							echo '</p>';

							echo '</article>';

						echo '</div>';

					}

					
				echo '</div>';

			echo '</div>';


		}

		#
		#-----------------------------------------------------------------------------------------------------------
		public function registrarMantenimientosController(){

			if ($_SERVER["REQUEST_METHOD"] == "POST") {



				if (isset($_POST["idVehiculoIngresoMantenimiento"]) && $_POST["idVehiculoIngresoMantenimiento"] != NULL) {

			
					if (isset($_POST["idMantenimiento"])) {
							
						$datosController = array("idMantenimiento"=>$_POST["idMantenimiento"],
												"idVehiculo"=>$_POST["idVehiculoIngresoMantenimiento"]);

						print_r($datosController);

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

					    
					}else{

						echo "seleccione un item";
					}
					
				}else{
					
					echo "Seleccione un vehiculo";
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