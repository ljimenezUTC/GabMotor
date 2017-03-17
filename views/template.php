<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>Home</title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Cargando fuentes -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic' rel='stylesheet' type='text/css'>
		
		<!-- Bootstrap -->
	    <link rel="stylesheet" href="views/css/bootstrap4.css">
	    <link rel="stylesheet" href="views/css/dataTables.jqueryui.css">
		
		<link rel="stylesheet" href="views/css/animate.min.css">
		<link rel="stylesheet" href="views/css/font-awesome.css">
		<link rel="stylesheet" href="views/css/sweetalert.css">
		<link rel="stylesheet" href="views/css/bootstrap-reboot.css">
		<link rel="stylesheet" href="views/css/login.css">
		<link rel="stylesheet" href="views/css/estilos.css">

		<!-- jQuery -->
	    <script src="views/js/jquery-3.1.1.min.js"></script>
		<script src="views/js/sweetalert.min.js"></script>
		<script src="views/js/bootstrap.min.js"></script>
		<script src="views/js/wow.min.js"></script>


	</head>

	<body>

	    <!-- Contenido -->
		<section>
			<?php 
				$modulos = new EnlacesControllers();
				$modulos->enlacesController();
			?>
		</section><!-- Fin contenido -->



		<!-- Scripts-->
		<script src="views/js/main.js"></script>
		<script src="views/js/gestorClientes.js"></script>
		<script src="views/js/gestorVehiculos.js"></script>
		<script src="views/js/gestorMantenimientos.js"></script>

		<script src="views/js/jquery.dataTables.js"></script>
	    <script src="views/js/dataTables.jqueryui.js"></script>
		
		<script>
	      $('#datosTabla').dataTable();
	    </script>
		
	</body>
	
</html>