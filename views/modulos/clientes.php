<?php 
	session_start();

	if (!$_SESSION["logged_in"]) {

		header("location:index.php?action=ingreso");
		
		exit();
	}

	
	include "views/modulos/header.php";
 ?>

	<!--=====================================
			Clientes        
	======================================-->

	<div id="seccionClientes" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<!--=====================================
			Ingreso Clientes        
		======================================-->
	
			<a id="btnAgregarCliente" href="index.php?action=ingresoCliente" class="btn btn-info">Nuevo cliente</a>
			

		<!--====  Fin de Clientes  ====-->

		<!--=====================================
			Listar Clientes        
		======================================-->

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div>

					<h1>Lista de clientes</h1>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<table class="table table-striped">

					<thead>

						<tr class="success">

							<th>Cedula</th>
							<th>Nombre completo</th>
							<th>Direccion</th>
							<th>Telefono</th>
							<th colspan="2">Acciones</th>

						</tr>

					</thead>

					<tbody>
						
						<?php 

							$vistaClientes = new GestorClientesController();
							$vistaClientes->listarClientesController();
							$vistaClientes->borrarClientesController();
						 ?>

					</tbody>

				</table>

			</div>

		</div>
		<!--====  Fin de Listar Clientes  ====-->
		
	</div>
	<!--====  Fin de Clientes  ====-->
	
	
