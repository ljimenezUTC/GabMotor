<?php 

	session_start();

	if (!$_SESSION["logged_in"]) {

		header("Location:index.php?action=ingreso");

		exit();

	}

	//include "views/modulos/header.php";

 ?>

<!--=====================================
	FORMULARIO DE EDICION DE CLIENTES        
======================================-->

<!-- Page container -->
<div class="page-container">
	
	<!-- Panel -->
	<div class="panel panel-flat">
		
		<!-- Panel-body -->
		<div class="panel-body">

			<fieldset class="content-group">
				
				<legend class="text-bold">Datos del cliente</legend>

					<form method="post">
	
						<?php

							$editarCliente = new GestorClientesController();
							$editarCliente->editarClienteController();
							$editarCliente->actualizarClienteController();

						?>

					</form>

				</fieldset><hr>

		</div><!-- /Panel-body -->

	</div><!-- /Panel -->

</div><!-- /Page container -->


<!--====  Fin del formulario de edicion de clientes ====-->