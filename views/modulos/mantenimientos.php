<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>


<!-- Seccion Mantenimientos -->
<section class="container">

	<div class="row">

		<!--Contenido Mantenimientos-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

			<div class="row">

				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">

					<span class="fa fa-wrench"> <a href="">Mantenimientos</a></span>
					<p class="text-muted small">Administra Lista de Mantenimientos</p>

	            </div>

	            <div class="col-md-6 pull-right seccion-add-clientes wow bounceInDown">

	                <!--Ingrese Mantenimientos-->
	                <a href="ingresoMantenimiento" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"> </span> Nuevo Mantenimiento</a>

	            </div>

	        </div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat">

				<div class="panel-heading wow zoomIn">
					<h5 class="panel-title">Reporte de Mantenimientos</h5>
				</div><hr>

				<!-- Listar Mantenimientos -->
				<div class="row">

					<div class="col-lg-12 contenido-tabla-clientes">

						<div class="table-responsive">

							<table class="table table-bordered table-striped table-hover" id="datosTabla">

								<thead>

									<tr class="tabla-header">

										<th>Cédula cliente</th>
										<th>Nombre cliente</th>
										<th>Placas del vehículo</th>
										<th>Marca/Modelo vehículo</th>
										<th>Kilometraje vehículo</th>
										<th>Categoria mantenimiento</th>
										<th>Mantenimiento realizado</th>
										<th>Fecha de realización</th>

									</tr>

								</thead>

								<tbody>

									<?php 

										$vistaReporteFinalMantenimientos = new GestorMantenimientosController();
										$vistaReporteFinalMantenimientos->reporteFinalMantenimientosController();

									 ?>

								</tbody>

							</table>

						</div>

					</div>

				</div><!-- Fin de Listar Mantenimientos -->

			</div><!-- Fin Panel -->

		</div><!-- Fin Contenido Manteniminetos -->

	</div><!-- Row -->

</section><!-- Fin Seccion Mantenimientos -->

<!-- Fin Contenido Mantenimienos -->