<?php
class producto_controlador{

	public function Iniciar_producto(){
		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/producto.php";
		require_once "View/plantilla_pie.php";


	}


	public function RegistrarProducto(){

		$estado=false;
            $json=producto_model::ComprobarCodigo($_POST['codigo']);
            $json_tabla = json_decode($json);
            $est=false;     

            $cod =$_POST['codigo'];      
                
            for($i=0;$i<count($json_tabla);$i++){ 

                if($json_tabla[$i]->CodigoProducto==$cod)
                {

                 $est=true;             
                    
                }               

            }   

            if($est==true){


                require_once'url.php';
			    require_once "View/plantilla_encabezado.php";
				require_once "View/producto.php";
				require_once "View/plantilla_pie.php";

				echo "<script>";
	            echo  "swal('Advertencia!','El codigo ingresado ya se encuentra asignado a otro producto en la base de datos, favor verificar!','error')";
	            echo "</script>";


            }else{ 

			$estado=false;
	        $estado=producto_model::RegistrarProducto(

			    $_POST['Nombre'],
				$_POST['codigo'],
				$_POST['cantidad'],
				$_POST['stock'],
				$_POST['valor'],
				$_POST['proveedor'],
				1,
				1,
				1,
				1

			
		  );
	        if ($estado==true) {
	        	               
	            require_once'url.php';
			    require_once "View/plantilla_encabezado.php";
				require_once "View/producto.php";
				require_once "View/plantilla_pie.php";

				echo "<script>";
	            echo  "swal('Excelente!','Producto registrado correctamente!','success')";
	            echo "</script>";

	        }else{

	            require_once'url.php';
	            require_once "View/plantilla_encabezado.php";
	            require_once "View/producto.php";
	            require_once "View/plantilla_pie.php";



	            echo "<script>";
	            echo  "swal('Advertencia!','Ha ocurrido un error al registrar este producto  en la base de datos, favor validar que los datos no esten repetidos!','error')";
	            echo "</script>";

	        }
        }
	}




	public function llenarTablaProducto(){
	
	$json=producto_model::ConsultarTablaProducto();
	$json_tabla = json_decode($json);
						
						
				for($i=0;$i<count($json_tabla);$i++){ 
				    echo "<tr>
						 <td>".$json_tabla[$i]->IdProducto."</td>
						 <td>".$json_tabla[$i]->NombreProducto."</td>
						 <td>".$json_tabla[$i]->CodigoProducto."</td>
						 <td>".$json_tabla[$i]->CantidadProducto."</td>
						 <td>".$json_tabla[$i]->StockMinimoProducto."</td>
						 <td>".$json_tabla[$i]->ValorProducto."</td>
						 <td>".$json_tabla[$i]->ProveedorProducto."</td>

						 <td><button type="."button"."  class="."boton1"." data-toggle="."modal"." data-target="."#myModal"."><span class="."icon-new-message"."></span></button></td>
							<td><button type="."button"." class="."boton2"." data-toggle="."modal"." data-target="."#myModal2"."><span class="."icon-trash"."></span></button></td>
							
						    </tr>";
				}       								
									
				


}



public function EliminarProducto(){
		$estado=false;
        $estado=producto_model::EliminarProducto(
		$_POST['idmodal_idProducto_eliminar']
		
		
	  );
        if ($estado==true) {
        	               
            require_once'url.php';
		    require_once "View/plantilla_encabezado.php";
			require_once "View/producto.php";
			require_once "View/plantilla_pie.php";

		   echo "<script>";
           echo  "swal('Excelente!','Producto eliminado correctamente!','success')";
           echo "</script>";


        }else{

            require_once'url.php';
            require_once "View/plantilla_encabezado.php";
            require_once "View/producto.php";
            require_once "View/plantilla_pie.php";


            echo "<script>";
            echo  "swal('Advertencia!','Este producto no se puede eliminar porque  registra en factura(s) en la base de datos, favor verificar!','error')";
            echo "</script>";



        }
	}


	public function ActualizarProducto(){

		$estado=false;
            $json=producto_model::ComprobarCodigoActualizar(

                $_POST['CodigoActual'],
                $_POST['modal_codigo']
            );

            $json_tabla = json_decode($json);
            $est=false;     
            $Cod =$_POST['modal_codigo'];      
                
            for($i=0;$i<count($json_tabla);$i++){ 

                if($json_tabla[$i]->CodigoProducto==$Cod)
                {

                 $est=true;             
                    
                }    


            } 


            if($est==true){


                require_once'url.php';
			    require_once "View/plantilla_encabezado.php";
			    require_once "View/producto.php";
				require_once "View/plantilla_pie.php";

                echo "<script>";
                echo  "swal('Advertencia!','No se actualizó  porque este  codigo ya se encuentra asignado a otro producto, favor verificar!','error')";
                echo "</script>";

            }else{ 



			$estado=false;
	        $estado= producto_model::ActualizarProducto(

	        $_POST['modal_idProducto'],
	        $_POST['modal_nombre'],
			$_POST['modal_codigo'],    
			$_POST['modal_cantidad'],
			$_POST['modal_valor'],
			$_POST['modal_proveedor']
			
			
		  );
	        if ($estado==true) {
	        	  
	              
	             require_once'url.php';
			     require_once "View/plantilla_encabezado.php";
				 require_once "View/producto.php";
				 require_once "View/plantilla_pie.php";


				echo "<script>";
	                echo  "swal('Excelente!','Producto actualizado correctamente!','success')";
	            echo "</script>";


	        }else{

	            require_once'url.php';
	            require_once "View/plantilla_encabezado.php";
	            require_once "View/producto.php";
	            require_once "View/plantilla_pie.php";

	            echo "<script>";
	            echo  "swal('Advertencia!','Ha ocurrido un error al actualizar este producto  en la base de datos, favor validar que los datos ingresados no se encuentren asignados a otro producto!','error')";
	            echo "</script>";

	        }
		}

	}
	
	}

	?>


