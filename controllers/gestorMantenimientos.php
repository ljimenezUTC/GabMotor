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


		#LISTAR CATEGORIAS Y MANTENIMIENTOS PARA IMPRIMIRLOS EN LA VISTA DE INGRESO DE MANTENIMIENTOS
		#----------------------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosSubItemsController(){

			$respuestaCategorias = GestorMantenimientosModel::listarCategoriasModel("categoria");

			//echo '<div class="container">';
			echo '<section> <h4 class="categorias-title">Trabajos a realizarse</h4> 
					        <p class="text-right text-info">Seleccione los trabajos realizados 2)</p>';


				echo '<div class="row">';

					foreach ($respuestaCategorias as $row => $itemCategorias) {

						//echo '<div class="col-md-3">';
						echo '<div class="contenido-catagorias col-lg-4 col-md-12">';

							echo '<article>';

							$datosController = array("idCategoria"=>$itemCategorias["id_categoria"]);

							$respuestaMantenimientos = GestorMantenimientosModel::listarMantenimientosModel($datosController,"mantenimiento");

									
							//echo '<h6>' . $itemCategorias["nombre_categoria"] . '</h6>';
							echo '<ul class="list-group">  
									<li class="list-group-item active categoria">
										<span class="fa fa-check-circle fa-ck"></span>'. $itemCategorias["nombre_categoria"] . '
										<span class="fa fa-dollar"></span> 
									</li>';


							foreach ($respuestaMantenimientos as $row => $itemMantenimientos) {

							/*echo '<p>';

								echo  '<input type="checkbox" name="idMantenimiento[]" value="'. $itemMantenimientos["id_mantenimiento"] .'">' . $itemMantenimientos["descripcion_mantenimiento"] . '</input>' . '<input type="number" value="'.$itemMantenimientos["costo_mantenimiento"].'" readonly></input>';

								}

							echo '</p>';*/
							echo '<li class="list-group-item"> ';


								echo '
									<label class="custom-control custom-checkbox">
										<div class="cont-check">
											<input type="checkbox" class="custom-control-input" name="idMantenimiento[]" value="'. $itemMantenimientos["id_mantenimiento"] .'">
											<span class="custom-control-indicator"></span>
											<span class="custom-control-description">' . $itemMantenimientos["descripcion_mantenimiento"] . '</span>
										<div>
										' 
										.

										'<div class="cont-precio">
											<input class=" input-precio" type="text" value="'.$itemMantenimientos["costo_mantenimiento"].'" readonly="readonly"></input>
										</div>
									</label>

								';

							}

								echo '</li></ul><br>';

							echo '</article>';

						echo '</div>';

					}

				echo '</div>';

			echo '</section>';

		}

		#REGISTRAR MANTENIMIENTOS SELECCIONADOS EN LA TABLA TEMPORAL
		#-----------------------------------------------------------------------------------------------
		public function registrarMantenimientosController($datosAjax){

			if (isset($datosAjax["idMantenimiento"])) {

				$datosController = array("idMantenimiento"=>$datosAjax["idMantenimiento"]);

				$respuesta = GestorMantenimientosModel::registrarMantenimientosModel($datosController, 'categoria', 'mantenimiento', 'temporal_mantenimientos');


				if ($respuesta) {

					echo '
						<table class="table datatable-basic table-bordered table-striped table-hover">
							<thead class="success tabla-header">
								<tr>
									<th class="text-center">Categoria</th>
									<th class="text-center">Mantenimiento</th>
									<th class="text-center">Costo</th>
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
								<td class="text-center">' . $item["costo_tmp_mantenimiento"] . '</td>
								<td class="text-center">
								<button type="button" onclick="eliminarMantenimiento(\'' . $item["id_temporal"] . '\')"><span class="fa fa-trash-o"></span></button></td>
							</tr>

							';

					}

					echo '
						
							</tbody>
						</table>

					';

					echo '';
					
				}else{

					return 'error';
				}

			}

		}

		# GUARDAR DE MANTENIMIENTOS EN LA BASE DE DATOS
		#-----------------------------------------------------------------------------------------------
		public function guardarMantenimientosController(){

			if (isset($_POST["idVehiculoIngresoMantenimiento"])){
						
					$datosController = array("idVehiculo"=>$_POST["idVehiculoIngresoMantenimiento"]);

					$respuesta = GestorMantenimientosModel::guardarMantenimientosModel($datosController);

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
										    window.location = "ingresoMantenimiento";
										  } 

								});	

							</script>';
							
							echo'<script>
								
								$(document).ready(function() {

									iniciarPdf();

								});
								
							
							</script>';
							
					}else{

						echo $respuesta;
					}
				
			}
			   
		}
		
		#REPORTE FINAL DE LOS MANTENIMIENTOS INGRESADOS REFERENTES A CADA VEHICULO CON SUS RESPECTIVO CLIENTE
		#-----------------------------------------------------------------------------------------------
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