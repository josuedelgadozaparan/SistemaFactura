<?php
  function cargaContenido($contenido, $accion){
  	require_once "Controller/" .$contenido."_controlador.php";
  	$clase = $contenido."_controlador";
  	$cnt = new $clase();
  	require_once "Model/".$contenido."_Model.php";
  	$cnt->{$accion}();
  }

    $controladores = array(

       "login" => array("index","Validar_Credenciales","RedireccionaPrincipal","CerarSesion"),  

       "usuario" => array("Iniciar_usuario","RegistrarUsuario","usuarioeliminar","ActualizarUsuario"),

       "cliente" => array("Iniciar_cliente","RegistrarCliente","ActualizarCliente","EliminarCliente"),

       "producto" => array("Iniciar_producto","RegistrarProducto","ActualizarProducto","EliminarProducto"),
 
       "proveedor" => array("Iniciar_proveedor","RegistrarProveedor","ActualizarProveedor","EliminarProveedor"),
  
       "factura" => array("Iniciar_factura"),

       "informe" => array("Iniciar_informe","llenarTablaDetalleFactura"),
 
       "nosotros" => array("Iniciar_nosotros"),

       "reporte" => array("ReporteFactura","ReporteExcelFacturas","ReporteExcelDetaFacturas")

    
    );
if (array_key_exists($controlador, $controladores)){
	if(in_array($accion, $controladores[$controlador])){
		cargaContenido($controlador, $accion);
	}
	else{
		echo "<center><h1> Este contenido no existe </h1></center>";
 
 }
} 

?>