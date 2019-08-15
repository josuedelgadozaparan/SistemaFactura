<?php

class reporte_model{
  /////////////////////////////////////////////////////////////////////////
	public function __construct(){}

  public function ConsultarReporteFacturas(){
    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{

    }
    
    try {
      $usuario =  array();     
     
      $sql='SELECT f.NumeroFactura,f.CantidadTotal,f.TotalFactura,f.RecibidoFactura,c.NombreCliente,c.DocumentoCliente, u.NombreUsuario,f.FechaFacturaVenta from factura f INNER JOIN cliente c on f.IdCliente=c.IdCliente INNER JOIN usuario u on f.IdUsuario=u.IdUsuario';
      $sth=$c->prepare($sql);
     // $sth->bindParam(':tipo', $tipo, PDO::PARAM_STR,1);
      $sth->execute();  
      while($row=$sth->fetch()){
       $NumeroFactura =       $row['NumeroFactura'];
       $CantidadTotal=       $row['CantidadTotal'];
       $TotalFactura=    $row['TotalFactura'];
       $RecibidoFactura=    $row['RecibidoFactura'];
       $NombreCliente =     $row['NombreCliente'];
       $DocumentoCliente=    $row['DocumentoCliente'];
       $NombreUsuario=    $row['NombreUsuario'];
       $FechaFacturaVenta=    $row['FechaFacturaVenta'];
      
       

       $Usuario_Consultar_Tabla[]= array(
                 'NumeroFactura'=> $NumeroFactura,
                 'CantidadTotal'=> $CantidadTotal, 
                 'TotalFactura'=> $TotalFactura,
                 'RecibidoFactura'=> $RecibidoFactura,
                 'NombreCliente'=> $NombreCliente,
                 'DocumentoCliente'=> $DocumentoCliente,
                 'NombreUsuario'=> $NombreUsuario,              
                 'FechaFacturaVenta'=> $FechaFacturaVenta
                
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




  //////////////////////////////Consultar Factura///////////////////////////////////
	

    public static function ReporteDetalleFactura(){

    $bd = new conexion();
    $c  = $bd->conectar();
    if($c==null){
      echo 'CONEXION NULA';

    }else{
        try {
          $pdf = new FPDF();

          $pdf->AliasNbPages();
          $pdf->AddPage();

          $pdf->SetFillColor(232,232,232);
          $pdf->SetFont('Arial','B',17);
          $pdf->SetFillColor(232,232,232);         
          $pdf->Cell(0,6,"SistemFacture",0,1,'L',true);         
          $pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');

          $pdf->SetFont('Arial','B',15);
          $pdf->SetFillColor(232,232,232);
          $pdf->Cell(0,5,"REPORTE DETALLE FACTURA DE VENTA",0,1,'C');


          $pdf->SetFont('Arial','B',10);
          $pdf->SetFillColor(232,232,232);
          $pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"Fecha: ".date("d-m-Y H:i") ,0,1,'A');
          $pdf->Cell(0,5,"",0,1,'C');
         
          $pdf->Cell(20,6,'Numero',1,0,'C',1);
          $pdf->Cell(20,6,'Cantidad',1,0,'C',1);
          $pdf->Cell(20,6,'Total',1,0,'C',1);
          $pdf->Cell(20,6,'Recibido',1,0,'C',1);
          $pdf->Cell(28,6,'Cliente',1,0,'C',1);
          $pdf->Cell(22,6,'Documento',1,0,'C',1);
          $pdf->Cell(20,6,'Vendedor',1,0,'C',1);
          $pdf->Cell(38,6,'Fecha  -   Hora',1,0,'C',1);
          $pdf->Ln();

          $pdf->SetFont('Arial','',10);
          $pdf->SetFillColor(232,232,232);
          //////////////////////
            $sql='SELECT f.NumeroFactura,f.CantidadTotal,f.TotalFactura,f.RecibidoFactura,c.NombreCliente,c.DocumentoCliente, u.NombreUsuario,f.FechaFacturaVenta from factura f INNER JOIN cliente c on f.IdCliente=c.IdCliente INNER JOIN usuario u on f.IdUsuario=u.IdUsuario';
            $sth=$c->prepare($sql);
            $sth->execute();  
              while($row=$sth->fetch()){
              $pdf->Cell(20,6,$row['NumeroFactura'],1,0,'C');
              $pdf->Cell(20,6,$row['CantidadTotal'],1,0,'C');
              $pdf->Cell(20,6,$row['TotalFactura'],1,0,'C');
              $pdf->Cell(20,6,$row['RecibidoFactura'],1,0,'C');
              $pdf->Cell(28,6,$row['NombreCliente'],1,0,'C');
              $pdf->Cell(22,6,$row['DocumentoCliente'],1,0,'C');
              $pdf->Cell(20,6,$row['NombreUsuario'],1,0,'C');
              $pdf->Cell(38,6,$row['FechaFacturaVenta'],1,0,'C');
              $pdf->Ln(); 

              }

          /////////////////////
          $pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"Generado por: Josue Delgado Zaparan.",0,1,'A');


          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"",0,1,'C');$pdf->Cell(0,5,"",0,1,'C');
         
        
           $pdf->SetFont('Arial','B',10);
          $pdf->SetFillColor(232,232,232);
         
           $pdf->Cell(0,5,"__________________________________                                                      __________________________________",0,1,'A');
          $pdf->Cell(0,5,"      Gerente: Josue Delgado. Zaparan                                                           Administrador: Juan de la Rosa Castro.",0,1,'A');





          $pdf->Ln();
          ob_end_clean();
          $pdf->Output();

        }
         catch (PDOException $ex) {
                die("Error occurred:" . $ex->getMessage());
             
              } 
        }
    }
















}