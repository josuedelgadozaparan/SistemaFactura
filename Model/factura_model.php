<?php

class factura_model{
  
  
	public function __construct(){}


   //////////////////////////////CONSULTAR///////////////////////////////////
  public function ConsultarConsecutivoFactura(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
     
     
      $query = "SELECT MAX(NumeroFactura+1) as Numero from factura";
      $sth=$c->prepare($query);
     // $sth->bindParam(':tipo', $tipo, PDO::PARAM_STR,1);
      $sth->execute();  
     while($row=$sth->fetch()) 
         { 

          $_SESSION["Numero"]=$row['Numero'];

           $Numero=$row['Numero'];
           


            $idfact  = 
          array(

            'Numero'            => $Numero


          );

        }

       
    // echo $Usuario_Consultar_Tabla['LoginUsuario'];
     $json_factura = json_encode($idfact);
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
