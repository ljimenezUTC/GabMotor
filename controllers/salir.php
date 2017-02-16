<?php 
	
	/**
	* 
	*/
	class SalirController
	{
		
		public function salir(){
			session_unset();
			session_destroy();
			header('Location:index.php?action=ingreso');
		}
	}

 ?>