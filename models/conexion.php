<?php 

	class Conexion 
	{

		public function conectar (){

			$link = new PDO("mysql:host=localhost;dbname=db_gab_motors","root","");

			return $link;
		}


	}


