<?php
    
    require_once "../../../models/conexion.php";

    $stmtObtenerIdOrden = Conexion::conectar()->prepare("SELECT LAST_INSERT_ID(id_orden) as last FROM orden_pago ORDER BY id_orden DESC LIMIT 0,1");

    $stmtObtenerIdOrden->execute();

    $idOrden = $stmtObtenerIdOrden->fetch();
    $idOrdenPago =  $idOrden["last"];

	require_once(dirname(__FILE__) . '/../html2pdf.class.php');
		
    
     include(dirname('__FILE__') . '/res/pedido_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Cotizacion.pdf');
    }
    catch(HTML2PDF_exception $e) {

        echo $e;
        exit;
    }
