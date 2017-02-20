<?php 

	session_start();

	if (!$_SESSION["logged_in"]) {

		header("Location:ingreso");

		exit();

	}

	#include "header.php";

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
							$editarCliente->editarClientesController();
							$editarCliente->actualizarClientesController();

						?>

					</form>

				</fieldset><hr>

		</div><!-- /Panel-body -->

	</div><!-- /Panel -->

</div><!-- /Page container -->


<!--====  Fin del formulario de edicion de clientes ====-->