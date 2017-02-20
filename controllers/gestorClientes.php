<?php 

	
	class GestorClientesController{

		#INGRESAR CLIENTES
		#-------------------------------------------------------------------
		public function ingresarClientesController(){

			if (isset($_POST["ingresoCedulaCliente"])) {
				
				$datosController = array("cedula"=>$_POST["ingresoCedulaCliente"],
										"nombre"=>$_POST["ingresoNombreCliente"],
										"apellido"=>$_POST["ingresoApellidoCliente"],
										"direccion"=>$_POST["ingresoDireccionCliente"],
										"telefono"=>$_POST["ingresoTelefonoCliente"],
										"password"=>$_POST["ingresoPasswordCliente"]);


				$respuesta = GestorClientesModel::ingresarClientesModel($datosController, "cliente");

				if ($respuesta == 'success') {
					
					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El cliente ha sido insertado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "clientes";
									  } 
							});


						</script>';

				}else{

					echo $respuesta;

				}
			}

		}

		#LISTAR CLIENTES
		#-------------------------------------------------------------------
		
		public function listarClientesController(){

			$respuesta = GestorClientesModel::listarClientesModel("cliente");

			foreach ($respuesta as $row => $item) {
				echo '<tr>
						<td class="text-center">' .$item["cedula_cliente"]. '</td>

						<td class="text-center">'. $item["nombre_cliente"] . " " . $item["apellido_cliente"] . '</td>
 
						<td class="text-center">' . $item["direccion_cliente"] . '</td>

						<td class="text-center">'. $item["telefono_cliente"] . '</td>

						<td class="text-center"><a href="editarCliente&idCliente=' . $item["id_cliente"] . ' " class="btn btn-outline-info" >Editar</a></td>

						<td class="text-center"><a href="clientes&idBorrar='.$item["id_cliente"].'" onclick="return confirm(\'Estas seguro de qe deseas eliminar este cliente !\')" class="btn btn-outline-danger">Eliminar</a></td>

						<!--<td><a href="#">Agregar vehiculo</a></td>-->
					</tr>
					';
			}
		}


		#EDITAR CLIENTES
		#-------------------------------------------------------------------
		public function editarClientesController(){

			$datosController = $_GET["idCliente"];

			$respuesta = GestorClientesModel::editarClientesModel($datosController, "cliente");

			echo '
			

				<div class="form-group">

					<label class="control-label col-lg-3">Cédula<span class="text-danger">*</span></label>
					<div class="col-lg-9">

						 <input type="hidden" value="'.$respuesta["id_cliente"].'" name="idClienteEditar" >
						 <input type="text" value="'.$respuesta["cedula_cliente"].'" name="cedulaClienteEditar"  minlength="10" maxlength="10" class="form-control">

					</div>

				</div>


				<div class="form-group">

					<label class="control-label col-lg-3">Nombre<span class="text-danger">*</span></label>
					<div class="col-lg-9">

						 <input type="text" value="'.$respuesta["nombre_cliente"].'" name="nombreClienteEditar" class="form-control">

					</div>

				</div>


				<div class="form-group">

					<label class="control-label col-lg-3">Apellido<span class="text-danger">*</span></label>
					<div class="col-lg-9">

						 <input type="text" value="'.$respuesta["apellido_cliente"].'" name="apellidoClienteEditar" class="form-control">

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-lg-3">Dirección<span class="text-danger">*</span></label>
					<div class="col-lg-9">

						 <input type="text" value="'.$respuesta["direccion_cliente"].'" name="direccionClienteEditar" class="form-control">

					</div>

				</div>

				</div>

				<div class="form-group">

					<label class="control-label col-lg-3">Teléfono<span class="text-danger">*</span></label>
					<div class="col-lg-9">

						 <input type="text" value="'.$respuesta["telefono_cliente"].'" name="telefonoClienteEditar" class="form-control">

					</div>

				</div>

				<div class="form-group">

					<label class="control-label col-lg-3">Password<span class="text-danger">*</span></label>
					<div class="col-lg-9">

						 <input type="text" name="passwordClienteEditar" class="form-control">

					</div>

				</div>
				 
				 <div class="text-right">

				 	<a class="btn btn-outline-secondary" href="clientes">Cancaler</a>
				 	<button type="submit" class="btn btn-outline-success" >Actualizar</button>

				</div>		

			';
			
		}


		public function actualizarClientesController(){

				if (isset($_POST["idClienteEditar"])) {

					$datosController = array("id"=>$_POST["idClienteEditar"], "cedula"=>$_POST["cedulaClienteEditar"], "nombre"=>$_POST["nombreClienteEditar"], "apellido"=>$_POST["apellidoClienteEditar"], "direccion"=>$_POST["direccionClienteEditar"], "telefono"=>$_POST["telefonoClienteEditar"], "password"=>$_POST["passwordClienteEditar"]);

					$respuesta = GestorClientesModel::actualizarClientesModel($datosController, "cliente");

					if($respuesta == "success"){

						echo '
								<script>
									
									swal({
										title: "OK!",
										text: "El cliente ha sido actualizado correctamente",
										type:"success",
										confirmButtonText:"cerrar",
										closeOnConfirm:false
									},

									function(isConfirm){
										if (isConfirm) {
											window.location = "clientes"
										}
									}

									);
								</script>
						';

					}

					else{

						echo $respuesta;

					}

				}

		}

		#BORRAR USUARIO
		#------------------------------------
		public function borrarClientesController(){

			if(isset($_GET["idBorrar"])){

				$datosController = $_GET["idBorrar"];

				$respuesta = GestorClientesModel::borrarClientesModel($datosController, "cliente");

				if ($respuesta == 'success') {

					echo'<script>

							swal({
								  title: "¡OK!",
								  text: "¡El cliente se ha borrado correctamente!",
								  type: "success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = "index.php?action=clientes";
									  } 
							});


						</script>';

				}

			}

		}

		#VALIDAR QUE LA CEDULA QUE INGRESA DEL CLIENTE NO EXISTA EN LA BASE DE DATOS
		#---------------------------------------------------------------------------
		public function validarCedulaClienteController($datos){

			$datosController = $datos;

			$respuesta = GestorClientesModel::validarCedulaClienteModel($datosController, "cliente");

			if ($respuesta == 1) {
				
				 echo "true";

			}else{

				echo "false";

			}

		}




	}



