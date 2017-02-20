<?php 
	
	session_start();

	if (!isset($_SESSION["logged_in"])) {
		
		header("Location: ingreso");

		exit();
	}

	include "header.php";
 ?>

<!--=====================================
			Vehiculos        
======================================-->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	<!--=====================================
		Listar Clientes        
	======================================-->

	<div class="row">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<h4>Lista de Vehiculos</h4>
			
		</div>
		
	</div>

	<div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<table class="table table-striped">

				<thead>

					<tr class="success">
						<th class="text-center">Cliente</th>
						<th class="text-center">Placas</th>
						<th class="text-center">Marca</th>
						<th class="text-center">Modelo</th>
						<th class="text-center">Año</th>
						<th class="text-center">Kilometraje</th>
						<th colspan="2" class="text-center">Acción</th>
					</tr>

				</thead>

				<tbody>
					
					<?php 

						$vistaVehiculos = new GestorVehiculosController();
						$vistaVehiculos->listarVehiculosController();


					 ?>
					
				</tbody>
				
			</table>

		</div>

	</div>

	<!--====  Fin de Listar Clientes  ====-->
	
</div>


<!--====  Fin de Vehiculos  ====-->
