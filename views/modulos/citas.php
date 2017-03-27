<?php 
	
	session_start();

	if (!isset($_SESSION["logged_in"])) {
		
		header("Location: ingreso");

		exit();
	}

	include 'header.php';

 ?>

 <div class="container">

 	<div class="row">

 		<div class="col-lg-12 col-md-12 col-sm-12">

 			<div class="row">

 				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">

					<span class="fa fa-th"> <a href="#">CITAS DIARIAS	</a></span>
					<p class="text-muted small">Administra las citas del día</p>

	            </div>
 				
 			</div><hr>

 			<div class="panel panel-flat">

 				<div class="row">

					<div class="col-lg-12 contenido-tabla-clientes">

						<div class="table-responsive text-center">

							<table class="table table-bordered table-striped table-hover" id="datosTabla">

								<thead>

									<tr class="success tabla-header">
										<th>Cliente</th>
										<th>Vehículo</th>
										<th>Estado</th>
										<th>Accion</th>
									</tr>

								</thead>

								<tbody>

									<?php 

										$citasDelDia = new GestorCitasController();
										$citasDelDia->listarCitasDelDiaController();
										$citasDelDia->realizarCitaController();


									 ?>

								</tbody>

							</table>

						</div>

					</div>

				</div>
 				
 			</div>
 			
 		</div>
 		
 	</div>
 	
 </div>