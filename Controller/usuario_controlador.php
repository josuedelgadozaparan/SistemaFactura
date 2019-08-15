<?php
class usuario_controlador{

	public function Iniciar_usuario(){
		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/usuario.php";
		require_once "View/plantilla_pie.php";


	}


	public function RegistrarUsuario(){

		
	    $json=usuario_model::ComprobarLogin($_POST['usuario']);
	    $json_tabla = json_decode($json);
		$es=false;

		$log =$_POST['usuario'];		
			
		for($i=0;$i<count($json_tabla);$i++){ 

			if($json_tabla[$i]->LoginUsuario==$log)
			{

			 $es=true;				
				
			}				

		}   

		if($es==true){


			require_once'url.php';
			require_once "View/plantilla_encabezado.php";
			require_once "View/usuario.php";
			require_once "View/plantilla_pie.php";


			echo "<script>";
            echo  "swal('Advertencia!','Este Login de usuario ya se encuentra asignado!','error')";
            echo "</script>";

		}else{ 


			$estado=false;
		    $json=usuario_model::ComprobarUsuario($_POST['documento']);
		    $json_tabla = json_decode($json);
			$est=false;		

			$Doc =$_POST['documento'];		
				
			for($i=0;$i<count($json_tabla);$i++){ 

				if($json_tabla[$i]->DocumentoUsuario==$Doc)
				{

				 $est=true;				
					
				}				

			}   

			if($est==true){


				require_once'url.php';
				require_once "View/plantilla_encabezado.php";
				require_once "View/usuario.php";
				require_once "View/plantilla_pie.php";


				echo "<script>";
	            echo  "swal('Advertencia!','Este usuario ya se encuentra registrado!','error')";
	            echo "</script>";

			}else{ 


				$estado=false;
		        $estado=usuario_model::RegistrarUsuario(

				$_POST['usuario'], 
				$_POST['contraseña'],
				$_POST['nombre'],
				$_POST['apellidos'],
				$_POST['documento'],
				$_POST['direccion'],
				$_POST['correo'],
				$_POST['celular'],	
				1,
				1
				
			  );
		        if ($estado==true) {

		        	
		            
		            require_once'url.php';
					require_once "View/plantilla_encabezado.php";
					require_once "View/usuario.php";
					require_once "View/plantilla_pie.php";

					echo "<script>";
		            echo  "swal('Excelente!','Usuario registrado correctamente!','success')";
		            echo "</script>";


		        }else{

		            require_once'url.php';
		            require_once "View/plantilla_encabezado.php";
		            require_once "View/usuario.php";
		            require_once "View/plantilla_pie.php";


		            echo "<script>";
		            echo  "swal('Advertencia!','Ha ocurrido un error al registrar este usuario  en la base de datos, favor validar que los datos no esten repetidos!','error')";
		            echo "</script>";

		        }


	        }
        }
	}




	public function consusuario(){
	
	$json=usuario_model::consusuario();
	$json_tabla = json_decode($json);
						
						
				for($i=0;$i<count($json_tabla);$i++){ 

					if($json_tabla[$i]->IdPerfil==1)
					{
					   $perfil="Admin";
					}else
					{
						$perfil="Invitado";
					}

				    echo "
                        <tr>
						<td>".$json_tabla[$i]->IdUsuario."</td>
						<td>".$json_tabla[$i]->LoginUsuario."</td>
						<td>".$json_tabla[$i]->PasswordUsuario."</td>
						<td>".$json_tabla[$i]->NombreUsuario."</td>
						<td>".$json_tabla[$i]->ApellidoUsuario."</td>
						<td>".$json_tabla[$i]->DocumentoUsuario."</td>
						<td>".$json_tabla[$i]->EmailUsuario."</td>
						<td>".$perfil."</td>									
						<td><button type="."button"."  class="."boton1"." data-toggle="."modal"." data-target="."#myModal"."><span class="."icon-new-message"."></span></button></td>
					     <td><button type="."button"." class="."boton2"." data-toggle="."modal"." data-target="."#myModal2"."><span class="."icon-trash"."></span></button></td>
						
					    </tr>";
				}       								
									
				


}



public function usuarioeliminar(){
	$estado=false;
    $estado=usuario_model::usuarioeliminar(

	   $_POST['modal_idusuario_eliminar']
		
		
	);
        if ($estado==true) {  	  
            
            require_once'url.php';
			require_once "View/plantilla_encabezado.php";
			require_once "View/usuario.php";
			require_once "View/plantilla_pie.php";

		   echo "<script>";
           echo  "swal('Excelente!','Usuario eliminado correctamente!','success')";
           echo "</script>";

        }else{

            require_once'url.php';
            require_once "View/plantilla_encabezado.php";
            require_once "View/usuario.php";
            require_once "View/plantilla_pie.php";


            echo "<script>";
            echo  "swal('Advertencia!','Este usuario no se puede eliminar porque tiene factura(s) creadas en la base de datos!','error')";
            echo "</script>";



        }
	}


