<?php
class login_controlador{

	public function index(){
		require_once'url.php';
		require_once "View/login.php";	
		require_once "View/plantilla_pie.php";

	}


	public function CerarSesion(){

		require_once'url.php';
        require_once "View/plantilla_fondo.php"; 

		echo "<script language='javascript'>"; 
        echo "swal('Gracias por preferirnos!', 'Su sesión ha sido cerrada correctamente! ', 'success');";
        echo "</script>";

        require_once'url.php';
		require_once "View/login.php";	
		require_once "View/plantilla_pie.php";

		

        
        
        


	

	}	

	
	public function Validar_Credenciales(){
		$estado=false;
        $estado=login_model::consultar_logueo(

		$_POST['Usuario'], 
		$_POST['Contraseña']
		
	  );
        if ($estado==true) {
        	  require_once "View/plantilla_fondo.php";
        	  echo "<script>";
              echo  "swal('Bienvenido a SistemFacture!','Sistema de inventario y facturacion!','success')";
              echo "</script>";
              
            require_once'url.php';
            require_once "View/plantilla_encabezado.php";            
			require_once "View/principal.php";
			require_once "View/plantilla_pie.php";

        }else{

        	

            require_once'url.php';
            require_once "View/plantilla_fondo.php";
			require_once "View/login.php";
			require_once "View/plantilla_pie.php";

			echo "<script>";
            echo  "swal('Incorrecto!','Credenciales invalidas, intentelo nuevamente!','error')";
            echo "</script>";


        }
	}


	public function RedireccionaPrincipal(){
	     
            require_once'url.php';
            require_once "View/plantilla_encabezado.php";            
			require_once "View/principal.php";
			require_once "View/plantilla_pie.php";


	}




	
	}
