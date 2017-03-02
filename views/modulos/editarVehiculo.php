<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>
 <!-- FORMULARIO DE EDICION DE VEHICULOS -->

<section class="container">
	
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<br>
		<div class="row">

			<div class="col-md-6">
				<span class="fa fa-users"><a href="vehiculos">Vehículos - Editar Vehículo</a></span>
				<p class="text-muted">Administración de vehiculos</p>				
			</div>

			<div class="col-md-6 pull-right">
				<a href="vehiculos" class="btn btn-success pull-right"><i class="fa fa-users"></i> Lista de vehículos</a>
			</div>
			
		</div>


		<div class="panel panel-flat">

				<div class="panel-heading">
					<h5 class="panel-title">DATOS DEL VEHICULO</h5>
				</div>
				<hr>
				
		</div>

		<div>

			<form method="POST">
				
				<?php 

					$editarVehiculo = new GestorVehiculosController();
					$editarVehiculo->editarVehiculosController();
					$editarVehiculo->actualizarVehiculosController();
				 ?>
			
			</form>

		</div>


		<!-- MODAL CARGA DEL CLIENTES -->
		
		 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		 	<div class="modal-dialog modal-lg" role="document">
		 		<div class="modal-content">

					<div class="modal-header">
				        <h5 class="modal-title" id="myModalLabel">Buscar Clientes</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				     </div>

					<div class="modal-body">

						<form class="form-horizontal">

						  <div class="form-group">

							<div class="col-sm-5">
							  <input type="text" class="form-control" id="" placeholder="Buscar Clientes" onkeyup="load(1)">
							</div>

							<button type="button" class="btn btn-default" onclick="load(1)">Buscar</button>
						  </div>

						</form>

					<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->

					
					<div class="outer_div table-responsive" ></div><!-- Datos ajax Final -->
								

				  </div>



					<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>	
					</div>
		 		</div>
		 	</div>

		 </div>
				
		<!-- FIN DEL MODAL DE CARGA DEL CLIENTES -->

	</div>

</section>

 <!-- FIN DEL FORMULARIO DE EDICION VEHICULOS -->