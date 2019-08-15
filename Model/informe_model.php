<?php

class informe_model{
  /////////////////////////////////////////////////////////////////////////
	public function __construct(){}
 

   //////////////////////////////CONSULTAR///////////////////////////////////
  public function ConsultarFacturas(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql='SELECT f.NumeroFactura,f.CantidadTotal,f.TotalFactura,f.RecibidoFactura,  c.NombreCliente,c.DocumentoCliente, u.NombreUsuario,f.FechaFacturaVenta from factura f INNER JOIN cliente c on f.IdCliente=c.IdCliente INNER JOIN usuario u on f.IdUsuario=u.IdUsuario';
      $sth=$c->prepare($sql);    
      $sth->execute(); 
      $Usuario_Consultar_Tabla=[];
     

      while($row=$sth->fetch())
      {


          $NumeroFactura=$row['NumeroFactura'];
          $CantidadTotal=$row['CantidadTotal'];
          $TotalFactura=$row['TotalFactura'];
          $RecibidoFactura=$row['RecibidoFactura'];
          $NombreCliente=$row['NombreCliente'];
          $DocumentoCliente=$row['DocumentoCliente'];
          $NombreUsuario=$row['NombreUsuario'];
          $FechaFacturaVenta=$row['FechaFacturaVenta'];
         

          $Usuario_Consultar_Tabla[]= array(

          'NumeroFactura'           => $NumeroFactura, 
          'CantidadTotal'           => $CantidadTotal, 
          'TotalFactura'           => $TotalFactura, 
          'RecibidoFactura'           => $RecibidoFactura, 
          'NombreCliente'        => $NombreCliente,
          'DocumentoCliente'        => $DocumentoCliente, 
          'NombreUsuario'     => $NombreUsuario,
          'FechaFacturaVenta'       => $FechaFacturaVenta
                
        );    

         

     

     }

      $json_usuario = json_encode($Usuario_Consultar_Tabla);
      return $json_usuario;
   
   }
   catch (PDOException $ex) {
    die("Error occurred:" . $ex->getMessage());

  } 

}



 public function ConsultarDetalleFactura($cod){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql="SELECT f.NumeroFactura,p.NombreProducto,d.Cantidad,p.ValorProducto,c.NombreCliente, c.DocumentoCliente FROM detallefactura d INNER JOIN factura f on d.IdFactura=f.IdFactura INNER JOIN cliente c on f.IdCliente=c.IdCliente inner join producto p on d.IdProducto= p.IdProducto  where f.NumeroFactura='$cod'";
      $sth=$c->prepare($sql);    
      $sth->execute(); 
       $consultar_Tabla=[];
      while($row=$sth->fetch())
      {

          $NumeroFactura=$row['NumeroFactura'];
          $NombreProducto=$row['NombreProducto'];
          $Cantidad=$row['Cantidad'];
          $ValorProducto=$row['ValorProducto'];
          $NombreCliente=$row['NombreCliente'];
          $DocumentoCliente=$row['DocumentoCliente'];
         
         
         

          $consultar_Tabla[]= array(

          'NumeroFactura'           => $NumeroFactura, 
          'NombreProducto'           => $NombreProducto, 
          'Cantidad'           => $Cantidad, 
          'ValorProducto'           => $ValorProducto, 
          'NombreCliente'        => $NombreCliente,
          'DocumentoCliente'        => $DocumentoCliente
          
                
        );       

     }
   
     $json_factura = json_encode($consultar_Tabla);
     return $json_factura;
   }
   catch (PDOException $ex) {
    die("Error occurred:" . $ex->getMessage());

  } 

}

