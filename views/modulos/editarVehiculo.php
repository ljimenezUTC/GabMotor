<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>


<!-- FORMULARIO DE EDICION DE VEHICULOS -->
<!-- Seccion editar vehiculos -->
<section class="container">
	
	<div class="row">
		
		<!--Contenido Editar Vehiculos-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
			
			<div class="row">

				<div class="col-md-6 lista-cliente-detalle detalle-add-cliente wow bounceInDown">

					<span class="fa fa-car"><a href="vehiculos"> Vehículos - Editar Vehículo</a></span>

				</div>

				<!--<div class="col-md-6 pull-right seccion-add-clientes">

					<a href="vehiculos" class="btn btn-info pull-right">
					<span class="fa fa-car"></span> Lista de vehiculos</a>

				</div>-->

			</div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat contenido-add-cliente">

				<div class="panel-heading">

					<h5 class="panel-title">DATOS DEL VEHICULO</h5>

				</div><hr>

				<!-- Contenido Formulario Editar Vehiculos -->
				<div class="formulario-add-cliente">

					<form method="POST">
						
						<?php 

							$editarVehiculo = new GestorVehiculosController();
							$editarVehiculo->editarVehiculosController();
							$editarVehiculo->actualizarVehiculosController();

						 ?>
					
					</form>

				</div><!-- Contenido Formulario Editar Vehiculo -->

		  	</div><!-- Fin Panel -->

		</div><!-- Fin Contenido Editar Vehiculo -->

	</div><!-- Row -->
	
</section><!-- Fin Seccion Editar Vehiculo -->
<!-- FIN FORMULARIO DE EDICION DE VEHICULOS -->



<!-- MODAL CARGA DEL CLIENTES -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

 	<div class="modal-dialog modal-lg" role="document">

 		<div class="modal-content">

			<div class="modal-header">

		        <h5 class="modal-title" id="myModalLabel">Clientes Existentes</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		     </div>

			<div class="modal-body">

				<div class="col-lg-12 contenido-tabla-clientes">

					<div class="table-responsive" >

						<table class="table table-bordered table-striped table-hover" id="datosTabla">

							<thead>

								<tr class="tabla-header">

									<th>Cedula</th>
									<th>Nombre</th>
									<th>Direccion</th>
									<th>Telefono</th>
									<th>Accion</th>
								</tr>

							</thead>

							<tbody>

								<?php

									$listarClientes = new GestorVehiculosController();
									$listarClientes->listarClientesVehiculosController();

								?>

							</tbody>

						</table>

					</div><!-- Datos ajax Final -->

				</div>	

		  	</div>

			<div class="modal-footer">

				<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>

			</div>

 		</div>

 	</div>

 </div>
 <!-- FIN MODAL CARGA DEL CLIENTES -->

