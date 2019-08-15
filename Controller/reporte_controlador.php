<?php
require_once 'report/pdf/fpdf.php';  
class reporte_controlador extends FPDF{


public function ReporteExcelFacturas(){
	
	$json=reporte_model::ConsultarReporteFacturas();
	$json_tabla = json_decode($json);


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
          $pdf->Cell(0,5,"REPORTE DE FACTURA DE VENTA",0,1,'C');


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
						
						
				for($i=0;$i<count($json_tabla);$i++){ 

					

					$pdf->Cell(20,6,$json_tabla[$i]->NumeroFactura,1,0,'C');
					$pdf->Cell(20,6,$json_tabla[$i]->CantidadTotal,1,0,'C');
		            $pdf->Cell(20,6,$json_tabla[$i]->TotalFactura,1,0,'C');
		            $pdf->Cell(20,6,$json_tabla[$i]->RecibidoFactura,1,0,'C');
		            $pdf->Cell(28,6,$json_tabla[$i]->NombreCliente,1,0,'C');
		            $pdf->Cell(22,6,$json_tabla[$i]->DocumentoCliente,1,0,'C');
		            $pdf->Cell(20,6,$json_tabla[$i]->NombreUsuario,1,0,'C');
		            $pdf->Cell(38,6,$json_tabla[$i]->FechaFacturaVenta,1,0,'C');
		           
					 $pdf->Ln(); 


				   
				}

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

public function ReporteExcelDetaFacturas(){
  
  $json=informe_model::ConsultarDetalleFactura($_POST['consecutivo']);
  $json_tabla = json_decode($json);


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
          $pdf->Cell(0,5,"REPORTE DE FACTURA DE VENTA",0,1,'C');


          $pdf->SetFont('Arial','B',10);
          $pdf->SetFillColor(232,232,232);
          $pdf->Cell(0,5,"",0,1,'C');
          $pdf->Cell(0,5,"Fecha: ".date("d-m-Y H:i") ,0,1,'A');
          $pdf->Cell(0,5,"",0,1,'C');
         
          $pdf->Cell(20,6,'Numero',1,0,'C',1);
          $pdf->Cell(20,6,'Producto',1,0,'C',1);
          $pdf->Cell(20,6,'Cantidad',1,0,'C',1);
          $pdf->Cell(20,6,'Subtotal',1,0,'C',1);
          $pdf->Cell(28,6,'Cliente',1,0,'C',1);
          $pdf->Cell(22,6,'Documento',1,0,'C',1);
         
          $pdf->Ln();

          $pdf->SetFont('Arial','',10);
          $pdf->SetFillColor(232,232,232);
            
            
        for($i=0;$i<count($json_tabla);$i++){ 

          

          $pdf->Cell(20,6,$json_tabla[$i]->NumeroFactura,1,0,'C');
          $pdf->Cell(20,6,$json_tabla[$i]->NombreProducto,1,0,'C');
                $pdf->Cell(20,6,$json_tabla[$i]->Cantidad,1,0,'C');
                $pdf->Cell(20,6,$json_tabla[$i]->ValorProducto,1,0,'C');
                $pdf->Cell(28,6,$json_tabla[$i]->NombreCliente,1,0,'C');
                $pdf->Cell(22,6,$json_tabla[$i]->DocumentoCliente,1,0,'C');
              
               
           $pdf->Ln(); 


           
        }

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

	

	public function ReporteDetalleFactura(){
		    reporte_model::ReporteDetalleFactura();
	}




	
	}


?>

  <script>
    $(document).ready(function(){
        $("btn").click(function(){

            swal({
              title: "Are you sure?",
              text: "Your will not be able to recover this imaginary file!",
              type: "warning",
              showCancelButton: true,
              confirmButtonClass: "btn-danger",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: false
            },
            function(){
              swal("Deleted!", "Your imaginary file has been deleted.", "success");
            });


        });
    });
    </script>