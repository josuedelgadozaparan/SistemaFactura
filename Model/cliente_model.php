<?php

class cliente_model{
  /////////////////////////////////////////////////////////////////////////
	public function __construct(){}

  //////////////////////////////INSERTAR///////////////////////////////////
	public static function RegistrarCliente($nom, $ape, $Idtp, $doc, $dir, $bar, $tel, $ema, $tpcli, $numcop, $idusu){
		$bd = new conexion();
		$c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                $sql='CALL Cliente_Insertar(
                :nom,:ape,:Idtp,:doc,:dir,:bar,:tel,:ema,:tpcli,:numcop,:idusu
                 )';

                $sth=$c->prepare($sql);
                $sth->bindParam(':nom', $nom, PDO::PARAM_STR,20);
                $sth->bindParam(':ape',$ape, PDO::PARAM_STR,20);
                $sth->bindParam(':Idtp',$Idtp , PDO::PARAM_STR,20);
                $sth->bindParam(':doc',$doc, PDO::PARAM_STR,20);
                $sth->bindParam(':dir',$dir, PDO::PARAM_STR,20);
                $sth->bindParam(':bar',$bar, PDO::PARAM_STR,20);
                $sth->bindParam(':tel',$tel, PDO::PARAM_STR,20);
                $sth->bindParam(':ema',$ema, PDO::PARAM_STR,20);
                $sth->bindParam(':tpcli',$tpcli, PDO::PARAM_STR,20);
                $sth->bindParam(':numcop',$numcop, PDO::PARAM_STR,20);
                $sth->bindParam(':idusu',$idusu, PDO::PARAM_STR,20);
               
               
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

   //////////////////////////////CONSULTAR///////////////////////////////////
  public function ConsultarTablaCliente(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql='CALL Cliente_Consultar_Tabla()';
      $sth=$c->prepare($sql);
     // $sth->bindParam(':tipo', $tipo, PDO::PARAM_STR,1);
      $sth->execute();  
      
      $Usuario_Consultar_Tabla=[];

      while($row=$sth->fetch()){
       $IdCliente =       $row['IdCliente'];
       $NombreCliente=       $row['NombreCliente'];
       $DocumentoCliente=    $row['DocumentoCliente'];
       $DireccionCliente =     $row['DireccionCliente'];
       $BarrioCliente=    $row['BarrioCliente'];
       $TelefonoCliente=    $row['TelefonoCliente'];
       $EmailCliente=    $row['EmailCliente'];
       $NumeroCompraCliente=    $row['NumeroCompraCliente'];
          
       

       $Usuario_Consultar_Tabla[]= array(
                 'IdCliente'=> $IdCliente,
                 'NombreCliente'=> $NombreCliente, 
                 'DocumentoCliente'=> $DocumentoCliente,
                 'DireccionCliente'=> $DireccionCliente,
                 'BarrioCliente'=> $BarrioCliente,
                 'TelefonoCliente'=> $TelefonoCliente,
                 'EmailCliente'=> $EmailCliente,
                 'NumeroCompraCliente'=> $NumeroCompraCliente
               
                
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

///////////////////////////////////////////////////////////////////////


//////////////////////////////ELIMINAR///////////////////////////////////
  public static function EliminarCliente($id){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL Cliente_Eliminar(:id)';
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


    public static function ActualizarCliente($idcli,$nom,$doc,$dir,$bar,$tel){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL Cliente_Actualizar(:idcli,:nom,:doc,:dir,:bar,:tel)';

                $sth=$c->prepare($sql);
                $sth->bindParam(':idcli', $idcli, PDO::PARAM_INT);
                $sth->bindParam(':nom', $nom, PDO::PARAM_STR,20);
                $sth->bindParam(':doc',$doc, PDO::PARAM_STR,20);
                $sth->bindParam(':dir',$dir , PDO::PARAM_STR,20);
                $sth->bindParam(':bar',$bar, PDO::PARAM_STR,20);
                $sth->bindParam(':tel',$tel, PDO::PARAM_STR,20);
               
               
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
 public static function ComprobarDocumento($doc){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Cliente_Comprobar_Existe_Documento(:doc)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':doc', $doc, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $DocumentoCliente =     $row['DocumentoCliente'];

          $Cliente_Consultar_Documento[]= array(

          'DocumentoCliente'=> $DocumentoCliente

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



     /////////////////////////////////////////////////////////////////////////
 public static function ComprobarDocumentoActualizar($DocActual,$doc){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Cliente_Comprobar_Existe_Documento_Actualizar(:DocActual,:doc)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':DocActual', $DocActual, PDO::PARAM_INT);
        $sth->bindParam(':doc', $doc, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $DocumentoCliente =     $row['DocumentoCliente'];

          $Cliente_Consultar_Documento[]= array(

          'DocumentoCliente'=> $DocumentoCliente

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
