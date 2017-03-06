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
		<link rel="stylesheet" href="views/css/bootstrap.min.css">
		<link rel="stylesheet" href="views/css/animate.min.css">
		<link rel="stylesheet" href="views/css/font-awesome.css">
		<link rel="stylesheet" href="views/css/sweetalert.css">
		<link rel="stylesheet" href="views/css/login.css">
		<link rel="stylesheet" href="views/css/estilos.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		 <!--[if lt IE 9]>
		 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		 <![endif]-->


		 <!-- jQuery -->
		<script type="text/javascript" src="views/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="views/js/sweetalert.min.js"></script>
		<script type="text/javascript" src="views/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="views/js/wow.min.js"></script>


	</head>

	<body>

	    <!--  COLUMNA CONTENIDO -->
		<section>
			<?php 
				$modulos = new EnlacesControllers();
				$modulos->enlacesController();
			?>
		</section><!-- Fin de COLUMNA CONTENIDO -->



		<script type="text/javascript" src="views/js/main.js"></script>
		<script type="text/javascript" src="views/js/gestorClientes.js"></script>
		<script type="text/javascript" src="views/js/gestorVehiculos.js"></script>
		<script type="text/javascript" src="views/js/gestorMantenimientos.js"></script>

	</body>
	
</html>