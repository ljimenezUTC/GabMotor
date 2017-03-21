<?php 

	class Conexion 
	{

		public function conectar (){

			$link = new PDO("mysql:host=localhost;dbname=db_gab_motors","root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

			return $link;
		}


	}


