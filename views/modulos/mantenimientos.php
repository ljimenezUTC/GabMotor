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
		<div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

			<div class="row">
				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">
					<span class="fa fa-th"> <a href="">Mantenimientos</a></span>
					<p class="text-muted small">Administra Lista de Mantenimientos</p>
	            </div>

	            <div class="col-md-6 pull-right seccion-add-clientes wow bounceInDown">
	                <!--Ingrese Mantenimientos-->
	                <a id="" href="ingresoMantenimiento" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"> </span> Nuevo Mantenimiento</a>
	            </div>
	        </div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat">
				<div class="panel-heading wow zoomIn">
					<h5 class="panel-title">Reporte de Mantenimientos</h5>
				</div>
				<hr>

				<div class="col-lg-12 seccion-buscar">

					<form class="form-inline ">
			      		<input class="form-control mr-sm-0 buscar" type="text" placeholder="Ingrese la ceula del cliente">
			      		<button class="btn btn-outline-info my-2 mr-sm-0 btn-buscar" type="submit">Buscar</button>
		    		</form>
				</div>

				<!-- Listar Mantenimientos -->
				<div class="row">
					<div class="col-lg-12 contenido-tabla-clientes">
						<div class="table-responsive">
							<table class="table datatable-basic table-bordered table-striped table-hover">
								<thead>
									<tr class="success tabla-header">
										<th>Cédula cliente</th>
										<th>Nombre</th>
										<th>Placas del vehículo</th>
										<th>Marca/Modelo</th>
										<th>Kilometraje</th>
										<th>Categoria mantenimiento</th>
										<th>Mantenimiento</th>
										<th>Fecha de realizacion</th>
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
				</div><!-- Fin de Listar Vehiculos -->
			</div><!-- Fin Panel -->
		</div><!-- Fin Contenido Vehiculo -->
	</div><!-- Row -->
</section><!-- Fin Seccion Vehiculos -->

<!-- Fin de Vehiculos -->