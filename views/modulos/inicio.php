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
	<h1>Bienvenidos</h1>
	<p>BIenvenidos al panel de control</p>
</section><!-- Fin de Inicio-->
