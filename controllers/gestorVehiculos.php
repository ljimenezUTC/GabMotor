<?php 
	
	class GestorVehiculosController {

		#LISTAR LISTA DE CLIENTES PARA EL REGISTRO DE LOS VEHICULOS
		#----------------------------------------------------------------------------------------------------
		
		public function listarClientesVehiculosController(){

			$respuesta = GestorVehiculosModel::listarClientesVehiculosModel("cliente");

			foreach ($respuesta as $row => $item) {
				echo '
						<tr>
							<td class="acciones">' . $item["cedula_cliente"] . '</td>
							<td class="acciones">'. $item["nombre_cliente"] .' '. $item["apellido_cliente"] .'</td>
							<td class="acciones">'. $item["direccion_cliente"] .'</td>
							<td class="acciones">'. $item["telefono_cliente"] .'</td>
							<td class="acciones"><a href="#" onclick="agregar( \'' . $item["id_cliente"] . '\' , \'' . $item["cedula_cliente"] . '\' , \'' . $item["nombre_cliente"] . '\' , \'' . $item["apellido_cliente"] . '\' , \'' . $item["direccion_cliente"] . '\' , \'' . $item["telefono_cliente"] . '\')" class="btn btn-info btn-sm btn-modal"><span class="fa fa-user"> Agregar</span></a></td>
						</tr>		
				';
			}
		}


		# VAILIDAR PLACAS DEL VEHICULO REPETIDAS EN LA BASE DE DATOS
		#-----------------------------------------------------------------------------------------------
		public function validarPlacasVehiculoController($placasVehiculo){

			$datosController = $placasVehiculo;

			$respuesta = GestorVehiculosModel::validarPlacasVehiculoModel($datosController, 'vehiculo');

			if($respuesta == 1){

				return "true";

			}else{

				return "false";

			}

		}


		#REGISTRAR VEHICULOS
		#----------------------------------------------------------------------------------------------
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
		#--------------------------------------------------------------------------------------------
		public function listarVehiculosController(){

			$respuesta = GestorVehiculosModel::listarVehiculosModel("vehiculo","cliente");


			foreach ($respuesta as $row => $item) {
				
				echo '
					<tr>
						<td>' . $item["nombre_cliente"] . " " .  $item["apellido_cliente"] . '</td>
						<td>' . $item["placas_vehiculo"] . '</td>
						<td>' . $item["marca_vehiculo"] . '</td>
						<td>' . $item["modelo_vehiculo"] . '</td>
						<td>' . $item["anio_vehiculo"] . '</td>
						<td>' . $item["kilometraje_vehiculo"] . '</td>
						<td class="acciones"><a href="editarVehiculo&idVehiculo=' . $item["id_vehiculo"] . '"><span class="fa fa-pencil"></span></a></td>

						<td class="acciones"><a href="vehiculos&idVehiculo=' . $item["id_vehiculo"] . '" onclick="return confirm(\'Estas seguro de que deseas eliminar este vehiculo !\')"><span class="fa fa-trash-o"></span></a></td>
					</tr>
				';
			}

		}


		#EDITAR VEHICULOS
		#----------------------------------------------------------------------------------------------
		
		public function editarVehiculosController(){

			if (isset($_GET['idVehiculo'])) {

				$datosController = $_GET['idVehiculo'];

				$respuesta = GestorVehiculosModel::editarVehiculosModel($datosController, "vehiculo", "cliente");

				echo '
					<div class="row">

						<div class="col-md-3">
					  		<label class="control-label">Cédula del cliente</label>
							<input type="hidden" class="form-control" name="idClienteEditarVehiculo" id="idClienteEditarVehiculo" value = "' . $respuesta["id_cliente"] . '">
							<input type="text" class="form-control" id="cedulaClienteEditarVehiculo" readonly="readonly" value = "' . $respuesta["cedula_cliente"] . '">
						 </div>

					 <div class="col-md-3">
						<label  class="control-label">Nombre</label>
						<input type="text" class="form-control" id="nombreClienteEditarVehiculo" readonly="readonly" value = "' . $respuesta["nombre_cliente"].' '.$respuesta["apellido_cliente"] . '">
					</div>
				
					<div class="col-md-3">
						<label class="control-label">Dirección</label>
						<input type="text" class="form-control" id="direccionClienteEditarVehiculo" readonly="readonly" value = "' . $respuesta["direccion_cliente"] . '">
					</div>
				
					<div class="col-md-3">
						<label class="control-label">Teléfono</label>
						<input type="text" class="form-control" id="telefonoClienteEditarVehiculo" readonly="readonly" value = "' . $respuesta["telefono_cliente"] . '">
					</div>

				</div><br>
				
				<div class="row">

					<div class="col-lg-12 col-md-12 ">
						<div class="pull-right">
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">Cambiar Cliente</button>
						</div>	
					</div>
					
				</div><br><br>

				<div class="form-group row">
			      	<label for="editarPlacasVehiculo" class="col-sm-2 form-control-label">Placas<span class="text-danger">*</span> </label>
			      	<div class="col-sm-10">
			      		<input type="hidden" name="editarIdVehiculo" id="editarIdVehiculo" class="form-control" required="required" value = "' . $respuesta["id_vehiculo"] . '">
			        	<input type="text" name="editarPlacasVehiculo" id="editarPlacasVehiculo" class="form-control" required="required" value = "' . $respuesta["placas_vehiculo"] . '" readonly="readonly" laceholder="Ingresa las placas del vehiculo" pattern="^[A-Z\-0-9]{7,8}$" title="Ingrese un numero de placa">
			      	</div>
			    </div>

			    <div class="form-group row">
			      	<label for="editarMarcaVehiculo" class="col-sm-2 form-control-label">Marca<span class="text-danger">*</span> </label>
			      	<div class="col-sm-10">
			        	<input type="text" name="editarMarcaVehiculo" id="editarMarcaVehiculo" class="form-control" required="required" value = "' . $respuesta["marca_vehiculo"] . '" readonly="readonly" pattern="[a-zA-ZñÑÁÉÍÓÚ\s]+" title="Solo puede ingresar letras">
			      </div>
			    </div>

		      	<div class="form-group row">
			      	<label for="editarModeloVehiculo" class="col-sm-2 form-control-label">Modelo<span class="text-danger">*</span> </label>
			      	<div class="col-sm-10">
			        	<input type="text" name="editarModeloVehiculo" id="editarModeloVehiculo" class="form-control" required="required" value = "' . $respuesta["modelo_vehiculo"] . '" readonly="readonly" pattern="[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+" title="No puede ingresar caracteres especiales">
			      </div>
			    </div>


			    <div class="form-group row">
			      <label for="editarAnioVehiculo" class="col-sm-2 form-control-label">Año<span class="text-danger">*</span> </label>
			      <div class="col-sm-10">
			        <input type="number" name="editarAnioVehiculo" id="editarAnioVehiculo" class="form-control" required="required" value = "' . $respuesta["anio_vehiculo"] . '" readonly="readonly" pattern="[0-9{4,4}" title="No puede ingresar letras ni caracteres especiales">
			      </div>
			    </div>

			    <div class="form-group row">
			      	<label for="editarKilometrajeVehiculo" class="col-sm-2 form-control-label">Kilometraje<span class="text-danger">*</span> </label>
			      	<div class="col-sm-10">
			        	<input type="number" name="editarKilometrajeVehiculo" id="editarKilometrajeVehiculo" class="form-control" required="required" value = "' . $respuesta["kilometraje_vehiculo"] . '">
			      	</div>
			    </div>

			    <div class="text-right form-group row">
			    	<div class="col-sm-12">
						<a href="vehiculos" class="btn btn-success">Cancaler <span class="fa fa-undo"></span></a>
						<button type="submit" class="btn btn-info"> Editar <span class="fa fa-check-circle"></span></button>
					</div>
				</div>
				';
				
			}

		}


		#ACTUALIZAR VEHICULOS
		#----------------------------------------------------------------
		public function actualizarVehiculosController(){

			if (isset($_POST["idClienteEditarVehiculo"]) && isset($_POST["editarPlacasVehiculo"])) {
				
				$datosController = array("idCliente"=>$_POST["idClienteEditarVehiculo"],
										"idVehiculo"=>$_POST["editarIdVehiculo"],
										"placas"=>$_POST["editarPlacasVehiculo"],
										"marca"=>$_POST["editarMarcaVehiculo"],
										"modelo"=>$_POST["editarModeloVehiculo"],
										"anio"=>$_POST["editarAnioVehiculo"],
										"kilometraje"=>$_POST["editarKilometrajeVehiculo"]);

				$respuesta = GestorVehiculosModel::actualizarVehiculosModel($datosController, "vehiculo");


				if ($respuesta == 'success') {
					
					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El vehiculo ha sido actualizado correctamente!",
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


		#BORRAR VEHICULOS
		#----------------------------------------------------------------
		public function borrarVehiculosController(){

			if (isset($_GET["idVehiculo"])) {

				$datosController = $_GET["idVehiculo"];

				$respuesta = GestorVehiculosModel::borrarVehiculosModel($datosController, "vehiculo");

				if ($respuesta == 'success') {

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El vehiculo ha sido eliminado correctamente!",
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
					
					echo'<script>

							swal({
								  title: "¡IMPOSIBLE!",
								  text: "¡El vehiculo no se puede eliminar!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "vehiculos";
									  } 
							});


						</script>';

					echo $respuesta;
				}

			}

		}

	}
