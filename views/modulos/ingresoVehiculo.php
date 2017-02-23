<?php 

	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();

	}

 ?>


<!-- FORMULARIO DE INGRESO DE VEHICULOS -->

 <div class="row-fluid">

	<div class="col-md-12">

		<h2> Nuevo Vehiculo</h2>
		<hr>
		
		<form class="form-horizontal" id="">

				<div class="row">
				  
				  <div class="col-md-3">
				  <label class="control-label">Cedula del cliente</label>
					<input type="text" class="form-control" id="" >
				  </div>
				  
					<div class="col-md-3">
						<label  class="control-label">Nombre</label>
						<input type="text" class="form-control" id="" >
					</div>
					
					<div class="col-md-3">
						<label class="control-label">Direccion</label>
						<input type="text" class="form-control" id="">
					</div>
					
					<div class="col-md-3">
						<label class="control-label">Telefono</label>
						<input type="text" class="form-control" id="">
					</div>
							
				</div>
						
				<hr>
				<div class="col-md-12">
					<div class="pull-right">
						<button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#myModal" data-whatever="@getbootstrap">Agregar Cliente</button>

					</div>	
				</div>

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

				<div class="outer_div" ></div><!-- Datos ajax Final -->

			  </div>



				<div class="modal-footer">
						<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cerrar</button>	
				</div>
	 		</div>
	 	</div>
	 </div>
			
<!-- FIN DEL MODAL DE CARGA DEL CLIENTES -->

 </div> 

 <!-- FIN DEL FORMULARIO DE VEHICULOS -->


 <script type="text/javascript">
 	
 		$(document).ready(function(){
			load(1);
		});

		function load(page){
			var q= $("#q").val();
			var parametros={"action":"ajax","page":page,"q":q};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'./ajax/productos_pedido.php',
				data: parametros,
				 beforeSend: function(objeto){
				 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$('#loader').html('');
					
				}
			})
		}
 </script>



 


				