<?php 

	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();

	}

	include "header.php";

 ?>


<!-- FORMULARIO DE INGRESO DE VEHICULOS -->

<!-- Seccion Ingresar vehiculos -->
<section class="container">
	
	<div class="row">
		
		<!--Contenido Ingreso Vehiculos-->
		<div id="seccionClientes" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
			
			<div class="row">

				<div class="col-md-6 lista-cliente-detalle detalle-add-cliente wow bounceInDown">
					<span class="fa fa-car"><a href="vehiculos"> Vehículos - Añadir Vehículo</a></span>
					<p class="text-muted">Administración de vehiculos</p>	
				</div>

				<div class="col-md-6 pull-right seccion-add-clientes">
					<a href="vehiculos" class="btn btn-success pull-right">
					<span class="fa fa-car"></span> Lista de vehiculos</a>
				</div>
				
			</div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat contenido-add-cliente">
				<div class="panel-heading">
					<h5 class="panel-title">DATOS DEL VEHICULO</h5>
				</div>
				
				<hr>

				<!-- Contenido Formulario Add Vehiculos -->
				<div class="formulario-add-cliente">
					<form method="POST">
						<div class="row">
							<div class="col-md-3">
						  		<label class="control-label">Cédula del cliente</label>
								<input type="hidden" class="form-control" name="idClienteIngresoVehiculo" id="idClienteIngresoVehiculo" >
								<input type="text" class="form-control" id="cedulaClienteIngresoVehiculo" readonly="readonly">
							 </div>

							 <div class="col-md-3">
								<label  class="control-label">Nombre</label>
								<input type="text" class="form-control" id="nombreClienteIngresoVehiculo" readonly="readonly">
							</div>
						
							<div class="col-md-3">
								<label class="control-label">Dirección</label>
								<input type="text" class="form-control" id="direccionClienteIngresoVehiculo" readonly="readonly">
							</div>
						
							<div class="col-md-3">
								<label class="control-label">Teléfono</label>
								<input type="text" class="form-control" id="telefonoClienteIngresoVehiculo" readonly="readonly">
							</div>

						</div><br>
						
						<div class="row">

							<div class="col-lg-12 col-md-12 ">
								<div class="pull-right">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap"><span class="fa fa-user"></span> Agregar Cliente</button>
								</div>	
							</div>
							
						</div><br>

						<div class="form-group row">
					      	<label for="ingresoPlacasVehiculo" class="col-sm-2 form-control-label">Placas<span class="text-danger">*</span> </label>
					      	<div class="col-sm-10">
					        	<input type="text" name="ingresoPlacasVehiculo" id="ingresoPlacasVehiculo" class="form-control" required="required" placeholder="Ingresa las placas del vehiculo">
					      	</div>
					    </div>

					    <div class="form-group row">
					      	<label for="ingresoMarcaVehiculo" class="col-sm-2 form-control-label">Marca<span class="text-danger">*</span> </label>
					      	<div class="col-sm-10">
					        	<input type="text" name="ingresoMarcaVehiculo" id="ingresoMarcaVehiculo" class="form-control" required="required" placeholder="Ingresa la marca del vehiculo">
					      </div>
					    </div>

				      	<div class="form-group row">
					      	<label for="ingresoModeloVehiculo" class="col-sm-2 form-control-label">Modelo<span class="text-danger">*</span> </label>
					      	<div class="col-sm-10">
					        	<input type="text" name="ingresoModeloVehiculo" id="ingresoModeloVehiculo" class="form-control" required="required" placeholder="Ingresa el modelo del vehiculo">
					      </div>
					    </div>


					    <div class="form-group row">
					      <label for="ingresoAnioVehiculo" class="col-sm-2 form-control-label">Año<span class="text-danger">*</span> </label>
					      <div class="col-sm-10">
					        <input type="text" name="ingresoAnioVehiculo" id="ingresoAnioVehiculo" class="form-control" required="required" placeholder="Ingresa el año del vehiculo">
					      </div>
					    </div>

					    <div class="form-group row">
					      	<label for="ingresoKilometrajeVehiculo" class="col-sm-2 form-control-label">Kilometraje<span class="text-danger">*</span> </label>
					      	<div class="col-sm-10">
					        	<input type="number" name="ingresoKilometrajeVehiculo" id="ingresoKilometrajeVehiculo" class="form-control" required="required" placeholder="Ingresa el kilometraje del vehiculo">
					      	</div>
					    </div>

					    <div class="text-right form-group row">
					    	<div class="col-sm-12">
								<a href="vehiculos" class="btn btn-success">Cancaler <span class="fa fa-undo"></span></a>
								<button type="submit" class="btn btn-info"> Agregar <span class="fa fa-check-circle"></span></button>
							</div>
						</div>
					</form>
				</div><!-- Contenido Formulario Add Vehiculos -->
		  	</div><!-- Fin Panel -->
		</div><!-- Fin Contenido Ingreso Vehiculos -->



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
				



 <?php 
 		$registrarVehiculo = new GestorVehiculosController();
 		$registrarVehiculo->ingresarVehiculosController();
  ?>


 


				