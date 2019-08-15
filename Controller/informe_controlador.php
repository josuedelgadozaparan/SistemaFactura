<?php
class informe_controlador{

	public function Iniciar_informe(){
		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/informe.php";		
		require_once "View/plantilla_pie.php";
		


	}


	public function regUsuario(){
		$estado=false;
        $estado=usuario_model::regUsuario(

		$_POST['txtlogin'], 
		$_POST['txtpassword'],
		$_POST['txtnombre'],
		$_POST['txtcedula'],
		$_POST['txtfecha']
		
	  );
        if ($estado==true) {
        	  echo "<script>";
              echo  "alert('USUARIO REGISTRADO CORRECTAMENTE')";
              echo "</script>";
              require_once "View/plantilla_encabezado.php";
			require_once "View/usuario.php";
        }else{

        }
	}

public function prueba(){
	$link_valor=$_POST['selCombo'];

   IF($link_valor==1){
		echo "Hola"; }


	 }


	public function llenarTablaInforme(){

		
	
	$json=informe_model::ConsultarFacturas();

	
  
	$json_tabla = json_decode($json);

				echo "<thead>
					  <tr class="."info"."><th class="."text-center".">Numero factura</th><th class="."text-center".">Cantidad total</th><th class="."text-center".">Total factura</th><th class="."text-center".">Recibido</th><th class="."text-center".">Cliente</th><th class="."text-center".">Documento</th><th class="."text-center".">Facturador</th><th class="."text-center".">Fecha factura</th></tr>
					</thead>";
						
						
				for($i=0;$i<count($json_tabla);$i++){ 
				   echo "<tr class="."text-center".">

						<td>".$json_tabla[$i]->NumeroFactura."</td>
						<td>".$json_tabla[$i]->CantidadTotal."</td>				
						<td>".$json_tabla[$i]->TotalFactura."</td>
						<td>".$json_tabla[$i]->RecibidoFactura."</td>
						<td>".$json_tabla[$i]->NombreCliente."</td>
						<td>".$json_tabla[$i]->DocumentoCliente."</td>
						<td>".$json_tabla[$i]->NombreUsuario."</td>
						<td>".$json_tabla[$i]->FechaFacturaVenta."</td>

					    </tr>";
				}       								
									
				


}

public function llenarTablaDetalleFactura(){

		
	
	$json=informe_model::ConsultarDetalleFactura(

		$_POST['consecutivo']

	);

	 
  
	$json_tabla = json_decode($json);

						
						
				for($i=0;$i<count($json_tabla);$i++){ 
				   echo "<tbody class="."text-center"."><tr>

						<td>".$json_tabla[$i]->NumeroFactura."</td>
						<td>".$json_tabla[$i]->NombreProducto."</td>				
						<td>".$json_tabla[$i]->Cantidad."</td>
						<td>".$json_tabla[$i]->ValorProducto."</td>
						<td>".$json_tabla[$i]->NombreCliente."</td>
						<td>".$json_tabla[$i]->DocumentoCliente."</td>
						

					    </tr> </tbody>";
				}       								
									
				echo "</table>";
				

	

}


	}
?>

 