<?php 
	
	session_start();

	if (!isset($_SESSION["logged_in"])) {
		
		header("Location:ingreso");

		exit();

	}
	include_once "header.php";

	if (!empty($_POST)) {
		
		try {
			$perfilUsuario = new GestorPerfilController();
			$perfilUsuario->perfilUsuarioController( $_POST );
			if($perfilUsuario)$success = PASSOWRD_CHANAGE_SUCCESS;

		} catch (Exception $e) {
			$error = $e->getMessage();
		} 
	}

 ?>



 <!--=====================================
PERFIL       
======================================-->
<br><br>
<section class="container">

	<div class="row">

		<div class="col-lg-12 col-md-4 col-sm-6 col-xs-12">
			<?php require_once 'views/mensaje.php';?>
			<h2 class="text-lg-left">Perfil</h2><br>

			<form method="POST" >

				<div class="form-group row">
			      	<label for="" class="col-sm-2 form-control-label">Nombre: </label>
			      	<div class="col-sm-10">
			        	<p> <?php echo $_SESSION["nombre_usuario"] ?> </p>
			     	 </div>
			    </div>


				<div class="form-group row">
					<label for="" class="col-sm-2 form-control-label">Email: </label>
			      	<div class="col-sm-10">
						<p> <?php echo $_SESSION["email_usuario"] ?> </p>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-sm-2 form-control-label">Contraseña actual: </label>
					<div class="col-sm-3">
						<input type="text" name="passwordActual" id="" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>

				<div class="form-group row">
					<span for="" class="col-sm-2 form-control-label"> Nueva Contraseña: </span>
					<div class="col-sm-3">
						<input type="text" name="passwordNuevo" id="" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<div class=" form-group row">
					<span for="" class="col-sm-2 form-control-label"> Confirmar Contraseña: </span>
					<div class="col-sm-3">
						<input type="text" name="confirmarPassword" id="" class="form-control">
						<span class="help-block"></span>
					</div>
				</div>
				<input type="hidden" id="" name="idUsuarioPerfil" value="<?php echo $_SESSION["id_usuario"]; ?>"><br>

				<div class="text-center form-group row">
			    	<div class="col-sm-12">
						<button type="submit" class="btn btn-outline-info" id="boton_enviar">Cambiar contraseña </button>
					</div>
				</div>
				
			</form>
			
		</div>
		
	</div>
	
</section>


<!--====  Fin de PERFIL  ====-->
