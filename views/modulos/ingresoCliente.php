<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>


<!-- FORMULARIO DE INGRESO  DE CLIENTES -->

<!-- Seccion Ingresar Clientes -->
<section class="container">
	
	<div class="row">
	
		<!--Contenido Ingreso Clientes-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

	        <div class="row">

				<div class="col-md-6 lista-cliente-detalle detalle-add-cliente wow bounceInDown">

					<span class="fa fa-th"> <a href="">Clientes - Añadir Cliente</a></span>
					<p class="text-muted small">Administra los clientes!</p>

	            </div>

	        </div>

	        <!-- Inicio Panel -->
			<div class="panel panel-flat contenido-add-cliente">

				<div class="panel-heading">

					<h5 class="panel-title">DATOS DEL CLIENTE</h5>

				</div><hr>

				<!-- Contenido Formulario Add Cliente -->
				<div class="formulario-add-cliente">

					<form method="POST">
					  
						<div class="form-group row">

						    <label for="ingresoCedulaCliente" class="col-sm-2 form-control-label">Cédula <span class="text-danger">*</span> </label>

						    <div class="col-sm-10">
							
						    	<input type="text" name="ingresoCedulaCliente" id="ingresoCedulaCliente" class="form-control" minlength="10" maxlength="10" required="required" placeholder="Ingresa la cedula del cliente">
								<div id="mensajeValidarCedula" class="alert-validar"></div>
							</div>

					    </div>


					    <div class="form-group row">

						    <label for="ingresoNombreCliente" class="col-sm-2 form-control-label">Nombre <span class="text-danger">*</span></label>

						    <div class="col-sm-10">

						   		<input type="text" name="ingresoNombreCliente" class="form-control" required="required" placeholder="Ingresa el nombre del cliente">

						    </div>

					    </div>


					    <div class="form-group row">

					    	<label for="ingresoApellidoCliente" class="col-sm-2 form-control-label">Apellido <span class="text-danger">*</span></label>

					    	<div class="col-sm-10">

					        	<input type="text" name="ingresoApellidoCliente" class="form-control" required="required" placeholder="Ingresa el apellido del cliente">

					    	</div>

					    </div>


	  					<div class="form-group row">

					    	<label for="ingresoDireccionCliente" class="col-sm-2 form-control-label">Dirección <span class="text-danger">*</span></label>

					    	<div class="col-sm-10">

					        	<input type="text" name="ingresoDireccionCliente" class="form-control" required="required" placeholder="Ingresa la direccion del cliente">

					    	</div>

					    </div>


					    <div class="form-group row">

					    	<label for="ingresoTelefonoCliente" class="col-sm-2 form-control-label">Teléfono <span class="text-danger">*</span></label>

					    	<div class="col-sm-10">

					        	<input type="text" name="ingresoTelefonoCliente" class="form-control" required="required" maxlength="10" minlength="10" placeholder="Ingresa el telefono del cliente">

					    	</div>

					    </div>


					    <div class="form-group row">

					    	<label for="ingresoPasswordCliente" class="col-sm-2 form-control-label">Password <span class="text-danger">*</span></label>

					    	<div class="col-sm-10">

					        	<input type="text" name="ingresoPasswordCliente" class="form-control" required="required" placeholder="Ingresa el password del cliente">

					    	</div>

					    </div>

					      
					    <div class="text-right form-group row">

					    	<div class="col-sm-12">

								<a href="clientes" class="btn btn-success">Cancaler <span class="fa fa-undo"></span></a>
								<button type="submit" class="btn btn-info" id="guardarCliente">Agregar <span class="fa fa-check-circle"></span></button>

							</div>

						</div>
					   
					</form>

				</div><!-- Contenido Formulario Add Cliente -->

		  	</div><!-- Fin Panel -->

		</div><!-- Fin Contenido Ingreso Clientes -->

	</div><!-- Row -->

</section><!-- Fin Seccion Ingresar Clientes -->

<?php 

	$registroCliente = new GestorClientesController();
	$registroCliente->ingresarClientesController();

 ?>