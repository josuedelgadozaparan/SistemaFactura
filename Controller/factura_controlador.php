<?php
class factura_controlador{

	public function Iniciar_factura(){
		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/factura.php";		
		require_once "View/plantilla_pie.php";
		
		$json=factura_model::ConsultarConsecutivoFactura();

		 if($_SESSION["Numero"]==0){

         $_SESSION["Numero"]=1;
         }


	}


	public function CodigoFactura(){
		
		$salida=array();
		for ($i=2001;$i<2002;$i++){
		    for($j=9990;$j<10000;$j++){
		        $salida[]=$i.str_pad($j, 5, "0", STR_PAD_LEFT); 
		    }
		}

		var_dump($salida);

	}



public function ConsecutivoFactura(){
	$Consecutivo;
	$json=factura_model::ConsultarConsecutivoFactura();
	$json_tabla = json_decode($json);
						
						
				for($i=0;$i<count($json_tabla);$i++){ 
				   $Consecutivo=$json_tabla[$i]->Id;						
				}       								
									
				
				alert($Consecutivo);
	

}



public function usuarioeliminar(){
		$estado=false;
        $estado=usuario_model::usuarioeliminar(
		$_POST['modal_txtid_de']
		
		
	  );
        if ($estado==true) {
        	  echo "<script>";
              echo  "alert('USUARIO ELIMINADO CORRECTAMENTE')";
              echo "</script>";
              require_once "View/plantilla_encabezado.php";
			  require_once "View/usuario.php";
        }else{

        }
	}


	public function usuarioactualizar(){
		$estado=false;
        $estado= usuario_model::usuarioactualizar(
        $_POST['modal_txtid_up'], 
		$_POST['modal_txtlogin_up'], 
		$_POST['modal_txtpassword_up'],
		$_POST['modal_txtnombre_up'],
		$_POST['modal_txtcedula_up'],
		$_POST['modal_txtfec_up']
		
	  );
        if ($estado==true) {
        	  echo "<script>";
              echo  "alert('USUARIO ACTUALIZADO CORRECTAMENTE')";
              echo "</script>";
              require_once "View/plantilla_encabezado.php";
			  require_once "View/usuario.php";
        }else{

        }
	}
	
	}

?>




