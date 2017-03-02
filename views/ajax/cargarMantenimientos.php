<?php 

	require_once "../../models/gestorMantenimientos.php";
	require_once "../../controllers/gestorMantenimientos.php";

	# CLASE Y METODOS
	# -----------------------------------------------------------------------
	class Ajax
	{
		public $idCategoria;

		#LISTAR LOS MANTENIMIENTOS PARA IMPRIMIRLOS EN EL COMBOBOX DE LA VISTA DE INGRESO DE MANTENIMIENTOS
		#-----------------------------------------------------------------------------------
		public function listarCategoriasMantenimientosSubItems(){

			$datos = $this->idCategoria;

			$respuesta = GestorMantenimientosController::listarCategoriasMantenimientosSubItemsController($datos);

			echo $respuesta;
			

		}
		
	}

	#OBJETOS
	#---------------------------------------------------------------------------------------------
	$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] !=NULL) ? $_REQUEST["action"]:"";

	if ($action == "ajaxMantenimiento") {

		if (isset($_POST["idCategoria"])) {
		
			$c = new Ajax();
			$c->idCategoria = $_POST["idCategoria"];
			$c->listarCategoriasMantenimientosSubItems();

		}

	}
