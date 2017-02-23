<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}
	
 ?>


<!-- FORMULARIO DE INGRESO  DE CLIENTES -->

<!-- Page container -->
<div class="page-container">
	
	<!-- Panel -->
	<div class="panel panel-flat">
		
		<!-- Panel-body -->
		<div class="panel-body">

			<fieldset class="content-group">
				
				<legend class="text-bold">Datos del cliente</legend>

				<form class="form-horizontal" method="POST">

					<div class="form-group">
						<label class="control-label col-lg-3">Cédula<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="ingresoCedulaCliente" id="ingresoCedulaCliente" class="form-control" minlength="10" maxlength="10" required="required" placeholder="Ingresa la cedula del cliente">
							<span class="help-block"></span>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-lg-3">Nombre<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="ingresoNombreCliente" class="form-control" required="required" placeholder="Ingresa el nombre del cliente">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-lg-3">Apellido<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="ingresoApellidoCliente" class="form-control" required="required" placeholder="Ingresa el apellido del cliente">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-lg-3">Dirección<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="ingresoDireccionCliente" class="form-control" required="required" placeholder="Ingresa la direccion del cliente">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-lg-3">Télefono<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="ingresoTelefonoCliente" class="form-control" required="required" maxlength="10" minlength="10" placeholder="Ingresa el telefono del cliente">
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-lg-3">Password<span class="text-danger">*</span></label>
						<div class="col-lg-9">
							<input type="text" name="ingresoPasswordCliente" class="form-control" required="required" placeholder="Ingresa el password del cliente">
						</div>
					</div>

					<div class="text-right">
						<a href="clientes" class="btn btn-outline-secondary">Cancaler</a>
						<button type="submit" class="btn btn-outline-success" id="boton_enviar">Agregar</button>
					</div>

				</form>

			</fieldset><hr>

		</div><!-- /Panel-body -->

	</div><!-- /Panel -->

</div><!-- /Page container -->
	

<?php 

	$registroCliente = new GestorClientesController();
	$registroCliente->ingresarClientesController();

 ?>