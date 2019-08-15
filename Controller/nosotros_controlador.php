<?php
class nosotros_controlador{

	public function Iniciar_nosotros(){
		require_once'url.php';
		require_once "View/plantilla_encabezado.php";
		require_once "View/nosotros.php";
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

						<td><button type="."button"."  class="."boton1"." data-toggle="."modal"." data-target="."#myModal"."><span class="."icon-new-message"."></span></button></td>
							<td><button type="."button"." class="."boton2"." data-toggle="."modal"." data-target="."#myModal2"."><span class="."icon-trash"."></span></button></td>
							
						    </tr>";
					
				
				}       								
	
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
	/*
	public function registro(){
		require_once "View/usuario/frmRegistro.php";		
	}
	public function consulta(){
		require_once "View/usuario/frmbuscar.php";
  }

	
   
	public function valUsuario(){
	$estado = usuario_model::valUsuario($_POST['usuario'],$_POST['pass']);
	if(isset($_SESSION['USU_ID']))
		header("Location: /mvcBlog");
	else{
		require_once "View/usuario/frmLogin.php";
		echo "datos incorrectos";
		}
	}
	public function Cerrar(){
		if (isset($_SESSION['USU_ID'])){
			session_destroy();
			header("Location: /mvcBlog");
		}
		}


		*/
	}
