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

	<strong><h4>Bienvenidos al panel de control</h4></strong>

	<div class="bootstrap snippet">
        <div class="alert alert-success alert-white rounded">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
            <div class="icon">
                <i class="fa fa-group"></i>
            </div>
            <strong><h4 class="text-danger">Clientes</h4></strong>
            <p class="">Administrador de clientes</p>
            <p class=""><span class="fa fa-plus-circle"></span> Agregar</p>
            <p class=""><span class="fa fa-pencil"></span> Actualizar</p>
            <p class=""><span class="fa fa-trash"></span> Eliminar</p>
        </div>

        <div class="alert alert-success alert-white rounded">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
            <div class="icon">
                <i class="fa fa-car"></i>
            </div>
            <strong><h4 class="text-danger">Vehículos</h4></strong>
            <p class="">Administrador de vehículos</p>
            <p class=""><span class="fa fa-plus-circle"></span> Agregar</p>
            <p class=""><span class="fa fa-pencil"></span> Actualizar</p>
            <p class=""><span class="fa fa-trash"></span> Eliminar</p>
        </div>

        <div class="alert alert-success alert-white rounded">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
            <div class="icon">
                <i class="fa fa-wrench"></i>
            </div>
           <strong><h4 class="text-danger">Mantenimientos</h4></strong>
            <p class="">Administrador de mantenimientos</p>
            <p class=""><span class="fa fa-plus-circle"></span> Agregar</p>
            <p class=""><span class="fa fa-pencil"></span> Actualizar</p>
            <p class=""><span class="fa fa-trash"></span> Eliminar</p>
        </div>

        <div class="alert alert-info alert-white rounded">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
            <div class="icon">
                <i class="fa fa-info-circle"></i>
            </div>
            <strong>Gab Motors</strong> 
            Administrador
        </div>  
    </div>
</section><!-- Fin de Inicio-->
