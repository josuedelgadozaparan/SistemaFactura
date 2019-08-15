<?php

class proveedor_model{
  /////////////////////////////////////////////////////////////////////////
	public function __construct(){}

  //////////////////////////////INSERTAR///////////////////////////////////
	public static function RegistrarProveedor($nom,$dir,$nomcon,$celcont,$nit,$pag){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                $sql='CALL Proveedor_Insertar(:nom,:dir,:nomcon,:celcont,:nit,:pag)';

                $sth=$c->prepare($sql);
                $sth->bindParam(':nom', $nom, PDO::PARAM_STR,20);
                $sth->bindParam(':dir',$dir, PDO::PARAM_STR,20);
                $sth->bindParam(':nomcon',$nomcon , PDO::PARAM_STR,20);
                $sth->bindParam(':celcont',$celcont, PDO::PARAM_STR,20);
                $sth->bindParam(':nit',$nit, PDO::PARAM_STR,20);
                $sth->bindParam(':pag',$pag, PDO::PARAM_STR,20);
               
               
               
                $sth->execute();  
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

   //////////////////////////////CONSULTAR///////////////////////////////////
  public function ConsultarTablaProveedor(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql='CALL Proveedor_Consultar_Tablar()';
      $sth=$c->prepare($sql);
      $sth->execute();  
      $Usuario_Consultar_Tabla=[];
      while($row=$sth->fetch()){
       $IdProveedor =       $row['IdProveedor'];
       $NombreProveedor=       $row['NombreProveedor'];
       $DireccionProveedor=    $row['DireccionProveedor'];
       $NombreContactoProveedor =     $row['NombreContactoProveedor'];
       $CelularContactoProveedor=    $row['CelularContactoProveedor'];
       $NitProveedor=    $row['NitProveedor'];
       $PaginaProveedor=    $row['PaginaProveedor'];
         
       

       $Usuario_Consultar_Tabla[]= array(
                 'IdProveedor'=> $IdProveedor,
                 'NombreProveedor'=> $NombreProveedor, 
                 'DireccionProveedor'=> $DireccionProveedor,
                 'NombreContactoProveedor'=> $NombreContactoProveedor,
                 'CelularContactoProveedor'=> $CelularContactoProveedor,
                 'NitProveedor'=> $NitProveedor,
                 'PaginaProveedor'=> $PaginaProveedor
                
                
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

 public static function ActualizarProveedor($id,$nombre,$dir,$nomcon,$celcont,$nit,$pag){
          $bd = new conexion();
          $c  = $bd->conectar();
          if($c==null){
            echo 'CONEXION NULA';

          }else{
            
       
           try {
           
                
                $sql='CALL Proveedor_Actualizar(:id,
                :nombre,:dir,:nomcon,:celcont,:nit,:pag)';

                $sth=$c->prepare($sql);
                $sth->bindParam(':id', $id, PDO::PARAM_INT);
                $sth->bindParam(':nombre', $nombre, PDO::PARAM_STR,20);
                $sth->bindParam(':dir',$dir, PDO::PARAM_STR,20);
                $sth->bindParam(':nomcon',$nomcon , PDO::PARAM_STR,20);
                $sth->bindParam(':celcont',$celcont, PDO::PARAM_STR,20);
                $sth->bindParam(':nit',$nit, PDO::PARAM_STR,20);
                $sth->bindParam(':pag',$pag, PDO::PARAM_STR,20);
               
               
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

//////////////////////////////ELIMINAR///////////////////////////////////
  public static function EliminarProveedor($id){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
                
                
                $sql='CALL Proveedor_Eliminar(:id)';
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
  public static function ComprobarNit($Nit){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Proveedor_Comprobar_Existe_Nit(:Nit)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':Nit', $Nit, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $NitProveedor =     $row['NitProveedor'];

          $Cliente_Consultar_Documento[]= array(

          'NitProveedor'=> $NitProveedor

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
  public static function ComprobarNitActualizar($NitActual,$Nit){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Proveedor_Comprobar_Existe_Nit_Actualizar(:NitActual,:Nit)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':NitActual', $NitActual, PDO::PARAM_INT);
        $sth->bindParam(':Nit', $Nit, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $NitProveedor =     $row['NitProveedor'];

          $Cliente_Consultar_Documento[]= array(

          'NitProveedor'=> $NitProveedor

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
