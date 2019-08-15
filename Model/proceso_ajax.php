<?php
    require_once 'Conexion.php';

    class proceso_ajax{
       

        public function ConsultaAjax(){


          if($_GET['valorCaja1']=='1'){
            $bd = new conexion();
            $c  = $bd->conectar();
            if($c==null){
              echo 'CONEXION NULA';

            }else{
      
               try {
     
                      $Cod=$_GET['valorCaja'];
                      $sql='CALL Producto_Consultar_Por_Codigo(:Cod)';
                      $sth=$c->prepare($sql);
                      $sth->bindParam(':Cod', $Cod, PDO::PARAM_STR,20);
                      $sth->execute();  
                      while($row=$sth->fetch()){

                            $IdProducto=$row['IdProducto'];
                            $NombreProducto=$row['NombreProducto'];
                            $CantidadProducto=$row['CantidadProducto'];
                            $ValorProducto=$row['ValorProducto'];             

                            $arrayp  = 
                            array(
                              'IdProducto'            => $IdProducto, 
                              'NombreProducto'        => $NombreProducto, 
                              'CantidadProducto'         => $CantidadProducto,
                              'ValorProducto'         => $ValorProducto

                              );

                     }
    
     $json_usuario = json_encode($arrayp);
     return $json_usuario;
   }
   catch (PDOException $ex) {
    die("Error occurred:" . $ex->getMessage());

  } }

  }


  else  if($_GET['valorCaja2']=='2'){


            $bd = new conexion();
            $c  = $bd->conectar();
            if($c==null){
              echo 'CONEXION NULA';

            }else{
      
               try {
     
                      $Doc=$_GET['valorCaja3'];
                      $sql='CALL Cliente_Consultar_Por_Documento(:Doc)';
                      $sth=$c->prepare($sql);
                      $sth->bindParam(':Doc', $Doc, PDO::PARAM_STR,20);
                      $sth->execute();  
                      while($row=$sth->fetch()){

                             $IdCliente=$row['IdCliente'];
                             $NombreCliente=$row['NombreCliente'];
                             $ApellidoCliente=$row['ApellidoCliente'];


                             $arraycli  = 
                             array(

                             'IdCliente'            => $IdCliente, 
                             'NombreCliente'        => $NombreCliente,
                             'ApellidoCliente'        => $ApellidoCliente

                              );

                     }
    
       $json_clie = json_encode($arraycli);
       return $json_clie;
   }
   catch (PDOException $ex) {
    die("Error occurred:" . $ex->getMessage());

  } }

  }









    }
    }// Fin de la clase ProcesoFactura
    $dato = new proceso_ajax();
    echo $dato->ConsultaAjax();
    exit;
 ?>