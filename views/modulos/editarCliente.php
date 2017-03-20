<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>

<!-- FORMULARIO DE EDICION DE CLIENTES -->

<!-- Seccion Editar Clientes -->
<section class="container">
	
	<div class="row">
		
		<!--Contenido Editar Clientes-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

	        <div class="row">

				<div class="col-md-6 lista-cliente-detalle detalle-add-cliente wow bounceInDown">

					<span class="fa fa-th"> <a href="">Clientes - Editar Cliente</a></span>
					<p class="text-muted small">Administra los clientes!</p>

	            </div>

	            <!--<div class="col-md-6 pull-right seccion-add-clientes wow zoomIn">

	                Lista Clientes
	                <a id="btnAgregarCliente" href="clientes" class="btn btn-info pull-right">
	                <span class="fa fa-users"> </span> Lista de clientes</a>

	            </div>-->

	        </div>

	        <!-- Inicio Panel -->
			<div class="panel panel-flat contenido-add-cliente">

				<div class="panel-heading">

					<h5 class="panel-title">DATOS DEL CLIENTE</h5>

				</div><hr>

				<!-- Contenido Formulario Editar Cliente -->
				<div class="formulario-add-cliente">

					<form method="post">
	
						<?php

							$editarCliente = new GestorClientesController();
							$editarCliente->editarClientesController();
							$editarCliente->actualizarClientesController();

						?>

					</form>

				</div><!-- Contenido Formulario Editar Cliente -->

		  	</div><!-- Fin Panel -->

		</div><!-- Fin Contenido Editar Clientes -->

	</div><!-- Row -->

</section><!-- Fin Seccion Editar Clientes -->
