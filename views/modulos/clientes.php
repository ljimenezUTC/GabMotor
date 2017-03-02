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
		<div id="seccionClientes" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 

	        <div class="row">
				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">
					<span class="fa fa-th"> <a href="">Clientes</a></span>
					<p class="text-muted small">Administra Lista de Clientes</p>
	            </div>

	            <div class="col-md-6 pull-right seccion-add-clientes wow bounceInDown">
	                <!--Ingrese Clientes-->
	                <a id="btnAgregarCliente" href="ingresoCliente" class="btn btn-info pull-right">
	                <span class="fa fa-plus-circle"> </span> Nuevo cliente</a>
	            </div>
	        </div>

	        <!-- Inicio Panel -->
			<div class="panel panel-flat">
				<div class="panel-heading wow zoomIn">
					<h5 class="panel-title">Lista de clientes</h5>
				</div>
				<hr>


				<div class="col-lg-12 seccion-buscar">
					<form class="form-inline">
			      		<input class="form-control mr-sm-2" type="text" placeholder="Ingrese la cedula">
			      		<button class="btn btn-outline-success my-2 mr-sm-2" type="submit">Buscar</button>
		    		</form>
				</div>

				<!-- Listar Clientes -->
				<div class="row">
					<div class="col-lg-12 contenido-tabla-clientes">
						<div class="table-responsive">
							<table class="table datatable-basic table-bordered table-striped table-hover">
								<thead>
									<tr class="success tabla-header">
										<th>Cédula</th>
										<th>Nombre completo</th>
										<th>Dirección</th>
										<th>Teléfono</th>
										<th colspan="3">Acción</th>
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

