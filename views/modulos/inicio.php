<?php 
	
	session_start();

	if (!$_SESSION["logged_in"]) {
		
		header("location:ingreso");

		exit();
	}

	include "header.php";
	
 ?>

	<!--=====================================
		INICIO       
	======================================-->

		<div>

			<h1>Bienvenidos</h1>
			
			<p>BIenvenidos al panel de control</p>

		</div>
		


	<!--====  Fin de INICIO  ====-->
