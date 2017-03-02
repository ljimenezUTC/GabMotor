<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>

<!-- FORMULARIO DE INGRESO DE MANTENIMIENTOS -->

<!-- Seccion Ingresar mantenimientos -->

<section class="container">
	
	<div class="row">
		
		<!--Contenido Ingreso mantenimientos-->
		<div id="" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
			
			<div class="row">
				<div class="col-md-6  wow bounceInDown">
					<span class="fa fa-wrench"><a href="mantenimientos"> Mantenimientos - Añadir Mantenimiento</a></span>
					<p class="text-muted">Administración de Mantenimientos</p>	
				</div>

				<div class="col-md-6 pull-right ">
					<a href="mantenimientos" class="btn btn-success pull-right">
					<span class="fa fa-wrench"></span> Lista de Mantenimientos</a>
				</div>
			</div>

			<!-- Inicio Panel -->
			<div class="panel panel-flat ">
				<div class="panel-heading">
					<h5 class="panel-title">DATOS DEL MANTENIMIENTO</h5>
				</div>
				
				<hr>

				<!-- Contenido Formulario Add mantenimientos -->
				<div class="">
					<form method="POST">
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

						</div><br>
						
						<div class="row">

							<div class="col-lg-12 col-md-12 ">
								<div class="pull-right">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap"><span class="fa fa-car"></span> Agregar Vehiculo</button>
								</div>	
							</div>
							
						</div><br>

						<div class="form-group row">
					      	<label for="ingresoCategoriaMantenimiento" class="col-sm-2 form-control-label">Categoria<span class="text-danger">*</span> </label>
					      	<div class="col-sm-10">
					        	<select name="ingresoCategoriaMantenimiento" id="ingresoCategoriaMantenimiento" class="form-control" required="required">
					        		
					        	</select>
					      	</div>
					    </div>

					    <div class="form-group row">
					      	<label for="ingresoTipoMantenimiento" class="col-sm-2 form-control-label">Mantenimiento<span class="text-danger">*</span> </label>
					      	<div class="col-sm-10">
					        	<select name="ingresoTipoMantenimiento" id="ingresoTipoMantenimiento" class="form-control" required="required">
					        	</select>
					      </div>
					    </div>

				      

					    <div class="text-right form-group row">
					    	<div class="col-sm-12">
								<!--<a href="mantenimientos" class="btn btn-success">Cancaler <span class="fa fa-undo"></span></a>-->
								<button type="submit" class="btn btn-info"> Agregar <span class="fa fa-check-circle"></span></button>
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

