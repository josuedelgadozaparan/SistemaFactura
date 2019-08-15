<?php
global $estado;
?>
<div class="container">
		<div class="panel panel-primary sombra">
			<div class="panel-heading">
				<center><h3 class="panel-title TituloPanel"><b><span class="icon-news"></span> Gestion de reportes</b></h3></center>
			</div>
			<div class= "panel-body">
				<form class="form-horizontal" action="#" role="form" method="POST">

						<div class="row">
							

								<div class="col-xl-4 col-lg-4 ">
									<br>

									<label >Buscar por consecutivo</label>
									<input type="text" required="" class="form-control input-sm fod" maxlength="50" placeholder="Digite consecutivo..." name="consecutivo" />
									<br>
									<button type="submit"    class="btn btn-primary fond" name="BtnRegistrar" ><span class="icon icon-magnifying-glass"></span>  Buscar </button>
									<a href="?controlador=reporte&accion=ReporteExcelFacturas" class="btn btn-success fond butt" id="btn"><span class="icon-news"></span> Exportar pdf</a>

							        <a href="?controlador=login&accion=RedireccionaPrincipal" class="btn btn-danger fond">Regresar <span class="icon icon-reply-all"></span></a>

								</div>
								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">


									
								</div>
								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">
									<center>
									<img src="<?php echo $URL."/Resource/img/reporte_opt.png";?>" class="img-responsive">
								    </center>

									
								</div>



						</div>


				</form>
				<div class="row">

					
					<div class= "col-md-12">

                            

                            

							
						<div class="table-responsive " id="tablauser">
							<table class="table table-succee  table-hover table-bordered" id="TablaDinamicaLoad">								
								  <?php informe_controlador::llenarTablaInforme();?>
							   
								</table>
						    </div>


					   </div>




					</div>
					

					<div class="row">

					
					<div class= "col-md-12">

                            
								<?php 

								  if ( isset($_POST['BtnRegistrar'] ) )
									{ 
										?>
								   
									<a href="?controlador=reporte&accion=ReporteExcelFacturas" class="btn btn-success fod butt" id="btn"><span class="icon-news"></span> Exportar pdf</a>
							
									<br><br>

									<div class="table-responsive " id="tablauser">
									<table class="table table-succee  table-hover table-bordered fod" id="TablaDinamicaLoad">		
									<thead>
					                <tr class="info"><th class="text-center">Numero factura</th><th class="text-center">Producto</th><th class="text-center">Cantidad</th><th class="text-center">Subtotal</th><th class="text-center">Cliente</th><th class="text-center">Documento</th></tr>
					</thead>						
								  
								  <?php 

								  
										informe_controlador::llenarTablaDetalleFactura();

									
									?>
									    
									
								</table>
						    </div>
							<?php

						    		}

								  ?>
							   


					   </div>



					   
					</div>
					
					
						

			</div>

		</div>

		

</div>


<br><br>
<br><br><br><br><br><br><br>
</body>
</html>









