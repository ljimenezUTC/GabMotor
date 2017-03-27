<?php  
    #require_once "../../models/conexion.php";
    require_once "../../../models/conexion.php";

    //Importamos la libreria
	require_once('../../mpdf/mpdf.php');

	#-------------------------------------------------------------------------------------------------
	$stmtObtenerIdOrden = Conexion::conectar()->prepare("SELECT LAST_INSERT_ID(id_orden) as last FROM orden_pago ORDER BY id_orden DESC LIMIT 0,1");

    $stmtObtenerIdOrden->execute();
    $idOrden = $stmtObtenerIdOrden->fetch();
    $idOrdenPago =  $idOrden["last"];

    //Consulta Cliente Vehiculo
    $stmtClienteVehiculo = Conexion::conectar()->prepare("SELECT cliente.cedula_cliente, cliente.nombre_cliente, cliente.apellido_cliente, cliente.direccion_cliente, cliente.telefono_cliente, vehiculo.kilometraje_vehiculo, vehiculo.placas_vehiculo, vehiculo.marca_vehiculo, vehiculo.modelo_vehiculo, vehiculo.anio_vehiculo FROM orden_pago INNER JOIN vehiculo ON orden_pago.id_vehiculo = vehiculo.id_vehiculo INNER JOIN cliente ON vehiculo.id_cliente = cliente.id_cliente WHERE orden_pago.id_orden = :idOrden");

    $stmtClienteVehiculo->bindParam(":idOrden", $idOrdenPago, PDO::PARAM_INT);
    $stmtClienteVehiculo->execute();
    $resultado = $stmtClienteVehiculo->fetch();

    //Consulta Detalle Orden
     $stmtDetallesOrden = Conexion::conectar()->prepare(" SELECT detalle_orden_pago.costo_detalle_mantenimiento, mantenimiento.descripcion_mantenimiento, categoria.nombre_categoria FROM detalle_orden_pago INNER JOIN orden_pago ON detalle_orden_pago.id_orden = orden_pago.id_orden INNER JOIN mantenimiento ON detalle_orden_pago.id_mantenimiento = mantenimiento.id_mantenimiento INNER JOIN categoria ON mantenimiento.id_categoria = categoria.id_categoria WHERE detalle_orden_pago.id_orden = :idOrden");

    $stmtDetallesOrden->bindParam(":idOrden", $idOrdenPago, PDO::PARAM_INT);
    $stmtDetallesOrden->execute();
    $respuesta = $stmtDetallesOrden->fetchAll();


    /***************************
    	Configuración MPDF
    ***************************/
    //Variable para insertar mi codigo HTML
    $html = '
<body>
		
    <head>
    	<!-- Bootstrap -->
	    <link rel="stylesheet" href="../../../views/css/bootstrap4.css">
    </head>

	<section class="row">
		<div class="contenido-logo">
			<img src="\GabMotor\views\images\logo.png" alt="Logo" width="98" id="logo">			
		</div>

		<div class="orden-trabajo">
			<h3> &nbsp; &nbsp; O R D E N &nbsp; D E &nbsp; T R A B A J O</h3>
		</div>

		<div class="numero-factura">
			<h6>FACTURA Nº '.$idOrdenPago.' <br> <p class="fecha">Latacunga '.date("d - m - Y").'</p></h6> 
		</div>


		<div class="container">
			 <footer>
				<div class="end"></div>
			</footer>
			<div class="details clearfix">
				<div class="client left">
					<table class="cliente-contenido">

						<tbody>
							<tr>
								<td class="cliente">PROPIETARIO</td>
								<td class="item-cliente">'.$resultado["nombre_cliente"] .' '.$resultado["apellido_cliente"].'</td>
							</tr>
							<tr>
								<td class="cliente">CEDULA</td>
								<td class="item-cliente">'.$resultado["cedula_cliente"].'</td>
							</tr>
							<tr>
								<td class="cliente">DIRECCIÓN</td>
								<td class="item-cliente">'.$resultado["direccion_cliente"].'</td>
							</tr>
							<tr>
								<td class="cliente">TELÉFONO</td>
								<td class="item-cliente">'.$resultado["telefono_cliente"].'</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="data right">
					<table class="cliente-contenido">
						<tbody>
							<tr>
								<td class="cliente">PLACAS</td>
								<td class="item-cliente">'.$resultado["placas_vehiculo"].'</td>
							</tr>
							<tr>
								<td class="cliente">KILOMETRAJE</td>
								<td class="item-cliente">'.$resultado["kilometraje_vehiculo"].'</td>
							</tr>
							<tr>
								<td class="cliente">MARCA</td>
								<td class="item-cliente">'.$resultado["marca_vehiculo"].'</td>
							</tr>
							<tr>
								<td class="cliente">MODELO</td>
								<td class="item-cliente">'.$resultado["modelo_vehiculo"].'</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			
			<h4 class="titulo-trabajos">T R A B A J O S&nbsp; A &nbsp;R E A L I Z A R S E</h4>

			<table class="tabla-detalle">
				<thead>
			   		<tr>
						<th class="categoria">Categoria</th>
						<th class="mantenimiento">Mantenimiento</th>
						<th class="costo">Costo</th>
					</tr>
				</thead>

				<tbody>' ;

				$subtototal = 0;
				$iva = 0.12;
				$totalIva = 0;
				$total = 0;

				foreach ($respuesta as $row => $item) {

					$html2	.= '<tr>
						<td class="desc">'.$item["nombre_categoria"].'</td>
						<td class="qty">'.$item["descripcion_mantenimiento"].'</td>
						<td class="unit"> ' . ' $'.$item["costo_detalle_mantenimiento"].'</td>
						
					</tr>';

					$costoMantenimiento = $item["costo_detalle_mantenimiento"];
					$costoMantenimientoF = number_format($costoMantenimiento,2); # Formateo de variables
					$costoMantenimientoR = str_replace(",", "", $costoMantenimientoF); #Reemplazo de las comas
					$subtototal += $costoMantenimientoR;
				}

				$totalIva = $subtototal * $iva;
				$total = $subtototal + $totalIva;

			$html3 = '</tbody>
			</table>

			<br>

			<div class="text-right">
				<h6 class="total-pagar">T O T A L &nbsp; A &nbsp; P A G A R</h6>
			</div>

			<table class="table contenido-total">
				<tbody>
				    <tr>
				      <th scope="row" class="text-right total">SUBTOTAL</th>	
				      <td class="text-right igual">' . ' $ ' . number_format($subtototal, 2) .'</td>      
				    </tr>
				    <tr>
				      <th scope="row" class="text-right">IVA 12%</th>
				      <td class="text-right">' . ' $ ' . number_format($totalIva, 2) .'</td>
				    </tr>

				    <tr>
				      <th scope="row" class="text-right">TOTAL</th>
				      <td class="text-right">' . ' $ ' . number_format($total, 2) .'</td>
				    </tr>
				</tbody>
		    </table>
		</div>
	</section>

	<br><br>
	<footer>
		<div class="end"></div>
	</footer>
</body>	
    ';


    //Formato de la hoja
	$mpdf = new mPDF('c','A4');

	//Insertando hoja de estilos al HTML
	$css = file_get_contents('css-pdf/estilos-pdf.css');
	
	//Ejecuta CSS
	$mpdf->writeHTML($css, 1);
	//Ejecuta HTML
	$mpdf->writeHTML($html);
	$mpdf->writeHTML($html2);
	$mpdf->writeHTML($html3);
	//Nombre del PDF
	$mpdf->Output('reporte.pdf','I');

?>
