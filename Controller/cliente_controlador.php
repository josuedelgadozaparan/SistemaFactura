<?php
class cliente_controlador{

	public function Iniciar_cliente(){

		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/cliente.php";
		require_once "View/plantilla_pie.php";

	}

	public function RegistrarCliente(){

            $estado=false;
            $json=cliente_model::ComprobarDocumento($_POST['documento']);
            $json_tabla = json_decode($json);
            $est=false;     

            $Doc =$_POST['documento'];      
                
            for($i=0;$i<count($json_tabla);$i++){ 

                if($json_tabla[$i]->DocumentoCliente==$Doc)
                {

                 $est=true;             
                    
                }               

            }   

            if($est==true){


                require_once'url.php';
                require_once "View/plantilla_encabezado.php";
                require_once "View/cliente.php";
                require_once "View/plantilla_pie.php";

                echo "<script>";
                echo  "swal('Advertencia!','Este cliente ya se encuentra registrado!','error')";
                echo "</script>";

            }else{ 

                echo "<script>";
                echo  "swal({
                  title: '¿Seguro que desea registrar este cliente?',
                  text: 'Seleccione una opcion...',
                  type: 'info',
                  showCancelButton: true,
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                  }, function () {
                  setTimeout(function () {
                    swal('Excelente!','Cliente registrado correctamente!','success');
                  }, 2000);
                 });";
                echo "</script>"; 



    		$estado=false;
            $estado=cliente_model::RegistrarCliente(

        		$_POST['nombre'], 
        		$_POST['apellido'],
        		1,
        		$_POST['documento'],
        		$_POST['direccion'],
        		$_POST['barrio'],		
        		$_POST['telefono'],
        		$_POST['correo'],
                $_POST['TipoCliente'],
                0,	
        		1		
    	    );

            if ($estado==true) {

            		            
                require_once'url.php';
    			require_once "View/plantilla_encabezado.php";
    			require_once "View/cliente.php";
    			require_once "View/plantilla_pie.php";

    			echo "<script>";
                echo  "swal('Excelente!','Cliente registrado correctamente!','success')";
                echo "</script>";

                


            }else{


                require_once'url.php';
                require_once "View/plantilla_encabezado.php";
                require_once "View/cliente.php";
                require_once "View/plantilla_pie.php";

                echo "<script>";
                echo  "swal('Advertencia!','Ha ocurrido un error al registrar este cliente  en la base de datos, favor validar que los datos no esten repetidos!','error')";
                echo "</script>";

            }

        } 
	}


	public function llenarTablaCliente(){
	
    	$json=cliente_model::ConsultarTablaCliente();
    	$json_tabla = json_decode($json);
						
						
				for($i=0;$i<count($json_tabla);$i++){ 

				  echo "<tr>
						<td>".$json_tabla[$i]->IdCliente."</td>
						<td>".$json_tabla[$i]->NombreCliente."</td>					
						<td>".$json_tabla[$i]->DocumentoCliente."</td>
						<td>".$json_tabla[$i]->DireccionCliente."</td>
						<td>".$json_tabla[$i]->BarrioCliente."</td>
						<td>".$json_tabla[$i]->TelefonoCliente."</td>
						<td>".$json_tabla[$i]->EmailCliente."</td>
                        <td>".$json_tabla[$i]->NumeroCompraCliente."</td>

						<td><button type="."button"."  class="."boton1"." data-toggle="."modal"." data-target="."#myModal"."><span class="."icon-new-message"."></span></button></td>
							<td><button type="."button"." class="."boton2"." data-toggle="."modal"." data-target="."#myModal2"."><span class="."icon-trash"."></span></button></td>
							
						    </tr>";
					
				
				}               

                  								
	
     }



    public function EliminarCliente(){
        $estado=false;
        $estado=cliente_model::EliminarCliente(

        	$_POST['modal_idcliente_eliminar']	

    	);

        if ($estado==true) {
        	               
            require_once'url.php';
        	require_once "View/plantilla_encabezado.php";
        	require_once "View/cliente.php";
        	require_once "View/plantilla_pie.php";

        	echo "<script>";
            echo  "swal('Excelente!','Cliente eliminado correctamente!','success')";
            echo "</script>";

        }else{

            require_once'url.php';
            require_once "View/plantilla_encabezado.php";
            require_once "View/cliente.php";
            require_once "View/plantilla_pie.php";

            echo "<script>";
            echo  "swal('Advertencia!','Ha ocurrido un error al eliminar este cliente  en la base de datos, favor validar que los datos ingresados no se encuentren asignados a otro cliente!','error')";
             echo "</script>";

        }
    }


	public function ActualizarCliente(){


            $estado=false;
            $json=cliente_model::ComprobarDocumentoActualizar(

                $_POST['DocumentoActual'],
                $_POST['modal_documento']
            );

            $json_tabla = json_decode($json);
            $est=false;     
            $Doc =$_POST['modal_documento'];      
                
            for($i=0;$i<count($json_tabla);$i++){ 

                if($json_tabla[$i]->DocumentoCliente==$Doc)
                {

                 $est=true;             
                    
                }    


            } 


            if($est==true){


                require_once'url.php';
                require_once "View/plantilla_encabezado.php";
                require_once "View/cliente.php";
                require_once "View/plantilla_pie.php";

                echo "<script>";
                echo  "swal('Advertencia!','No se actualizó cliente porque este  documento ya se encuentra asignado a otro cliente, favor verificar!','error')";
                echo "</script>";

            }else{ 



    		$estado=false;
            $estado= cliente_model::ActualizarCliente(
            $_POST['modal_idcliente'], 
    		$_POST['modal_nombre'], 
    		$_POST['modal_documento'],
    		$_POST['modal_prueba'],
    		$_POST['modal_barrio'],
    		$_POST['modal_telefono']		
	    );

        if ($estado==true) {
    	               
            require_once'url.php';
			require_once "View/plantilla_encabezado.php";
			require_once "View/cliente.php";
			require_once "View/plantilla_pie.php";

			echo "<script>";
            echo  "swal('Excelente!','Cliente actualizado correctamente!','success')";
            echo "</script>";


        }else{

            require_once'url.php';
            require_once "View/plantilla_encabezado.php";
            require_once "View/cliente.php";
            require_once "View/plantilla_pie.php";

            echo "<script>";
            echo  "swal('Advertencia!','Ha ocurrido un error al actualizar este cliente  en la base de datos, favor validar que los datos ingresados no se encuentren asignados a otro usuario!','error')";
            echo "</script>";


        }


    }
	}
	
	}


	?>
	

   



  