	public function ActualizarUsuario(){

		$json=usuario_model::ComprobarLoginActualizar(
			$_POST['modal_LoginActual'],
			$_POST['modal_usuario']
		);
	    $json_tabla = json_decode($json);
		$es=false;

		$log =$_POST['modal_usuario'];		
		$login="";	
		for($i=0;$i<count($json_tabla);$i++){ 

			if($json_tabla[$i]->LoginUsuario==$log)
			{

			 $es=true;				
				
			}	

				
		} 

       

		if($es==true){


			require_once'url.php';
			require_once "View/plantilla_encabezado.php";
			require_once "View/usuario.php";
			require_once "View/plantilla_pie.php";


			echo "<script>";
            echo  "swal('Advertencia!','No se actualizó  porque este Login de usuario ya se encuentra asignado!','error')";
            echo "</script>";

		}else{ 


			$estado=false;
		    $json=usuario_model::ComprobarDocumentoActualizar(

		    	$_POST['modal_DocumentoActual'],
		    	$_POST['modal_documento']

		    );


		    $json_tabla = json_decode($json);
			$est=false;		

			$Doc =$_POST['modal_documento'];		
				
			for($i=0;$i<count($json_tabla);$i++){ 

				if($json_tabla[$i]->DocumentoUsuario==$Doc)
				{

				 $est=true;				
					
				}				

			}   

			if($est==true){


				require_once'url.php';
				require_once "View/plantilla_encabezado.php";
				require_once "View/usuario.php";
				require_once "View/plantilla_pie.php";


				echo "<script>";
	            echo  "swal('Advertencia!','No se atualizó  porque este documento ya se encuentra asignadoa otro usuario!','error')";
	            echo "</script>";

			}else{ 
			$estado=false;
	        $estado= usuario_model::usuarioactualizar(
	        $_POST['modal_idusuario'], 
			$_POST['modal_usuario'], 
			$_POST['modal_password'],
			$_POST['modal_nombre'],
			$_POST['modal_apellido'],
			$_POST['modal_documento'],
			$_POST['modal_correo'],
			1
		
	  );
        if ($estado==true) {
        	 
              require_once'url.php';
			  require_once "View/plantilla_encabezado.php";
			  require_once "View/usuario.php";
			  require_once "View/plantilla_pie.php";

			   echo "<script>";
               echo  "swal('Excelente!','Usuario actualizado correctamente!','success')";
               echo "</script>";




        }else{

            require_once'url.php';
            require_once "View/plantilla_encabezado.php";
            require_once "View/usuario.php";
            require_once "View/plantilla_pie.php";



            echo "<script>";
            echo  "swal('Advertencia!','Ha ocurrido un error al actualizar este usuario  en la base de datos, favor validar que los datos ingresados no se encuentren asignados a otro usuario!','error')";
            echo "</script>";


        }
    }

    }
	}
	
	}
?>



