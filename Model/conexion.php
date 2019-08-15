<?php
class conexion{
	private $conn;
	private  $host="localhost";
    private  $user="root";
    private  $pass="";
    private  $database="sistema";

	public function __construct(){
		try{
			$this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->database,$this->user,$this->pass);
			 //this hace referencia a la variable de la clase
			$this->conn->setAttribute(PDO::ATTR_ERRMODE
				, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	public function conectar(){
		if($this->conn instanceof PDO){
			return $this->conn;
			echo "Conexion exitosa";
		}
	}

	public function cerrar(){
     $this->con=null;
	}
}


