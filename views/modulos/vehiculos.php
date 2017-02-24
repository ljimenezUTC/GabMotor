<?php 
	
	session_start();

	if (!isset($_SESSION["logged_in"])) {
		
		header("Location: ingreso");

		exit();
	}

	include "header.php";
 ?>

<!-- Vehiculos -->

<!-- Seccion Vehiculos -->
<section class="container">
	<div class="row">

		<!--Contenido Vehiculos-->
		<div id="seccionClientes" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

			<div class="row">
				<div class="col-md-6 lista-cliente-detalle">
					<span class="fa fa-th"> <a href="">Vehículos</a></span>
					<p class="text-muted small">Administra Lista de Vehículos</p>
	            </div>

	            <div class="col-md-6 pull-right seccion-add-clientes">
	                <!--Ingrese Vehiculos-->
	                <a id="" href="ingresoVehiculo" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"> </span> Nuevo Vehiculo</a>
	            </div>
	        </div>
			

			<!-- Inicio Panel -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title">Lista de vehículos</h5>
				</div>
				<hr>

				<div class="col-lg-12 seccion-buscar">
					<form class="form-inline ">
			      		<input class="form-control mr-sm-2" type="text" placeholder="Ingrese ">
			      		<button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Buscar</button>
		    		</form>
				</div>

				<!-- Listar Vehiculos -->
				<div class="row">
					<div class="col-lg-12 contenido-tabla-clientes">
						<div class="table-responsive">
							<table class="table datatable-basic table-bordered table-striped table-hover">
								<thead>
									<tr class="success tabla-header">
										<th>Cliente</th>
										<th>Placas</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Año</th>
										<th>Kilometraje</th>
										<th colspan="2">Acción</th>
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
				</div><!-- Fin de Listar Clientes -->
			</div><!-- Fin Panel -->
		</div><!-- Fin Contenido Vehiculos -->
	</div><!-- Row -->
</section><!-- Fin Seccion Vehiculos -->

<!-- Fin de Vehiculos -->
