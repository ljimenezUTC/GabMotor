<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>

<!-- Seccion Clientes -->
<section class="container">

	<div class="row">
		<!--Contenido Clientes-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

	        <div class="row">

				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">

					<span class="fa fa-th"> <a href="">Clientes</a></span>
					<p class="text-muted small">Administra Lista de Clientes</p>

	            </div>

	            <div class="col-md-6 pull-right seccion-add-clientes wow bounceInDown">

	                <!--Ingrese Clientes-->
	                <a href="ingresoCliente" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"></span> Nuevo cliente</a>

	            </div>

	        </div>

	        <!-- Inicio Panel -->
			<div class="panel panel-flat">

				<div class="panel-heading wow zoomIn">
					<h5 class="panel-title">Lista de clientes</h5>
				</div><hr>

				<!-- Listar Clientes -->
				<div class="row">

					<div class="col-lg-12 contenido-tabla-clientes">

						<div class="table-responsive">

							<table class="table table-bordered table-striped table-hover" id="datosTabla">

								<thead>

									<tr class="success tabla-header">
										<th>Cédula cliente</th>
										<th>Nombre completo cliente</th>
										<th>Dirección cliente</th>
										<th>Teléfono cliente</th>
										<th>Editar</th>
										<th>Eliminar</th>
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

				</div><!-- Fin de Listar Clientes -->

			</div><!-- Fin Panel -->

		</div><!-- Fin Contenido Clientes -->

	</div><!-- Row -->

</section><!-- Fin Seccion Clientes -->

