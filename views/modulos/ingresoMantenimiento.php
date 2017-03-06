<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>


<!-- Seccion Ingresar mantenimientos -->
<section class="container">

	<div class="row">
		<!--Contenido Ingreso mantenimientos-->
		<div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
			
			<div class="row">
				<div class="col-md-6 lista-cliente-detalle wow bounceInDown">
					<span class="fa fa-wrench"><a href="mantenimientos"> Añadir Mantenimiento</a></span>
				</div>
			</div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat ">
				<div class="panel-heading wow zoomIn">
					<h6 class="panel-title">DATOS PARA AGREGAR EL MANTENIMIENTO</h6>
				</div>
				
				<hr>

				<!-- Contenido Formulario Add mantenimientos -->
				<div class="contenedor-mantenimientos">
					<form method="POST">

						<div class="row">
							<div class="col-md-6">
								<label  class="control-label">Cliente</label>
								<input type="text" class="form-control" id="nombresClienteIngresoMantenimiento" readonly="readonly">
							</div>

							<div class="col-md-6">
								<p class="text-right font-italic text-success">Seleccione el vehiculo para agregar el mantenimiento 1)</p>
								<div class="pull-right">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap"><span class="fa fa-car icono-menu"></span>Agregar Vehiculo</button>
								</div>	
							</div>
					
						</div>
						
						<br>
						<div class="row">

							<div class="col-md-3">
						  		<label class="control-label">Placas del vehículo</label>
								<input type="hidden" class="form-control" name="idVehiculoIngresoMantenimiento" id="idVehiculoIngresoMantenimiento" >
								<input type="text" class="form-control" id="placasVehiculoIngresoMantenimiento" readonly="readonly">
							 </div>

							 <div class="col-md-3">
								<label  class="control-label">Marca</label>
								<input type="text" class="form-control" id="marcaVehiculoIngresoMantenimiento" readonly="readonly">
							</div>
						
							<div class="col-md-3">
								<label class="control-label">Modelo</label>
								<input type="text" class="form-control" id="modeloVehiculoIngresoMantenimiento" readonly="readonly">
							</div>
						
							<div class="col-md-3">
								<label class="control-label">Kilomátraje</label>
								<input type="text" class="form-control" id="kilometrajeVehiculoIngresoMantenimiento" readonly="readonly">
							</div>

						</div><br> <hr>


						<div class="row">
							
							<div class="col-lg-6">
								<div class="form-group row">
									<label for="ingresoCategoriaMantenimiento" class="col-md-3 form-control-label">Categoria<span class="text-danger">*</span> </label>
									<div class="col-md-9">
										<select name="ingresoCategoriaMantenimiento" id="ingresoCategoriaMantenimiento" class="form-control" required="required">
										</select>
									</div>
								</div>

								<div class="form-group row">
									<label for="ingresoTipoMantenimiento" class="col-md-3 form-control-label">Mantenimiento<span class="text-danger">*</span> </label>
									<div class="col-md-9">
										<select name="ingresoTipoMantenimiento" id="ingresoTipoMantenimiento" class="form-control" required="required">
										</select>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="text-right form-group row">
									<div class="col-sm-12">
										<p class="text-right font-italic text-success">Seleccione la categoria y mantenimiento realizado 2)</p>
										<button type="button" class="btn btn-info" id="agregarIdMantenimiento"><span class="fa fa-wrench icono-menu"></span>Agregar mantenimiento</button>
									</div>
								</div>					
							</div>	
						</div><hr>


						<div class="row">
							<div id="resultados" class='col-md-12 table-responsive'></div><!-- Carga los datos ajax -->
						</div>
						
						<hr>
						<div class="text-right form-group row">
					    	<div class="col-sm-12">
								<!--<a href="mantenimientos" class="btn btn-success">Cancaler <span class="fa fa-undo"></span></a>-->
								<p class="text-right font-italic text-success">Guarde los mantenimientos realizados 3)</p>
								<button type="submit" class="btn btn-info"><span class="fa fa-save icono-menu"></span>Guardar Mantenimiento</button>
							</div>
						</div>

					</form>
				</div><!-- Contenido Formulario Add mantenimientos -->
		  	</div><!-- Fin Panel -->
		</div><!-- Fin Contenido Ingreso mantenimientos -->
	</div><!-- Row -->
</section>

<!-- Fin Seccion Ingresar mantenimientos -->


<!-- MODAL CARGA DEL CLIENTES -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 	<div class="modal-dialog modal-lg" role="document">
 		<div class="modal-content">

			<div class="modal-header">
		        <h5 class="modal-title" id="myModalLabel">Buscar vehiculos</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		     </div>

			<div class="modal-body">

				<form class="form-horizontal">

				  <div class="form-group">

					<div class="col-sm-5">
					  <input type="text" class="form-control" id="" placeholder="Buscar Vehiculo" onkeyup="load(1)">
					</div>

					<button type="button" class="btn btn-default" onclick="load(1)">Buscar</button>
				  </div>

				</form>

			<!--<div id="loader" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div> Carga gif animado -->

			
			<div class="listaVehiculosModal table-responsive" ></div><!-- Datos ajax Final -->
						

		  </div>

			<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>	
			</div>
 		</div>
 	</div>

</div>

<!-- FIN  MODAL CARGA DEL CLIENTES -->

<?php 

	$registrarMantenimientos = new GestorMantenimientosController();
	$registrarMantenimientos->registrarMantenimientosController();

 ?>

