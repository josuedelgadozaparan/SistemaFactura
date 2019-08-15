<div class="container">
	<div class="panel panel-primary sombra">

			<div class="panel-heading">
				<center><h3 class="panel-title TituloPanel"><span class="icon-news"></span> <b>Gestión de  Facturas</b></h3></center>
			</div>

			
			

			<div class= "panel-body">

				
				<form class="form-horizontal" role="form" method="POST" name="f1">

					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						
						<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-6">
							<label >Cantidad</label>
							<input type="number" placeholder="Cantidad " required="" class="form-control input-sm SombFact" maxlength="50"  name="txtCantidad" id="txtCantidad"  value="1" />
							<input type="txt" placeholder="" required="" class="form-control input-sm" maxlength="50"  name="IdUsuario" id="IdUsuario" style="display:none;"   value="<?php echo   $_SESSION["IdUsuario"];?>" />
							<label l>Código</label>

							<input type="text" required="" placeholder="Código" class="form-control input-sm SombFact" maxlength="50"  name="txtCodigo" id="txtCodigo"/>
							
							<label >Nombre producto</label>
							<input type="text" required="" placeholder="Producto" class="form-control input-sm" maxlength="50"  name="txtNombre"  id="txtNombre" readonly="readonly"/>
						
										
							</div>

							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-6">


								<label >Total</label>
								<input type="text" required="" placeholder="Total factura" class="form-control input-sm" maxlength="50"  name="txtTotal" id="txtTotal" readonly="readonly"/>
								<label>Documento</label>
								<input type="text" required="" placeholder="Documento" class="form-control input-sm SombFact" maxlength="50"  name="txtDocumento"  id="txtDocumento"/>
								
								<label >Nombre Cliente</label>
								<input type="text" required="" placeholder="Nombre" class="form-control input-sm" maxlength="50"  name="txtNombreCliente" id="txtNombreCliente" readonly="readonly" />
								
							
							</div>


							<div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-6">
								<label >Subtotal</label>
								<input type="text" required="" placeholder="Subtotal" class="form-control input-sm" maxlength="50"  name="txtSubtotal" id="txtSubtotal" readonly="readonly"/>
								<label >Total articulo</label>
								<input type="text" required="" placeholder="Cantidad" class="form-control input-sm" maxlength="50"  name="txtTotalAr" id="txtTotalAr" readonly="readonly"/>
								<label >Recibido</label>
								<input type="text" required=""  placeholder="Valor" class="form-control input-sm SombFact" maxlength="50"  name="txtRecibido" onkeypress="return valida(event)" id="txtRecibido" />			
								
								<input type="text" style="display:none;"  id="idcliente" class="form-control" maxlength="20"  name="idcliente"  onkeypress="return valida(event)"  >
								<input type="text" style="display:none;"  id="idproducto" class="form-control" maxlength="20"  name="idproducto"  onkeypress="return valida(event)"  >
								<input type="text" style="display:none;"  id="idfactura" class="form-control" maxlength="20"  name="idfactura">

								

							</div>

							   <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-6">
							   	<label >Valor</label>
							    <input type="text" required="" placeholder="Valor producto" class="form-control input-sm" maxlength="50"  name="txtValor" id="txtValor" readonly="readonly" />
							    <label >Consecutivo</label>
								<input type="text" required="" class="form-control input-sm" maxlength="50" readonly="readonly" name="txtConsecutivo" placeholder="Numero factura" value="<?php echo   $_SESSION["Numero"];?>" id="txtConsecutivo"  />
								<label >Observaciones</label>
								<textarea NAME="variable" ROWS="2" COLS="6" placeholder="Digite aquí las observaciones de la factura..." class="form-control SombFact" maxlength="50"></textarea>


						    </div>



							   <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-6">
							   	<br>
							   	<center><img src="<?php echo $URL."/Resource/img/ImagenFactura_opt.png";?>" class="img-responsive">
								</center>


						    </div>	







						</div>
							
						 
					</div>

					<br>
						<div class="row">
							
								
							<div class= "col-md-12">

								<a id="adicionar"  onclick="adiccionar()"  class="btn btn-success fond butt" type="button">Agregar producto <span class="glyphicon glyphicon-plus"></span></a>
								<a href="?controlador=login&accion=RedireccionaPrincipal" class="btn btn-danger fond butt">Regresar <span class="icon icon-reply-all"></span></a>	
							    <br>

								<div class="table-responsive " id="tablauser">
									<table class="table table-succee  table-hover table-bordered" id="TablaDinamicaLoad">

									<thead>

										<tr class="info" ><th class="text-center">Id</th><th class="text-center">Nombre</th><th class="text-center">Valor</th><th class="text-center">Cantidad</th><th class="text-center">Total</th><th class="text-center">Eliminar</th></tr>

									</thead>

									

									

								   </table>
								 
	                            </div>
	                        </div>
	            </div>
	            <div class="col-md-12">
	            	<div class="form-group">
                        <button type="submit" id="porfin"   onclick="cargarinsertar()" style="display:none;" >
							REGISTRAR FACTURA
						</button>
	            		<button type="submit" class="btn btn-primary primary btn-sm fond but"  data-toggle="modal" data-target="#myModal">
	            			<span class="icon icon-save"></span>  Generar factura
	            		</button>	

	            	</div>
	            </div>
            </form>

        </div>
    </div>

