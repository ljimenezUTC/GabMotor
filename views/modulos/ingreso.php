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

<!-- FORMULARIO DE INGRESO -->

<!-- Menu -->
<nav class="navbar navbar-toggleable-md bg-faded fixed-top menu-login">

	<!-- Boton del menú para dispositivos móviles -->
	<button class="navbar-toggler navbar-toggler-right" 
	  type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
	  aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
	</button>

	<!-- Logo Menu-->
	<a class="navbar-brand logo" href="inicio">GAB MOTORS</a>


	<div class="collapse navbar-collapse demo-redes" id="navbarTogglerDemo02">

		<ul class="nav navbar-nav mr-auto mt-2 mt-md-0"></ul>

		<ul class="nav navbar-nav mr-auto mt-2 mt-md-0 menu-right">
			<li class="nav-item">
				<a href="#" class="nav-link"><span class="fa fa-facebook icono-redes-sociales"></span></a>
            </li>

            <li class="nav-item">
				<a href="#" class="nav-link"><span class="fa fa-twitter redes-sociales"></span></a>
            </li>

            <li class="nav-item">
				<a href="#" class="nav-link"><span class="fa fa-youtube redes-sociales"></span></a>
            </li>

             <li class="nav-item">
				<a href="#" class="nav-link"><span class="fa fa-whatsapp redes-sociales"></span></a>
            </li>
	    </ul>
	</div>
</nav><!-- Fin Menu -->


<section class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="login-form">
				
				<?php require_once 'views/mensaje.php';?>
				<div class="col-lg-12 formulario-header wow bounceInDown">
					<img src="\GabMotor\views\images\logo.png" width="120px" alt="Su Imágen" class="img-responsive">
				</div>

				<div class="col-lg-12 detalle-login wow slideInRight">
					<h4>Gab Motors</h4>
					<p class="text-primary">Acceso Administrador</p>
				</div>
				
				<form id="login-form" method="post" class="contenido-form-login">

				    <div class="form-group row">
				      	<div class="col-sm-12 input-group">
				      		<span class="input-group-addon fa fa-user"></span>
				        	<input name="emailIngreso" id="email" type="email" class="form-control" placeholder="Correo electronico" autofocus required="email">
				        </div>
				    </div>

				    <div class="form-group row">
				        <div class="col-sm-12 input-group">
				        	<span class="input-group-addon fa fa-lock"></span>
				        	<input name="passwordIngreso" id="password" type="password" class="form-control" placeholder="Contraseña" required="password"> 
				        </div>
				    </div>

				     <div class="form-group row">
					    <div class="col-sm-12">
					       	<button class="btn btn-primary btn-block btn-login" type="submit" id="submit_btn" data-loading-text="Iniciando..">Iniciar sesión <span class="fa fa-chevron-circle-right"></span></button>
					    </div>
				    </div>
				</form>

				<div class="row footer-form">
					<div class="col-lg-6 col-xs-7 col-sm-7 col-md-7 rec-password">
						<a href="forget_password.php">¿Olvidó su contraseña? <span class="fa fa-lock"></span></a>
					</div>
						
					<div class="col-lg-6 col-xs-5 col-sm-5 col-md-5 reguistrar">
						<a href="register.php">Registrarse <span class="fa fa-check"></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Fin de FORMULARIO DE INGRESO -->
