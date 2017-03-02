<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>


<!-- Vehiculos -->

<!-- Seccion Mantenimientos -->
<section class="container">
	<div class="row">

		<!--Contenido Mantenimientos-->
		<div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

			<div class="row">
				<div class="col-md-6  wow bounceInDown">
					<span class="fa fa-th"> <a href="">Mantenimientos</a></span>
					<p class="text-muted small">Administra Lista de Mantenimientos</p>
	            </div>

	            <div class="col-md-6 pull-right  wow bounceInDown">
	                <!--Ingrese Mantenimientos-->
	                <a id="" href="ingresoMantenimiento" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"> </span> Nuevo Mantenimiento</a>
	            </div>
	        </div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat">
				<div class="panel-heading wow zoomIn">
					<h5 class="panel-title">Lista de Mantenimientos</h5>
				</div>
				<hr>

				<div class="col-lg-12 seccion-buscar">

					<form class="form-inline ">
			      		<input class="form-control mr-sm-2" type="text" placeholder="Ingrese">
			      		<button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Buscar</button>
		    		</form>
				</div>

				<!-- Listar Mantenimientos -->
				<div class="row">
					<div class="col-lg-12 ">
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
										<th colspan="3">Acción</th>
									</tr>
								</thead>

								<tbody>
									<?php 
										$vistaVehiculos = new GestorVehiculosController();
										$vistaVehiculos->listarVehiculosController();
										$vistaVehiculos->borrarVehiculosController();
									 ?>
								</tbody>
							</table>
						</div>
					</div>
				</div><!-- Fin de Listar Vehiculos -->
			</div><!-- Fin Panel -->
		</div><!-- Fin Contenido Vehiculo -->
	</div><!-- Row -->
</section><!-- Fin Seccion Vehiculos -->

<!-- Fin de Vehiculos -->