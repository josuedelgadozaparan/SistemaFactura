<?php

class usuario_model{
  /////////////////////////////////////////////////////////////////////////
	public function __construct(){}

  //////////////////////////////INSERTAR///////////////////////////////////
	public static function RegistrarUsuario($login, $pass, $nom, $ape, $doc, $dir, $ema, $cel, $idocu, $idperf){
		$bd = new conexion();
		$c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
           
                
                $sql='CALL Usuario_Insertar(:login,:pass,:nom,:ape,:doc,:dir,:ema,:cel,:idocu,:idperf)';

                $sth=$c->prepare($sql);
                $sth->bindParam(':login', $login, PDO::PARAM_STR,20);
                $sth->bindParam(':pass',$pass, PDO::PARAM_STR,20);
                $sth->bindParam(':nom',$nom , PDO::PARAM_STR,20);
                $sth->bindParam(':ape',$ape, PDO::PARAM_STR,20);
                $sth->bindParam(':doc',$doc, PDO::PARAM_STR,20);
                $sth->bindParam(':dir',$dir, PDO::PARAM_STR,20);
                $sth->bindParam(':ema',$ema, PDO::PARAM_STR,20);
                $sth->bindParam(':cel',$cel, PDO::PARAM_STR,20);
                $sth->bindParam(':idocu',$idocu, PDO::PARAM_STR,20);
                $sth->bindParam(':idperf',$idperf, PDO::PARAM_STR,20);
               
               
               
                $sth->execute();  
                //echo "registro exitoso correctamente";
                $estado=true;

              }
              catch (PDOException $ex) {
               // die("Error occurred:" . $ex->getMessage());
              $estado=false;
              } 
              $bd->cerrar();
             
              return $estado;
             

            }

    

       
	}
    /////////////////////////////////////////////////////////////////////////

   //////////////////////////////CONSULTAR///////////////////////////////////
  public function consusuario(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql='CALL Usuario_Consultar_Tabla()';

      $sth=$c->prepare($sql);
      $sth->execute(); 
      $Usuario_Consultar_Tabla=[];

      while($row=$sth->fetch()){
       $IdUsuario =       $row['IdUsuario'];
       $LoginUsuario=       $row['LoginUsuario'];
       $PasswordUsuario=    $row['PasswordUsuario'];
       $NombreUsuario =     $row['NombreUsuario'];
       $ApellidoUsuario=    $row['ApellidoUsuario'];
       $DocumentoUsuario=    $row['DocumentoUsuario'];
       $EmailUsuario=    $row['EmailUsuario'];
       $IdPerfil=    $row['IdPerfil'];      
       

       $Usuario_Consultar_Tabla[]= array(
                 'IdUsuario'=> $IdUsuario,
                 'LoginUsuario'=> $LoginUsuario, 
                 'PasswordUsuario'=> $PasswordUsuario,
                 'NombreUsuario'=> $NombreUsuario,
                 'ApellidoUsuario'=> $ApellidoUsuario,
                 'DocumentoUsuario'=> $DocumentoUsuario,
                 'EmailUsuario'=> $EmailUsuario,
                 'IdPerfil'=> $IdPerfil
                
                 )  ;
                


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
           
                
                $sql='CALL Usuario_Eliminar(:id)';
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


    public static function usuarioactualizar($id,$login, $pass, $nom, $ape, $doc,$ema,$idp){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
      
       
           try {
         
              
              $sql='CALL Usuario_Actualizar(:id,:login,:pass,:nom,:ape,:doc,:ema,:idp)';
              $sth=$c->prepare($sql);
              $sth->bindParam(':id', $id, PDO::PARAM_INT);
              $sth->bindParam(':login', $login, PDO::PARAM_STR,20);
              $sth->bindParam(':pass',$pass, PDO::PARAM_STR,20);
              $sth->bindParam(':nom',$nom , PDO::PARAM_STR,20);
              $sth->bindParam(':ape',$ape, PDO::PARAM_STR,20);
              $sth->bindParam(':doc',$doc, PDO::PARAM_STR,20);
              $sth->bindParam(':ema',$ema, PDO::PARAM_STR,20);
              $sth->bindParam(':idp',$idp, PDO::PARAM_STR,20);
             
             
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
  public static function ComprobarUsuario($doc){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Usuario_Comprobar_Existe_Documento(:doc)';
        $sth=$c->prepare($sql);
        $sth->bindParam(':doc', $doc, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $DocumentoUsuario =     $row['DocumentoUsuario'];

          $Usuario_Consultar_Documento[]= array(

          'DocumentoUsuario'=> $DocumentoUsuario

         );
          $estado=true;
        }
        if($estado==true){
          
          $json_usu = json_encode($Usuario_Consultar_Documento);
          return $json_usu;
        }
    
    
     
        }
        catch (PDOException $ex) {
       

      } 

    }

  }


  public static function ComprobarLogin($log){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Usuario_Comprobar_Existe_Login(:log)';
        $sth=$c->prepare($sql);
        $sth->bindParam(':log', $log, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $LoginUsuario =     $row['LoginUsuario'];

          $Usuario_Consultar_Login[]= array(

          'LoginUsuario'=> $LoginUsuario

         );
          $estado=true;
        }
        if($estado==true){
          
          $json_usu = json_encode(  $Usuario_Consultar_Login);
          return $json_usu;
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
     
          
        $sql='CALL Usuario_Comprobar_Existe_Documento_Actualizar(:DocActual,:doc)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':DocActual', $DocActual, PDO::PARAM_INT);
        $sth->bindParam(':doc', $doc, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $DocumentoUsuario =     $row['DocumentoUsuario'];

          $Cliente_Consultar_Documento[]= array(

          'DocumentoUsuario'=> $DocumentoUsuario

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
  /////////////////////////////////////////////////////////////////////////
 public static function ComprobarLoginActualizar($LogActual,$log){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

 
     try {
     
          
        $sql='CALL Usuario_Comprobar_Existe_Login_Actualizar(:LogActual,:log)';  
        $sth=$c->prepare($sql);
        $sth->bindParam(':LogActual', $LogActual, PDO::PARAM_INT);
        $sth->bindParam(':log', $log, PDO::PARAM_INT);
        $sth->execute();  
        $estado=false;
        while($row=$sth->fetch()){

          $LoginUsuario =     $row['LoginUsuario'];

          $Cliente_Consultar_Documento[]= array(

          'LoginUsuario'=> $LoginUsuario

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
  


}