///////////////////////////////////////////////////////////////////////
 //////////////////////////////CONSULTAR NOMBRE DE USUARIO///////////////////////////////////
  public function consusuariologin($login){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();
     
     
      $sql='CALL ususarioconsultar_login(:login)';
      $sth=$c->prepare($sql);
     $sth->bindParam(':login', $tipo, PDO::PARAM_STR,20);
      $sth->execute();  
      while($row=$sth->fetch()){
      
       $NombreUsuario =     $row['NombreUsuario'];
      
       

       $Usuario_Consultar_Tabla[]= array('NombreUsuario'=> $NombreUsuario
                
                
                 )  ;
                 // echo $row['LoginUsuario'];
   //print_r($Usuario_Consultar_Tabla);


     }
    // echo $Usuario_Consultar_Tabla['LoginUsuario'];
     $json_usuario = json_encode($Usuario_Consultar_Tabla);
     return $json_usuario;
   }
   catch (PDOException $ex) {
    die("Error occurred:" . $ex->getMessage());

  } 

}



//////////////////////////////ELIMINAR///////////////////////////////////
  public static function usuarioeliminar($id){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL usuarioeliminar(:id)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->execute();  
                //echo "registro exitoso correctamente";
              }
              catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
                $estado=false;
              } 
              $bd->cerrar();
              
             $estado=true;
              return $estado;
            }

    

       
  }
    /////////////////////////////////////////////////////////////////////////


    public static function usuarioactualizar($id,$login, $pass, $nom, $ced, $fec){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL usuarioactualizar(:id,:login,:pass,:nom,:ced,:fec)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->bindParam(':login', $login, PDO::PARAM_STR,20);
                $sth->bindParam(':pass',$pass, PDO::PARAM_STR,20);
                $sth->bindParam(':nom',$nom , PDO::PARAM_STR,20);
                $sth->bindParam(':ced',$ced, PDO::PARAM_STR,20);
                $sth->bindParam(':fec',$fec, PDO::PARAM_STR,20);
               
               
                $sth->execute();  
                //echo "registro exitoso correctamente";
              }
              catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
                 $estado=false;

              } 
              $bd->cerrar();
              
              $estado=true;
              return $estado;
            }

    

       
  }
    /////////////////////////////////////////////////////////////////////////


/*
  /////////////////////////////////////////////////////////////////////////

    public static function consultarNick($nick){
        $bd = new conexion();
	     	$c  = $bd->conectar();
        $sql1 = "select * from t_usuarios where USU_NICK = :nick";
        $s = $c->prepare($sql1);
        $s->setFetchMode(PDO::FETCH_ASSOC);
        $s-> execute(array("nick" => $nick));
        return $s->rowCount();
    }

    public static function valUsuario($nick, $pass){
        $bd = new Conexion();
        $c = $bd->conectar();
       
        $sql = "SELECT * FROM t_usuarios WHERE USU_NICK = :nick and USU_PASSWORD = :pass";
        $s = $c->prepare($sql);
        $s->setFetchMode(PDO::FETCH_ASSOC);
        $s->execute(array("nick" => $nick, "pass" => sha1($pass)));
        if ($s -> rowcount() > 0){// MAYOR A CERO, USUARIO EXISTE
          $_SESSION = $s->fetch();  // GUARDAR VECTOR EN LA SESSION
        return 1;
        }
          else{
                return 0;
              }
        }

        /*
          ////////////////////////////////////////////////////////////////////////////////

          $sql = "INSERT INTO t_usuarios
          (USU_NOMBRES, USU_APELLIDOS, USU_CORREO, USU_FCH_NAC, USU_TELEFONO, USU_NICK, USU_PASSWORD, USU_ROL, USU_ESTADO)
          VALUES
          (:nombres, :apellidos, :correo, :fch, :tel, :nick, :pass, :rol, :est)";
          $s   = $c->prepare($sql);
          $s->execute(array("nombres"   => $nombre,   "apellidos" => $apellido,
                                "correo"    => $correo,   "fch"       => $fch_nac,
                                "tel"       => $tel,      "nick"      => $nick,
                                "pass"      => sha1($pass),     "rol"       => 1,
                                "est"       => 2));

            */
}
