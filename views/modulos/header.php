<!-- HEADER -->

<!-- Menu -->
<nav class="navbar navbar-toggleable-md bg-faded fixed-top menu">
	<!-- Boton del menú para dispositivos móviles -->
	<button class="navbar-toggler navbar-toggler-right" 
	  type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" 
	  aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
	  <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
	</button>

	<!-- Logo Menu-->
	<a class="navbar-brand logo" href="inicio">
	<!--<img src="\GabMotor\views\images\logo.png" width="35px" alt="Su Imágen" class="img-responsive text-left">-->GAB MOTORS</a>

	<?php $uri = $_SERVER['REQUEST_URI']; ?>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo02">

		<ul class="nav navbar-nav mr-auto mt-2 mt-md-0">

			<li class="nav-item" 
				<?php if($uri == 'inicio') echo "class='active'"; ?>>
				<a class="nav-link" href="inicio"><span class="fa fa-desktop icono-menu"></span>Panel de inicio</a>
			</li>

			<li class="nav-item"
				<?php if($uri == 'clientes') echo "class='active'"; ?>>
				<a class="nav-link" href="clientes"><span class="fa fa-group icono-menu"></span>Clientes</a>
			</li>

			<li class="nav-item" 
				<?php if($uri == 'vehiculos') echo "class='active'"; ?>>
				<a class="nav-link" href="vehiculos"><span class="fa fa-car icono-menu"></span>Vehículos</a>
			</li>

			<li class="nav-item" 
				<?php if($uri == 'mantenimientos') echo "class='active'"; ?>>
				<a class="nav-link" href="mantenimientos"><span class="fa fa-wrench icono-menu"></span>Mantenimientos</a>
			</li>

		</ul>

		<ul class="nav navbar-nav mr-auto mt-2 mt-md-0 menu-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"><span class="fa fa-user icono-menu"></span>Su cuenta
				</a>
                <ul class="dropdown-menu">
                	<li>
                		<div class="navbar-content">
                            <div class="row">
                                <div class="col-md-5">
                                    <!-- <img src="http://placehold.it/120x120" alt="Su Imágen" class="img-responsive"> -->
                                    <span class="fa fa-smile-o user-img" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-7">
                                    <span>Email</span>
                                    <p class="text-muted small"><?php echo $_SESSION['emailIngreso']; ?></p> 
                                    <a href="#" class="btn btn-info btn-sm">Ver Perfil</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="navbar-footer">
                            <div class="navbar-footer-content">
                                <div class="row">
                                	<div class="col-md-12">
                                        <a href="index.php?action=salir">
                                        <span class="fa fa-power-off"></span> Salir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>                   
                </ul>
            </li>
	    </ul>
	</div>
</nav><!-- Fin Menu -->
