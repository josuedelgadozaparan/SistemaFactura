<?php
class proveedor_controlador{

	public function Iniciar_proveedor(){
		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/proveedor.php";
		require_once "View/plantilla_pie.php";


	}


	public function RegistrarProveedor(){

		 $estado=false;
            $json=proveedor_model::ComprobarNit($_POST['Nit']);
            $json_tabla = json_decode($json);
            $est=false;     

            $Nit =$_POST['Nit'];      
                
            for($i=0;$i<count($json_tabla);$i++){ 

                if($json_tabla[$i]->NitProveedor==$Nit)
                {

                 $est=true;             
                    
                }               

            }   

            if($est==true){


                 require_once'url.php';
				require_once "View/plantilla_encabezado.php";
				require_once "View/proveedor.php";
				require_once "View/plantilla_pie.php";

                echo "<script>";
                echo  "swal('Advertencia!','Este Nit ya se encuentra asignado otro proveedor, favor verificar!','error')";
                echo "</script>";

            }else{ 





			$estado=false;
	        $estado=proveedor_model::RegistrarProveedor(
	            $_POST['Nombre'],
				$_POST['direccion_proveedor'],
				$_POST['nombreContacto'],
				$_POST['Celular_contacto_proveedor'],
				$_POST['Nit'],
				$_POST['pagina_web']
			
		  );
	        if ($estado==true) {
	        	            
	            require_once'url.php';
				require_once "View/plantilla_encabezado.php";
				require_once "View/proveedor.php";
				require_once "View/plantilla_pie.php";

				echo "<script>";
	            echo  "swal('Excelente!','Proveedor registrado correctamente!','success')";
	            echo "</script>";


	        }else{

	            require_once'url.php';
	            require_once "View/plantilla_encabezado.php";
	            require_once "View/proveedor.php";
	            require_once "View/plantilla_pie.php";

	            echo "<script>";
	            echo  "swal('Advertencia!','Ha ocurrido un error al registrar este proveedor  en la base de datos, favor validar que los datos no esten repetidos!','error')";
	            echo "</script>";

	        }
        }
	}




	public function llenarTablaProveedor(){
	
	$json=proveedor_model::ConsultarTablaProveedor();
	$json_tabla = json_decode($json);
						
						
				for($i=0;$i<count($json_tabla);$i++){ 
				  echo "<tr>
						<td>".$json_tabla[$i]->IdProveedor."</td>
						<td>".$json_tabla[$i]->NombreProveedor."</td>
						<td>".$json_tabla[$i]->DireccionProveedor."</td>
						<td>".$json_tabla[$i]->NombreContactoProveedor."</td>
						<td>".$json_tabla[$i]->CelularContactoProveedor."</td>
						<td>".$json_tabla[$i]->NitProveedor."</td>
						<td>".$json_tabla[$i]->PaginaProveedor."</td>

						 <td><button type="."button"."  class="."boton1"." data-toggle="."modal"." data-target="."#myModal"."><span class="."icon-new-message"."></span></button></td>
							<td><button type="."button"." class="."boton2"." data-toggle="."modal"." data-target="."#myModal2"."><span class="."icon-trash"."></span></button></td>
							
						 </tr>";
				}       								
									
				


}



public function EliminarProveedor(){
		$estado=false;
        $estado=proveedor_model::EliminarProveedor(
		$_POST['idmodal_idProveedor_eliminar']
		
		
	  );
        if ($estado==true) {
        	               
              require_once'url.php';
			  require_once "View/plantilla_encabezado.php";
			  require_once "View/proveedor.php";
			  require_once "View/plantilla_pie.php";

		   echo "<script>";
           echo  "swal('Excelente!','Proveedor eliminado correctamente!','success')";
           echo "</script>";


        }else{

            require_once'url.php';
            require_once "View/plantilla_encabezado.php";
            require_once "View/proveedor.php";
            require_once "View/plantilla_pie.php";




            echo "<script>";
            echo  "swal('Advertencia!','Este provedor no se puede eliminar porque tiene productos(s) registrados en la base de datos!','error')";
            echo "</script>";


        }
	}


	public function ActualizarProveedor(){

		  $estado=false;
            $json=proveedor_model::ComprobarNitActualizar(

                $_POST['NitActual'],
                $_POST['modal_Nit']
            );

            $json_tabla = json_decode($json);
            $est=false;     
            $Nit =$_POST['modal_Nit'];      
                
            for($i=0;$i<count($json_tabla);$i++){ 

                if($json_tabla[$i]->NitProveedor==$Nit)
                {

                 $est=true;             
                    
                }    


            } 


            if($est==true){


                require_once'url.php';
				require_once "View/plantilla_encabezado.php";
				require_once "View/proveedor.php";
				require_once "View/plantilla_pie.php";

                echo "<script>";
                echo  "swal('Advertencia!','No se actualizó este registro porque este  Nit ya se encuentra asignado a otro proveedor, favor verificar!','error')";
                echo "</script>";

            }else{ 




			$estado=false;
	        $estado= proveedor_model::ActualizarProveedor(
	        $_POST['modal_idProveedor'],
			$_POST['modal_nombre'],    
			$_POST['modal_direccion'],
			$_POST['modal_nombre_contacto'],
			$_POST['modal_celular_contacto'],
			$_POST['modal_Nit'],
			$_POST['modal_pagina_web']
			
		  );
	        if ($estado==true) {
	        	              
	            require_once'url.php';
				require_once "View/plantilla_encabezado.php";
				require_once "View/proveedor.php";
				require_once "View/plantilla_pie.php";

				echo "<script>";
	            echo  "swal('Excelente!','Proveedor actualizado correctamente!','success')";
	            echo "</script>";


	        }else{

	            require_once'url.php';
	            require_once "View/plantilla_encabezado.php";
	            require_once "View/proveedor.php";
	            require_once "View/plantilla_pie.php";

	            echo "<script>";
	            echo  "swal('Advertencia!','Ha ocurrido un error al actualizar este proveedor  en la base de datos, favor validar que los datos ingresados no se encuentren asignados a otro usuario!','error')";
	            echo "</script>";



	        }
		}
    }
	
	}


	?>


