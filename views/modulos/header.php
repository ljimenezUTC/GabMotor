<!--=====================================
 				HEADER            
======================================-->

<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!--Boton-->
	<a class="navbar-brand" href="index.php?action=inicio">LOGO</a>



	<?php $uri = end( explode("/",$_SERVER['REQUEST_URI'])); ?>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		<ul class="navbar-nav mr-auto mt-2 mt-md-0">
			<li class="nav-item active" <?php if($uri == 'index.php?action=inicio') echo "class='active'"; ?>>
				<a class="nav-link" href="index.php?action=inicio" >Inicio <span class="sr-only">(current)</span></a></li>
				<li class="nav-item" <?php if($uri == 'index.php?action=clientes') echo "class='active'"; ?>>
					<a class="nav-link" href="index.php?action=clientes" >Clientes</a></li>
				</ul>


				<ul class="nav navbar-nav navbar-right">

					<li class="nav-item">
						<a class="nav-link"> Bienvenido: <?php if($_SESSION['logged_in']) { ?>
							<?php echo $_SESSION['emailIngreso']; ?>
							<span class="caret"></span>
						</a>
					</li>

					<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Su Cuenta
						<b class="caret"></b>
					</a>

					<ul class="dropdown-menu pull-right">
						<li class="pull-right">
							<div class="navbar-content">
								<div class="row">
									<div class="col-md-5">
										<!--<img src="http://placehold.it/120x120" alt="Alternate Text" class="img-responsive" />
										<p class="text-center small">
											<a href="#">Change Photo</a></p>-->
									</div>

									<div class="col-md-7">
											<span>Email</span>
											<p class="text-muted small">mail@gmail.com</p>
											<div class="divider"></div>
											<a href="#" class="btn btn-primary btn-sm active">Perfil</a>
									</div>
								</div>
							</div>

								<div class="navbar-footer">
									<div class="navbar-footer-content">
										<div class="row">
											<!--<div class="col-md-6">
												<a href="#" class="btn btn-default btn-sm">Change Passowrd</a>
											</div>-->
											<div class="col-md-12">
												<a href="index.php?action=salir" class="close">Salir</a>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<?php } ?>
				</li>
			</ul>
		</div>
	</nav>
