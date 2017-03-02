<?php 

	require_once "../../models/gestorMantenimientos.php";
	require_once "../../controllers/gestorMantenimientos.php";

	# CLASE Y METODOS
	# -----------------------------------------------------------------------
	class Ajax
	{
	

		#LISTAR LAS CATEGORIAS PARA IMPRIMIRLAS EN EL COMBOBOX DE LA VISTA DE INGRESO DE MANTENIMIENTOS
		#-----------------------------------------------------------------------------------
		public function listarCategoriasMantenimientos(){

			$respuesta = GestorMantenimientosController::listarCategoriasMantenimientosController();

			echo $respuesta;

		}

		
	}

	#OBJETOS
	#---------------------------------------------------------------------------------------------
	$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] !=NULL) ? $_REQUEST["action"]:"";

	if ($action == "ajaxCategoria") {

		$a = new Ajax();
		$a->listarCategoriasMantenimientos();

	}