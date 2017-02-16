<!DOCTYPE html>
<html lang="en">
	<head>
		
		<title>P&aacute;gina de inicio de sesión</title>

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		

		<!-- Bootstrap -->
		<link rel="stylesheet" href="views/css/bootstrap.min.css">
		<link rel="stylesheet" href="views/css/font-awesome.css">
		<link href="views/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="views/css/login.css">
		<link rel="stylesheet" href="views/css/estilos.css">
		<link rel="stylesheet" type="text/css" href="views/css/sweetalert.css">



		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		 <!--[if lt IE 9]>
		 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		 <![endif]-->

		<!-- jQuery -->
		<script type="text/javascript" src="views/js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="views/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="views/js/sweetalert.min.js"></script>


	</head>

	<body>
		<section class="container">
				<!--=====================================
				COLUMNA CONTENIDO        
				======================================-->
				<?php 
					$modulos = new EnlacesControllers();
					$modulos->enlacesController();
				 ?>

				<!--====  Fin de COLUMNA CONTENIDO  ====-->
			
			
		</section>

		<script src="views/js/script.js"></script>

	</body>
	
</html>