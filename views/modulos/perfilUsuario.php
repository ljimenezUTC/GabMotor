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


 <!-- PERFIL -->
<section class="container">

	<div class="jumbotron perfil wow bounceInDown">
		<h4>Perfil</h4>
		<br>
		<form method="POST" >

		  	<div class="form-group row cont-perfil">
				<label for="" class="col-sm-3 col-xs-12 form-control-label"><span class="fa fa-user"></span> Nombre</label>
				<div class="col-sm-9 col-xs-12">
					<laabel> <?php echo $_SESSION["nombre_usuario"] ?> </label>
				</div>
			</div>
			
			<div class="form-group perfil row cont-perfil">
				<label for="" class="col-sm-3 col-xs-12 form-control-label"><span class="fa fa-envelope"></span> Email</label>
				<div class="col-sm-9 col-xs-12">
					<label> <?php echo $_SESSION["email_usuario"] ?> </label>
				</div>
			</div>

			<hr class="my-2">


		  	<h4>Cambiar Contraseña</h4>
			<?php require_once 'views/mensaje.php';?>
			<br>
		  	<div class="form-group row">
				<label class="col-sm-3 form-control-label">Contraseña actual</label>
				<div class="col-sm-9">
					<input type="text" id="passwordActual" class="form-control">
					<div id="mensajeValidarPass"></div>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-sm-3 form-control-label"> Nueva Contraseña</label>
				<div class="col-sm-9">
					<input type="text" name="passwordNuevo" id="" class="form-control">
				</div>
			</div>
					
			<div class=" form-group row">
				<label for="" class="col-sm-3 form-control-label"> Confirmar Contraseña</label>
				<div class="col-sm-9">
					<input type="text" name="confirmarPassword" id="" class="form-control">
				</div>
			</div>
			
			<input type="hidden" id="idUsuarioPerfil" name="idUsuarioPerfil" value="<?php echo $_SESSION["id_usuario"]; ?>"><br>

			<div class="text-right form-group row">
				<div class="col-sm-12">
					<button type="submit" class="btn btn-info" id="idValidarPass">Cambiar contraseña <span class="fa fa-check"></span></button>
				</div>
			</div>
		</form>		
	</div>
				
</section> <!-- Fin de PERFIL -->
