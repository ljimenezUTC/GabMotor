<?php 

	require_once "../../models/gestorMantenimientos.php";
	require_once "../../controllers/gestorMantenimientos.php";

	# CLASE Y METODOS
	# -----------------------------------------------------------------------
	class Ajax
	{
		
		#LISTAR LOS MANTENIMIENTOS PARA IMPRIMIRLOS EN EL COMBOBOX DE LA VISTA DE INGRESO DE MANTENIMIENTOS
		#-----------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosSubItems(){

			$respuesta = GestorMantenimientosController::listarCategoriasMantenimientosSubItemsController();

			echo $respuesta;
			
		}
		
	}

	#OBJETOS
	#---------------------------------------------------------------------------------------------
	$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] !=NULL) ? $_REQUEST["action"]:"";

	if ($action == "ajaxMantenimiento") {
		
		$c = new Ajax();
		$c->listarCategoriasMantenimientosSubItems();

	}	