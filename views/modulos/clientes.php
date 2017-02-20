<?php 
	session_start();

	if (!$_SESSION["logged_in"]) {

		header("location:ingreso");
		
		exit();
	}

	
	include "header.php";
 ?>

	<!--=====================================
			Clientes        
	======================================-->

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		<!--=====================================
			Ingreso Clientes        
		======================================-->
	
			<a id="btnAgregarCliente" href="ingresoCliente" class="btn btn-outline-info">Nuevo cliente</a>
			

		<!--====  Fin de Clientes  ====-->

		<!--=====================================
			Listar Clientes        
		======================================-->

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<div>

					<h4>Lista de clientes</h4>

				</div>

			</div>

		</div>

		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<table class="table table-striped">

					<thead>

						<tr class="success">

							<th class="text-center">Cédula</th>
							<th class="text-center">Nombre completo</th>
							<th class="text-center">Dirección</th>
							<th class="text-center">Teléfono</th>
							<th colspan="2" class="text-center">Acción</th>

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
	
	
