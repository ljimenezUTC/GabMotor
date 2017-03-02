<?php 

	#CLASE Y METODOS
	#------------------------------------------------------------------------
	class Ajax{

		public $idMantenimiento;

		public function agregarMantenimientos(){

			$datos = $this->idMantenimiento;

			echo $datos;
			
		}
	}




	#OBJETOS
	#------------------------------------------------------------------------
	if (isset($_POST["idMantenimiento"])) {
		
		$a = new Ajax();
		$a->idMantenimiento = $_POST["idMantenimiento"];
		$a->agregarMantenimientos();

	}
