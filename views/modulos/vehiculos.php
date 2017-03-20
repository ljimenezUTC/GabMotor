<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>

<!-- Vehiculos -->

<!-- Seccion Vehiculos -->
<section class="container">

	<div class="row">

		<!--Contenido Vehiculos-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

			<div class="row">

				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">

					<span class="fa fa-car"> <a href="">Vehículos</a></span>
					<p class="text-muted small">Administra Lista de Vehículos</p>

	            </div>

	            <div class="col-md-6 pull-right seccion-add-clientes wow bounceInDown">

	                <!--Ingrese Vehiculos-->
	                <a href="ingresoVehiculo" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"> </span> Nuevo Vehiculo</a>

	            </div>

	        </div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat">

				<div class="panel-heading wow zoomIn">

					<h5 class="panel-title">Lista de vehículos</h5>

				</div><hr>

				<!-- Listar Vehiculos -->
				<div class="row">

					<div class="col-lg-12 contenido-tabla-clientes">

						<div class="table-responsive">

							<table class="table table-bordered table-striped table-hover" id="datosTabla">

								<thead>

									<tr class="success tabla-header">

										<th>Nombre cliente</th>
										<th>Placas vehículo</th>
										<th>Marca vehículo</th>
										<th>Modelo vehículo</th>
										<th>Año vehículo</th>
										<th>Kilometraje vehículo</th>
										<th>Editar</th>
										<th>Eliminar</th>

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
