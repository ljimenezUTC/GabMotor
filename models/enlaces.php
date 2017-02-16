<?php 
	
	class EnlacesModels 
	{

		public function enlacesModel($enlaces){

			if ($enlaces == "ingreso" || $enlaces == "inicio" || $enlaces == "clientes" || $enlaces == "vehiculos" || $enlaces == "mantenimientos" || $enlaces == "reportes" || $enlaces == "salir" || $enlaces == "ingresoCliente" || $enlaces == "editarCliente") {
				
				$modulo = "views/modulos/" . $enlaces . ".php";

			}

			else if ($enlaces == "index"){

				$modulo = "views/modulos/ingreso.php";

			}else{

				$modulo = "views/modulos/ingreso.php";
			}

			return $modulo;

		}
	}
 ?>