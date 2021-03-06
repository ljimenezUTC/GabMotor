<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
 ?>



<!-- Seccion Ingresar mantenimientos -->

<div class="container">

	<div class="row">

		<!--Contenido Ingreso mantenimientos-->
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			
			<div class="row">

				<div class="col-md-6 lista-cliente-detalle titulo-add-mantenimento wow bounceInDown">

					<span class="fa fa-wrench"><a href="mantenimientos"> Añadir Mantenimiento</a></span>

				</div>

			</div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat ">

				<div class="panel-heading titulo-agregar wow zoomIn">
					<h6 class="panel-title">DATOS PARA AGREGAR EL MANTENIMIENTO</h6>
				</div><hr>

				<!-- Contenido Formulario Add mantenimientos -->
				<div class="contenedor-mantenimientos">

					<form method="POST" id="registrarMantenimientos">

						
						<div class="row">

							<div class="col-lg-12">

								<p id="seleccionVehiculo" class="text-right text-uppercase"><span class="text-danger lead">*</span> Seleccione un vehículo para agregar el mantenimiento 1)</p>
								
							</div>

							<div class="col-lg-2 col-md-12">

								<label  class="control-label">Nombre del Cliente</label>
								<input type="text" class="form-control" id="nombresClienteIngresoMantenimiento" readonly="readonly">

							</div>

							<div class="col-lg-2 col-md-12">

						  		<label class="control-label">Placas del vehículo</label>
								<input type="hidden" class="form-control" name="idVehiculoIngresoMantenimiento" id="idVehiculoIngresoMantenimiento">

								<input type="text" class="form-control" id="placasVehiculoIngresoMantenimiento" readonly="readonly">

							 </div>

							<div class="col-lg-2 col-md-12">

								<label  class="control-label">Marca vehículo</label>
								<input type="text" class="form-control" id="marcaVehiculoIngresoMantenimiento" readonly="readonly">

							</div>
						
							<div class="col-lg-2 col-md-12">

								<label class="control-label">Modelo vehículo</label>
								<input type="text" class="form-control" id="modeloVehiculoIngresoMantenimiento" readonly="readonly">

							</div>
						
							<div class="col-lg-2 col-md-12">

								<label class="control-label">Kilomátraje vehículo</label>
								<input type="text" class="form-control" id="kilometrajeVehiculoIngresoMantenimiento" readonly="readonly">

							</div>


							<div class="col-lg-2 col-md-12 bs">
								<button id="agregarVehiculo" type="button" class="col-md-12 btn btn-info btn-vehiculo" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap"><span class="fa fa-car icono-menu"></span> Agregar Vehículo</button>	

							</div>

						</div><br> <hr>

						<!--CARGA DE CATEGORIAS Y SUS MANTENIMIENTOS-->
						<div class="row">
						
							<div id="vistaMantenimientos" class="col-lg-12" ><!--style="display:none"-->

								<div id="resultados"></div><!-- Carga los datos ajax -->

								<div class="text-right form-group">

									<p class="text-right text-uppercase"><span class="text-danger lead">*</span>Agregue los mantenimientos realizados 3)</p>
									<button type="button" class="btn btn-info" id="btnRegistrarMantenimientos"><span class="fa fa-wrench icono-menu"></span> Agregar mantenimientos</button>

								</div>

							</div>


							<div class="col-lg-12 table-responsive contenido-temporal">
								
								<div id="resultadosMantenimientosTmp" class="resultados"></div><!-- Carga los datos ajax -->

							</div>


							<!--LISTAR MANTENIMIENTOS TEMPORALES PREVIOS A SER PROCESADOS-->
							<div class="col-md-12 seccion-guardar" id="contenedorGuardarMant" style="display: none;">
								
								<p class="text-right text-uppercase">Guarde los mantenimientos realizados 4)</p>
								<button type="submit" class="btn btn-info pull-right">
								<span class="fa fa-save"></span> Guardar Mantenimiento</button>

							</div><!-- FIN LISTAR MANTENIMIENTOS TEMPORALES PREVIOS A SER PROCESADOS-->

						</div><!--FIN DE CARGA DE CATEGORIAS Y SUS MANTENIMIENTOS-->

					</form>

				</div><!-- Contenido Formulario Add mantenimientos -->

			</div><!-- Fin Panel -->

		</div><!-- Fin Contenido Ingreso mantenimientos -->
		
	</div><!-- Row -->
	
</div>

<!-- Fin Seccion Ingresar mantenimientos -->


<!-- MODAL CARGA DEL CLIENTES -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

 	<div class="modal-dialog modal-lg" role="document">

 		<div class="modal-content">

			<div class="modal-header">
			
		        <h5 class="modal-title" id="myModalLabel">Vehículos Existentes</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>

		     </div>

			<div class="modal-body">

				<div class="col-lg-12 contenido-tabla-clientes tabla-modal">

					<div class="table-responsive" >

						<table class="table table-bordered table-striped table-hover" id="datosTabla">

						 	<thead>

						 		<tr class="tabla-header">

						 			<th>Propietario</th>
						 			<th>Placas</th>
						 			<th>Marca</th>
						 			<th>Modelo</th>
						 			<th>Año</th>
						 			<th>Kilometraje</th>
						 			<th>Agregar vehículo</th>

						 		</tr>

						 	</thead>

						 	<tbody>

						 		<?php 

						 			$listarVehiculos = new GestorMantenimientosController();
						 			$listarVehiculos->listarVehiculosMantenimientosController();

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

<!-- FIN  MODAL CARGA DEL CLIENTES -->

<?php 

	$guardarMantenimientos = new GestorMantenimientosController();
	$guardarMantenimientos->guardarMantenimientosController();

 ?>

