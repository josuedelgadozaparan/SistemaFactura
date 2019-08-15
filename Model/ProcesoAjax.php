<?php
require_once 'Conexion.php';

class ProcesoAjax{

  private  $mySQLI; 
  private  $host="localhost";
  private  $user="root";
  private  $pass="";
  private  $db="sistema";
        //__________________________GET Y SET________________________________________

  public function getHost() {
    return $this->host;
  }

  public function getUser() {
    return $this->user;
  }

  public function getPass() {
    return $this->pass;
  }

  public function getDb() {
    return $this->db;
  }

  public function setHost($host) {
    $this->host = $host;
  }

  public function setUser($user) {
    $this->user = $user;
  }

  public function setPass($pass) {
    $this->pass = $pass;
  }

  public function setDb($db) {
    $this->db = $db;
  }

//_________________________________________________________________________________


 //__________________________ABRIR CONEXION________________________________________
  public function abrir(){
   $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);
   if(mysqli_connect_error())
   {
    echo "conexion mala";
    return 0;
  }
  else
  {

    return 1;
  }
}
//__________________________________________________________________________________


//_______________________________CERRAR CONEXION___________________________________
public function cerrar(){
  $this->mySQLI->close(); 
}


var $id;



public function ConsultarProducto() 
{
    if($_GET['valorCaja2']=='1'){///////////CONSULTA DE LA TABLA PRODUCTOS.. ES LLAMADA  DEL MODULO FACTURA
      $co=$_GET['valorCaja1'];
      $this->cod=$co; 

      $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);
      $query = "CALL Producto_Consultar_Por_Codigo('".$this->cod."')";

      if ($result = mysqli_query($this->mySQLI, $query)) 
      {
        $row_cnt=$result->num_rows;
        if($row_cnt==0)
        {
          echo json_encode(["Error" => "alert('Este codigo no se encuentra registrado')"]); 
          return;
        }
        else
        {
         while($row = mysqli_fetch_array($result)) 
         { 

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
        echo json_encode($arrayp); 
        return;  
      }
    }
    else 
    {
      echo json_encode(["Error: " => mysqli_error($this->mySQLI)]);  
      return;    
    }
    echo json_encode(["Error: " => "error"]);
    return;

  }



  else if($_GET['valorCaja2']=='2'){///////////CONSULTA DE LA TABLA CLIENTES.. ES LLAMADA  DEL MODULO FACTURA
      $co=$_GET['valorCaja1'];
      $this->doc=$co; 

      $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);
      $query = "CALL Cliente_Consultar_Por_Documento('".$this->doc."')";


      if ($result = mysqli_query($this->mySQLI, $query)) 
      {
        $row_cnt=$result->num_rows;
        if($row_cnt==0)
        {
          echo json_encode(["Error" => "alert('Este cliente no se encuentra registrado')"]); 
          return;
        }
        else
        {
         while($row = mysqli_fetch_array($result)) 
         { 

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
        echo json_encode($arraycli); 
        return;  
      }
    }
    else 
    {
      echo json_encode(["Error: " => mysqli_error($this->mySQLI)]);  
      return;    
    }
    echo json_encode(["Error: " => "error"]);
    return;
  }




else if($_GET['valorCaja2']=='A'){///////////IINSERTA LAA TABLA FACTURA
  session_start();
  $this->numerodefactura_=$_GET['valorCaja4'];
  $this->cantidadtotal_=$_GET['valorCaja5'];
  $this->valortotal_=$_GET['valorCaja6'];     
  $this->recibido_=$_GET['valorCaja7'];
  $this->idcliente_=$_GET['valorCaja8'];    
  $this->idusuario_=$_GET['valorCaja9'];                               






  try {
    $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);

    $query = "CALL Factura_Insertar('".$this->numerodefactura_."','".$this->cantidadtotal_."','".$this->valortotal_."','".$this->recibido_."','".$this->idcliente_."','".$this->idusuario_."')";
    if (mysqli_query($this->mySQLI, $query))   {
      echo "<script>";
      echo  "alert('usuario registrado correctamente')";
      echo "</script>";
      echo ("<script> location.href='FormularioUsuario.php' </script>");
    }
    else 
    {
     echo "Error: ". mysqli_error($this->mySQLI);
   }

 } catch (Exception $e) {
  echo $e->getMessage();
}
  




}//fin del if 9


else if($_GET['valorCaja2']=='B'){///////////BUSCRA EL ID
   

      $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);
      $query = "CALL Factura_Consular_Ultimo_Id()";


      if ($result = mysqli_query($this->mySQLI, $query)) 
      {
        $row_cnt=$result->num_rows;
        if($row_cnt==0)
        {
          echo json_encode(["Error" => "alert('Este cliente no se encuentra registrado')"]); 
          return;
        }
        else
        {
         while($row = mysqli_fetch_array($result)) 
         { 

          $Id=$row['Id'];
        


            $idfact  = 
          array(

            'Id'            => $Id


          );

        }
         echo json_encode($idfact); 
        return;  
      }
    }
    else 
    {
      echo json_encode(["Error: " => mysqli_error($this->mySQLI)]);  
      return;    
    }
    echo json_encode(["Error: " => "error"]);
    return;

}//fin del if B

 

else if($_GET['valorCaja2']=='C'){///////////BUSCRA EL ID

 $this->idfactura_=$_GET['valorCaja3'];
 $this->idproducto_=$_GET['valorCaja4'];
 $this->cantidad_=$_GET['valorCaja5'];
 $this->subtotal_=$_GET['valorCaja6'];


 $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);
 try {
    $query = "CALL DetalleFactura_Insertar('". $this->idfactura_."','".$this->idproducto_."','".$this->cantidad_."','".$this->subtotal_."')";

    if (mysqli_query($this->mySQLI, $query))   {
      echo "<script>";
      echo  "alert('usuario registrado correctamente')";
      echo "</script>";
      echo ("<script> location.href='FormularioUsuario.php' </script>");
    }
    else 
    {
     echo "Error: ". mysqli_error($this->mySQLI);
   }

 } catch (Exception $e) {
  echo $e->getMessage();
}


}//fin del if B

else if($_GET['valorCaja2']=='D'){///////////BUSCRA EL ID
   

      $this->mySQLI= new mysqli($this->host,$this->user,$this->pass,$this->db);
       $query = "CALL Factura_Consular_Ultimo_Id_Mas_Cero();";


      if ($result = mysqli_query($this->mySQLI, $query)) 
      {
        $row_cnt=$result->num_rows;
        if($row_cnt==0)
        {
          echo json_encode(["Error" => "alert('Este cliente no se encuentra registrado')"]); 
          return;
        }
        else
        {
         while($row = mysqli_fetch_array($result)) 
         { 

          $Num=$row['Num'];
        


            $NumeroFact  = 
          array(

            'Num'            => $Num


          );

        }
         echo json_encode($NumeroFact); 
        return;  
      }
    }
    else 
    {
      echo json_encode(["Error: " => mysqli_error($this->mySQLI)]);  
      return;    
    }
    echo json_encode(["Error: " => "error"]);
    return;

}//fin del if B






}

    }// Fin de la clase ProcesoFactura
    $dato = new ProcesoAjax();
    return $dato->ConsultarProducto();
    exit;

    ?>