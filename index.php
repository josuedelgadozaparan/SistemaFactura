<?php
session_start();
require_once ('Model/conexion.php');
if(isset($_GET['controlador']) && isset($_GET['accion'])){
	$controlador = $_GET['controlador'];
	$accion      = $_GET['accion'];
}else{
	$controlador = "login";
	$accion     = "index";
	
}
$URL = "http://$_SERVER[HTTP_HOST]"."/SistemaFactura";
require_once "View/plantilla_fondo.php";

