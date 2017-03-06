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
						<td>' .$item["cedula_cliente"].'</td>
						<td>' .$item["nombre_cliente"]. " " . $item["apellido_cliente"] . '</td>
						<td>' .$item["direccion_cliente"].'</td>
						<td>' .$item["telefono_cliente"].'</td>

						<td class="acciones">
							<a href="editarCliente&idCliente='.$item["id_cliente"].'"><span class="fa fa-eye"></span></a>
						</td>
						
						<td class="acciones">
							<a href="editarCliente&idCliente='.$item["id_cliente"].'"><span class="fa fa-pencil"></span></a>
						</td>

						<td class="text-center">
							<a href="clientes&idBorrar='.$item["id_cliente"].'"onclick="return confirm(\'Estas seguro de que deseas eliminar este cliente !\')" >
							<span class="fa fa-trash-o"></span></a>
						</td>
						
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
			
				<div class="form-group row">
				    <label for="cedulaClienteEditar" class="col-sm-2 form-control-label">Cédula <span class="text-danger">*</span> </label>
				    <div class="col-sm-10">
					  	<input type="hidden" value="'.$respuesta["id_cliente"].'" name="idClienteEditar" >
						<input type="text" value="'.$respuesta["cedula_cliente"].'" name="cedulaClienteEditar" id="cedulaClienteEditar" minlength="10" maxlength="10" class="form-control">
				    </div>
				</div>



				<div class="form-group row">
				      <label for="nombreClienteEditar" class="col-sm-2 form-control-label">Nombre <span class="text-danger">*</span></label>
				      <div class="col-sm-10">
				   		 <input type="text" value="'.$respuesta["nombre_cliente"].'" name="nombreClienteEditar" id="nombreClienteEditar" class="form-control">
				      </div>
				</div>

				
				<div class="form-group row">
				      <label for="apellidoClienteEditar" class="col-sm-2 form-control-label">Apellido <span class="text-danger">*</span></label>
				      <div class="col-sm-10">
				        <input type="text" value="'.$respuesta["apellido_cliente"].'" name="apellidoClienteEditar" id="apellidoClienteEditar" class="form-control">
				      </div>
				</div>


				<div class="form-group row">
				      <label for="direccionClienteEditar" class="col-sm-2 form-control-label">Dirección <span class="text-danger">*</span></label>
				      <div class="col-sm-10">
				        <input type="text" value="'.$respuesta["direccion_cliente"].'" name="direccionClienteEditar" id="direccionClienteEditar" class="form-control">
				      </div>
				</div>


				 <div class="form-group row">
				      <label for="telefonoClienteEditar" class="col-sm-2 form-control-label">Teléfono <span class="text-danger">*</span></label>
				      <div class="col-sm-10">
				        <input type="text" value="'.$respuesta["telefono_cliente"].'" name="telefonoClienteEditar" id="telefonoClienteEditar" minlength="10" maxlength="10" class="form-control">
				      </div>
				 </div>


				<div class="form-group row">
				    <label for="passwordClienteEditar" class="col-sm-2 form-control-label">Password <span class="text-danger">*</span></label>
				    <div class="col-sm-10">
				    	<input type="text" name="passwordClienteEditar" id="passwordClienteEditar" class="form-control" required>
				    </div>
				</div>


				<div class="text-right form-group row">
				    <div class="col-sm-12">
						<a href="clientes" class="btn btn-success">Cancaler <span class="fa fa-undo"></span></a>
						<button type="submit" class="btn btn-info">Actualizar <span class="fa fa-check-circle"></span></button>
					</div>
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
				
				return "true";

			}else{

				return "false";

			}

		}




	}