</div>
 <br> 


<!-- FORMULARIO PARA CUANDO SE PRASIONE EL BOTON GENERAR FACTURA     VENTANA MODAL -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-head">

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<center><h4 class="modal-title" id="myModalLabel"><strong>CONFIRMACION <span class="glyphicon glyphicon-question-sign"></span></strong></h4></center>
			</div>
			<div class="modal-body">
				<center><h4>¿Está seguro de generar la factura?</h4></center>
			</div>
			<div class="modal-footer">
				<form class="form-horizontal" role="form" method="POST">
					<center><button type="button" class="btn btn-danger fond" data-dismiss="modal">NO</button>
					<button type="submit" class="btn btn-primary fond"   data-dismiss="modal" onclick="proceso()">SI</button></center>
				</from>
			</div>
		</div>
	</div>
</div>


	


</body>
</html>



<script type="text/javascript">
	var total_articulos = 0;
	var Subtotal_valor = 0;
	var Total_Valor = 0;
	var cont=0;

	$('#txtCodigo').keypress(function(event){

		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			var valor =$('#txtCodigo').val();

			var formatNumber = {
			 separador: ".", // separador para los miles
			 sepDecimal: ',', // separador para los decimales
			 formatear:function (num){
			 num +='';
			 var splitStr = num.split('.');
			 var splitLeft = splitStr[0];
			 var splitRight = splitStr.length > 1 ? this.sepDecimal + splitStr[1] : '';
			 var regx = /(\d+)(\d{3})/;
			 while (regx.test(splitLeft)) {
			 splitLeft = splitLeft.replace(regx, '$1' + this.separador + '$2');
			 }
			 return this.simbol + splitLeft +splitRight;
			 },
			 new:function(num, simbol){
			 this.simbol = simbol ||'';
			 return this.formatear(num);
			 }
			}


			$.ajax({

				type:  "GET",
				url:   "../SistemaFactura/Model/proceso_ajax.php",
				data: {"valorCaja" : valor,"valorCaja1":'1'},
				success:  function (response) {

				if(response==null){
                // alert("vacio");

                }else{

                   	var cantidadajax=0;
                   	var cantidadacomuladajax=0;                   	
                   	var cantidadBaseDatos=0;

                   	var cantidadllevar =$('#txtCantidad').val();

                   	response = $.parseJSON(response);
                   	var datos=response.NombreProducto+" "+document.getElementById('txtCodigo').value;
                   	if(response.CantidadProducto <= 2){
                   		swal("Advertencia!", "El  "+datos+"  está agotado, favor verificar!", "warning");
                   	}else{



	                   	if(response.NombreProducto==undefined){
	                       		var cod=document.getElementById('txtCodigo').value;
	                       		 swal("Advertencia!", "El producto "+cod+" no registra en la base de datos, favor verificar!", "warning");
	                       		

	                       	}else{

	                       		var IdProduc = document.getElementById("idproducto").value;

	                       		if(IdProduc===response.IdProducto){
	                       			
	                       			 swal("Advertencia!", "No se puede agregar el mismo producto dos veces a la tabla, favor verificar!", "warning");

		                        }else{ 


		                      	var cont=0;
							    for (var i=1;i<document.getElementById('TablaDinamicaLoad').rows.length;i++) {
							      	for (var j=0;j < document.getElementById('TablaDinamicaLoad').rows[i].cells.length-1;j++)
							      	{
							      		
							                  idproducto_fd= document.getElementById('TablaDinamicaLoad').rows[i].cells[0].innerHTML;//OK

							                  if(response.IdProducto===idproducto_fd){
							                  	idproducto_fd=null;
							                  	cont=1;
							                  }
							                 

							        }

							    }


							    
							    if(cont===1){


							    	swal("Advertencia!", "El producto "+response.NombreProducto+" ya fue agregado a la tabla, favor verificar!", "warning");
							    		cont=0;
							    		idproducto_fd=null;

							    }else{ 

							    	

			                     var ValorP=parseInt(response.ValorProducto);   		
			                   	

			                   	$("#txtNombre").val(response.NombreProducto); 

			                   	$("#idproducto").val(response.IdProducto);

			                   	$("#txtValor").val(formatNumber.new(ValorP,"$")); 


			                   	// Quitar los puntos decimales a una cadena
			                   	var str = document.getElementById('txtValor').value.replace(/[$.()\s]/g, ''); 

			                   	
			                   	console.log(total_articulos, cantidadllevar)

			                   	total_articulos = total_articulos + parseInt(cantidadllevar);

			                   	$("#txtTotalAr").val(total_articulos);

			                   	Subtotal_valor = (parseInt(cantidadllevar) * parseInt(response.ValorProducto));

			                   	$("#txtSubtotal").val(formatNumber.new(Subtotal_valor,"$"));

			                   	Total_Valor =Total_Valor+ (parseInt(cantidadllevar) * parseInt(response.ValorProducto));

			                   	$("#txtTotal").val(formatNumber.new(Total_Valor,"$"));

			                   	 
		                    }

	                   }

	                   }

                    }



               }
               },  
               error: function(xhr, status){
               	     alert('Disculpe, existió un problema');
                    //alert("Estas viendo esto por que fallé"+valor);
                }

            });

				return false;
	     }

	});

