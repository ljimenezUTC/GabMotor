<?php 
	
	class GestorCitasController{

		#
		#--------------------------------------------------------
		public function listarCitasDelDiaController(){

			$respuesta = GestorCitasModel::listarCitasDelDiaModel();

			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td>' .$item["nombre_cliente"]. '  ' . $item["apellido_cliente"] . '</td>
						<td>' .$item["placas_vehiculo"].' '.$item["marca_vehiculo"].' ' .$item["modelo_vehiculo"]. '</td>
						';

						if ($item["estado_cita"] == 1) {

						echo '<td>Pendiente</td>';

						}
						echo '<td class="acciones">
							<a href="citas&idCita='.$item["id_cita"].'" class="btn btn-outline-info">Realizar</a>
						</td>
						

					</tr>
				';
			}

		}

		#
		#----------------------------------------------------------
		public function realizarCitaController(){

			if (isset($_GET["idCita"])) {

				$datosController =  $_GET["idCita"];

				$respuesta = GestorCitasModel::realizarCitaModel($datosController, 'cita');

				if ($respuesta == 'success') {

					echo'<script>

							swal({
								
								  title: "¡OK!",
								  text: "¡La cita  se ha realizado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "citas";
									  } 
							});

						</script>';

				}else{

					echo $respuesta;

				}
				
			}
		}


	}
