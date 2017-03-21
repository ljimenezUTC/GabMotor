

<style type="text/css">
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.pumpkin{
	background:#d35400;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:#bdc3c7;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}

table.page_footer {
	width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;
	}

</style>











<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "obedalvarado.pw "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 25%; color: #444444;">
                <img src="\GabMotor\views\images\logo.png" alt="Logo" width="100"><br>
                
            </td>
			<td style="width: 75%;text-align:right;font-size:24px;color:#2c3e50">
			PEDIDO Nº <?php echo $idOrdenPago;?>
			</td>
			
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
			<td class='pumpkin' style="width:45%; ">PROVEEDOR</td>
			<td  style="width:10%; "></td>
			<td class='pumpkin' style="width:45%; ">ENVIAR A</td>
		</tr>
		<tr>
			<td style="width:45%; ">
				<?php //echo $rw_proveedor['nombre_proveedor']?><br>
				Dirección: <?php //echo $rw_proveedor['direccion']?><br> 
				Teléfono: <?php //echo $rw_proveedor['telefono']?><br>
				
				Email: <?php //echo $rw_proveedor['email']?>
			</td>
			<td  style="width:10%; "></td>
			<td style="width:45%; ">
				<?php //echo $rw_perfil['nombre_comercial']; ?><br>
				Dirección:<?php //echo $rw_perfil['direccion']; ?><br>
				Teléfono: <?php //echo $rw_perfil['telefono']; ?><br>
				Email: <?php //echo $rw_perfil['email']; ?>
			</td>
			
		</tr>
	</table>
	<br>
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
		<tr>
			<td class='pumpkin' style="width:33%; ">TRANSPORTE</td>
			<td class='pumpkin' style="width:34%; ">CONDICIONES DE PAGO</td>
			<td class='pumpkin' style="width:33%; text-align:right ">FECHA</td>
		</tr>
		<tr>
			<td style="width:33%; ">
				<?php //echo $transporte;?>
			</td>
			<td style="width:34%; ">
				<?php //echo $condiciones;?>
			</td>
			<td  style="width:33%; text-align:right"><?php echo date("d-m-Y");?></td>
		</tr>
	</table>
	

	<br>
   
    
       
  
    <table cellspacing="0" style="width: 100%; border: solid 0px #7f8c8d; text-align: center; font-size: 10pt;padding:1mm;">
        <tr >
            <th class="pumpkin" style="width: 14% ">CODIGO</th>
			<th class="pumpkin" style="width: 7% ">CANT.</th>
            <th class="pumpkin" style="width: 55%">DESCRIPCION</th>
            <th class="pumpkin" style="width: 14%;text-align:right">PRECIO UNIT.</th>
            <th class="pumpkin" style="width: 10%;text-align:right">TOTAL</th>
            
        </tr>
   
	
        <tr>
            <td class='<?php echo $clase;?>' style="width: 14%; text-align: center"><?php //echo $codigo_producto; ?></td>
			<td class='<?php echo $clase;?>' style="width: 7%; text-align: center"><?php //echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 55%; text-align: left"><?php //echo $nombre_producto.$marca_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 14%; text-align: right"><?php //echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: right"><?php //echo $precio_total_f;?></td>
            
        </tr>
    
	</table>
    <table cellspacing="0" style="width: 100%; border: solid 0px black; background: white; font-size: 11pt;padding:1mm;">
        <tr>
			<th style="width: 50%; text-align: right;"></th>
            <th style="width: 37%; text-align: right;">SUBTOTAL &#36;</th>
            <th style="width: 13%; text-align: right;"><?php //echo number_format($total_neto,2);?></th>
        </tr>
		<tr>
			<th class='pumpkin' style="width: 50%; text-align: center;">Comentarios o instruciones especiales</th>
            <th style="width: 37%; text-align: right;">IVA  &#36;</th>
            <th style="width: 13%; text-align: right;"><?php //echo number_format($total_iva,2);?></th>
        </tr>
		<tr>
			<td class='border-left border-bottom border-right' style="width: 50%;"><?php // echo $comentarios;?></td>
            <th  style="width: 37%; text-align: right;">TOTAL &#36; </th>
            <th style="width: 13%; text-align: right;"><?php //echo number_format($sumador_total,2);?></th>
        </tr>
    </table>
	
	
	<br>
	<p style="font-size:11pt;text-align:center">Si tiene alguna consulta sobre este pedido por favor contácte a:<br>
		<?php // echo $rw_perfil['propietario'].", <strong>Teléfono: </strong>".$rw_perfil['telefono'].", <strong>Email:</strong> ".$rw_perfil['email']; ?><br>
	</p>
	  

</page>
