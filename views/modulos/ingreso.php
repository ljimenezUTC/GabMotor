<?php
	ob_start();
	
	session_start();

	if (!empty($_POST)) {

		try {

			$ingreso = new IngresoControllers();

			$ingreso->ingresoController($_POST);

			if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {

 				header('Location:inicio');

 			}

		} catch (Exception $e) {

			$error = $e->getMessage();

		}
	}

	if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){

		header('Location:inicio');

	}

 ?>
<!--=====================================
		FORMULARIO DE INGRESO   
======================================-->
<section class="container">
	<div class="row">

		<div class="col-lg-12">

			<div class="login-form">

				<?php require_once 'views/mensaje.php';?>
				
				<form id="login-form" method="post" class="form-signin" >

					<input name="emailIngreso" id="email" type="email" class="form-control" placeholder="Correo electronico" autofocus> <br>

					<input name="passwordIngreso" id="password" type="password" class="form-control" placeholder="Contraseña"> 

					<button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Iniciando..">Iniciar sesión</button>

				</form>

				<div class="form-footer">

					<div class="row">

						<div class="col-xs-7 col-sm-7 col-md-7">

							<i class="glyphicon glyphicon-lock"></i>

							<a href="forget_password.php"> Olvidó su contraseña? </a>

						</div>
						
						<div class="col-xs-5 col-sm-5 col-md-5">

							<i class="glyphicon glyphicon-check"></i>

							<a href="register.php"> Registrarse </a>

						</div>

					</div>
					
				</div>

			</div>
		</div>
	</div>
</section>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->
