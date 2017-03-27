<?php 
	require_once "models/enlaces.php";
	require_once "models/ingreso.php";
	require_once "models/gestorClientes.php";
	require_once "models/gestorVehiculos.php";
	require_once "models/gestorMantenimientos.php";
	require_once "models/gestorPerfil.php";
	require_once "models/gestorCitas.php";

	require_once "controllers/template.php";
	require_once "controllers/enlaces.php";
	require_once "controllers/ingreso.php";
	require_once "controllers/salir.php";
	require_once "controllers/gestorClientes.php";
	require_once "controllers/gestorVehiculos.php";
	require_once "controllers/gestorMantenimientos.php";
	require_once "controllers/gestorPerfil.php";
	require_once "controllers/gestorCitas.php";

	require_once "views/mensajes.php";
	
	$template = new TemplateController();
	$template->template();
	