<?php 

	session_start();
	
	if (!$_SESSION["logged_in"]) {

		header("Location:ingreso");
		
		exit();

	}

	include "header.php";

 ?>