<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>

<!-- Inicio -->
<section class="container">

	<div class="bootstrap snippet">
        
        <div class="alert alert-info alert-white rounded wow bounceInDown">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">
                <span class="fa fa-angle-down"></span>
            </button>
            <div class="icon">
                <i class="fa fa-info-circle"></i>
            </div>
            <h5  class="inicio">Bienvenido al sistema de gestion Gabmotors</h5>
            <p>Sistema de gestión de mantenimientos de vehículos que ingresan al taller integral Gabmotors.</p>
        </div> 

        <div class="alert alert-info alert-detalle rounded wow zoomIn">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close"><span class="fa fa-angle-down"></span></button>

            <h5 class="inicio">Información acerca del sistema</h5>

            <h6><span class="fa fa-group"></span> Clientes</h6>
            <p>Administrador de clientes</p>
            <p><span class="fa fa-user"></span> Agregar clientes</p>
            <p><span class="fa fa-pencil"></span> Actualizar clientes</p>
            <p class=""><span class="fa fa-trash"></span> Eliminar clientes</p>

            <h6><span class="fa fa-car"></span> Vehículos</h6>
            <p>Administrador de vehículos</p>
            <p><span class="fa fa-car"></span> Agregar vehículos</p>
            <p><span class="fa fa-pencil"></span> Actualizar vehículos</p>
            <p class=""><span class="fa fa-trash"></span> Eliminar vehículos</p>
            
            <h6><span class="fa fa-wrench"></span> Mantenimientos</h6>
            <p>Administrador de mantenimientos</p>
            <p><span class="fa fa-wrench"></span> Agregar mantenimientos</p>
            <p><span class="fa fa-pencil"></span> Actualizar mantenimientos</p>
            <p><span class="fa fa-trash"></span> Eliminar mantenimientos</p>

        </div>
    </div>
</section><!-- Fin de Inicio-->