</script>




<script type="text/javascript">
	var cont=0;

	$('#txtDocumento').keydown(function(event){

		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			var valor =$('#txtDocumento').val();
						


			$.ajax({

				type:  "GET",
				url:   "../SistemaFactura/Model/ProcesoAjax.php",
				data: {"valorCaja1" : valor,"valorCaja2":'2'},
				success:  function (response) {

					if(response==null){
						  // alert("vacio");

                    }else{
            
                                     		
                       	response = $.parseJSON(response)

                       	if(response.NombreCliente==undefined){
                       		var Documento_=document.getElementById('txtDocumento').value;
                       		 swal("Advertencia!", "El cliente "+Documento_+" no registra en la base de datos, favor verificar!", "warning");
                       		

                       	}else{

                       	$("#txtNombreCliente").val(response.NombreCliente+" "+response.ApellidoCliente); 
                       	$("#idcliente").val(response.IdCliente);


                       	}

                       	 



                   	  


                       }
                  },  
                    error: function(xhr, status){
               	    alert('Disculpe, existió un problema');
                        //alert("Estas viendo esto por que fallé"+valor);
                    }

            });


			$.ajax({
            	type:  "GET",
            	url:   "../SistemaFactura/Model/ProcesoAjax.php",
            	data: {"valorCaja2":'B'},

                success:  function (response) {
                    if(response==null){
                      //  alert("vacio");
                     }else{   

                     	 response = $.parseJSON(response)	              	  
                  	 	
                        if(response.Id===null){
                        	 $("#idfactura").val('1'); 

                        }else{

                        $("#idfactura").val(response.Id); 
                        var idfactura_fd=document.getElementById('idfactura').value;


                        }               
                      			
                    	
                     
                      
                     	 
                    }
                }

            }); 


            $.ajax({
            	type:  "GET",
            	url:   "../SistemaFactura/Model/ProcesoAjax.php",
            	data: {"valorCaja2":'D'},

                success:  function (response) {
                    if(response==null){
                      //  alert("vacio");
                     }else{                   
                  	  
                  	 
                                      
                       response = $.parseJSON(response)	
                    
                       if(response.Num===null){

                       	 $("#txtConsecutivo").val('1'); 

                       }else{
                       	 var cam = parseInt(response.Num)+1;
                       $("#txtConsecutivo").val(cam); 
                        var numerofactura_fd=document.getElementById('txtConsecutivo').value;

                       }			
                    	
                       
                         
                         
                       
                       
                    }
                }

            }); 


		    return false;

		}


	});

</script>




 