<?php

class producto_model{
  
	public function __construct(){}

  //////////////////////////////INSERTAR///////////////////////////////////
	public static function RegistrarProducto($nom,$cod,$can,$sto,$val,$pro,$idtip,$idpro,$idmar,$act){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                $sql='CALL Producto_Insertar(:nom,:cod,:can,:sto,:val,:pro,:idtip,:idpro,:idmar,:act)';

                $sth=$c->prepare($sql);
                $sth->bindParam(':nom', $nom, PDO::PARAM_STR,20);
                $sth->bindParam(':cod',$cod, PDO::PARAM_STR,20);
                $sth->bindParam(':can',$can , PDO::PARAM_STR,20);
                $sth->bindParam(':sto',$sto, PDO::PARAM_STR,20);
                $sth->bindParam(':val',$val, PDO::PARAM_STR,20);
                $sth->bindParam(':pro',$pro, PDO::PARAM_STR,20);
                $sth->bindParam(':idtip',$idtip, PDO::PARAM_STR,20);
                $sth->bindParam(':idpro',$idpro, PDO::PARAM_STR,20);
                $sth->bindParam(':idmar',$idmar, PDO::PARAM_STR,20);
                $sth->bindParam(':act',$act, PDO::PARAM_STR,20);
               
               
                $sth->execute();  
                $estado=true;
               
              }
              catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
              $estado=false;
              } 
              $bd->cerrar();
             
              return $estado;
             

            }

    

       
  }
    /////////////////////////////////////////////////////////////////////////

   //////////////////////////////CONSULTAR///////////////////////////////////
  public function ConsultarTablaProducto(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql='CALL Producto_Consultar_Tablar()';
      $sth=$c->prepare($sql);
      $sth->execute();  
      $Usuario_Consultar_Tabla=[];

      while($row=$sth->fetch()){
       $IdProducto =       $row['IdProducto'];
       $NombreProducto=       $row['NombreProducto'];
       $CodigoProducto=    $row['CodigoProducto'];
       $CantidadProducto =     $row['CantidadProducto'];
       $StockMinimoProducto=    $row['StockMinimoProducto'];
       $ValorProducto=    $row['ValorProducto'];
       $ProveedorProducto=    $row['ProveedorProducto'];
         
       

       $Usuario_Consultar_Tabla[]= array(
                 'IdProducto'=> $IdProducto,
                 'NombreProducto'=> $NombreProducto, 
                 'CodigoProducto'=> $CodigoProducto,
                 'CantidadProducto'=> $CantidadProducto,
                 'StockMinimoProducto'=> $StockMinimoProducto,
                 'ValorProducto'=> $ValorProducto,
                 'ProveedorProducto'=> $ProveedorProducto
                
                
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

/////////////////////////////////////////////////////////////////////////


    public static function ActualizarProducto($id,$nombre,$cod,$can,$val,$pro){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL Producto_Actualizar(:id,:nombre,:cod,:can,:val,:pro)';

                $sth=$c->prepare($sql);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->bindParam(':nombre', $nombre, PDO::PARAM_STR,20);
                $sth->bindParam(':cod',$cod, PDO::PARAM_STR,20);
                $sth->bindParam(':can',$can , PDO::PARAM_STR,20);
                $sth->bindParam(':val',$val, PDO::PARAM_STR,20);
                $sth->bindParam(':pro',$pro, PDO::PARAM_STR,20);
               
               
                $sth->execute();  
                $estado=true;
              }
              catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
                 $estado=false;

              } 
              $bd->cerrar();
              
             
              return $estado;
            }

    

       
  }
    /////////////////////////////////////////////////////////////////////////
  public static function EliminarProducto($id){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL Producto_Eliminar(:id)';
                $sth=$c->prepare($sql);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->execute();  
                //echo "registro exitoso correctamente";
                  $estado=true;
              }
              catch (PDOException $ex) {
                //die("Error occurred:" . $ex->getMessage());
                $estado=false;
              } 
              $bd->cerrar();
              
           
              return $estado;
            }

    

       
  }
   /////////////////////////////////////////////////////////////////////////
 public static function ComprobarCodigo($cod){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Producto_Comprobar_Existe_Codigo(:cod)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':cod', $cod, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $CodigoProducto =     $row['CodigoProducto'];

          $Cliente_Consultar_Documento[]= array(

          'CodigoProducto'=> $CodigoProducto

         );
          $estado=true;
        }
        if($estado==true){
          
          $json_cli = json_encode(   $Cliente_Consultar_Documento);
          return  $json_cli;
        }
    
    
     
        }
        catch (PDOException $ex) {
       

      } 

    }

  }

  ///////////////////////////////////////////////////////////////
  public static function ComprobarCodigoActualizar($CodActual,$cod){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Producto_Comprobar_Codigo_Actualizar(:CodActual,:cod)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':CodActual', $CodActual, PDO::PARAM_INT);
        $sth->bindParam(':cod', $cod, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $CodigoProducto =     $row['CodigoProducto'];

          $Cliente_Consultar_Documento[]= array(

          'CodigoProducto'=> $CodigoProducto

         );
          $estado=true;
        }
        if($estado==true){
          
          $json_cli = json_encode(   $Cliente_Consultar_Documento);
          return  $json_cli;
        }
    
    
     
        }
        catch (PDOException $ex) {
       

      } 

    }

  }
  //////////////////////////////////////////////////////////


















}
