<div class="container">
		<div class="panel panel-primary sombra">
			<div class="panel-heading">

				<h3 class="panel-title TituloPanel"><center><b><span class="glyphicon glyphicon-lock"></span>  Administracion de productos</b></center></h3>
			</div>
			<div class= "panel-body">
				<form class="form-horizontal" role="form" method="POST">

					
				<br>
						<div class="col-md-12">
							<div class="form-group">
								<button  type="button"   class="btn btn-primary fond butt" data-toggle="modal" data-target="#myModalP" > Agregar nuevo <span class="glyphicon glyphicon-plus"></span></button>
								<a href="?controlador=login&accion=RedireccionaPrincipal" class="btn btn-danger fond butt"><span class="icon-got"></span>Regresar <span class="icon icon-reply-all"></span></a>
							</div>
						</div>	

				</form>
			
				<div class="row">
					<div class= "col-md-12">
						<div class="table-responsive " id="tablauser">
							<table class="table table-succee  table-hover table-bordered" id="TablaDinamicaLoad">
								<thead>
								<tr class="info"><th class="text-center">Id</th><th class="text-center">Nombre</th><th class="text-center">Código</th><th class="text-center">Cantidad</th><th class="text-center">Stock</th><th class="text-center">Valor</th><th class="text-center">Proveedor</th><th class="text-center">Editar</th><th class="text-center">Eliminar</th></tr>
								</thead>
								<tbody class="text-center">
								  <?php producto_controlador::llenarTablaProducto();?>
							</tbody>
								</table>
						</div></div>
					</div>
				</div>
			</div>
		</div>



<!-- Button trigger modal -->




		<!-- Trigger the modal with a button -->
		<div id="myModalP" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-head">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title TituloPanel"><strong><span class="icon-add-user"></span> Registrar producto</strong></h4>

					</div>
					<div class="modal-body body col2">						 
						
						<form class="form-horizontal"  action="?controlador=producto&accion=RegistrarProducto"   role="form" method="POST">
						<div class="row">
						
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
							
							<label>Nombre</label>
							<input type="text" required="" placeholder="Nombre" class="form-control input-sm SombFact" maxlength="50" id="Nombre" name="Nombre" />
							<label >Cantidad</label>
							<input type="text" required="" placeholder="Cantidad" class="form-control input-sm SombFact" onkeypress="return valida(event)" maxlength="50"id="cantidad"  name="cantidad"/>
							<label >Stock</label>
							<input type="text" required="" placeholder="Stock" class="form-control input-sm SombFact" maxlength="50" id="stock"  onkeypress="return valida(event)" name="stock"/>
							


					    </div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
							
							<label>Proveedor:</label>
							<input type="text" required=""  placeholder="Proveedor" class="form-control input-sm SombFact" maxlength="50" id="proveedor" name="proveedor"/>

							<label >Valor:</label>
							<input type="text" required="" placeholder="Valor"  class="form-control input-sm SombFact" maxlength="50"          id="valor"  name="valor" onkeypress="return valida(event)"/>

							<label>Código:</label>
							<input type="text" required="" placeholder="Código" class="form-control input-sm SombFact" maxlength="50" id="codigo"  name="codigo"/>
							
						</div>
	
    					
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">

						

						<br>
							<center><img src="<?php echo $URL."/Resource/img/product.png";?>" class="img-responsive">
						</center>


					</div>
				</div>

				<br>

				<div class="modal-footer">	
						<center><button type="submit"    class="btm fond" name="BtnRegistrar" > <b>Registrar</b>  <span class="glyphicon glyphicon-floppy-save"></span></button></center>
				</div>
						
						</form>
					</div>
					
				</div>
			</div>
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content" >
					<div class="modal-head ">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title TituloPanel"><strong>
							<span class="icon-new-message" ></span> Editar producto</strong></h4>
					</div>
					<div class="modal-body col2">
						<center><h4><strong>¿Está seguro que desea actualizar el producto?</strong></h4></center> 

					<form class="form-horizontal" action="?controlador=producto&accion=ActualizarProducto" role="form" method="POST">
						<hr>
					    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
							<label >Id</label>
						    <input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_idProducto" name="modal_idProducto" readonly="readonly"/>						
							
							<label >Nombre:</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_nombre" name="modal_nombre" />
							
							<label>Cantidad:</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="10" id="modal_cantidad" name="modal_cantidad" onkeypress="return valida(event)"/>	
							<hr>
							
					</div>



					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
							<label >Proveedor</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_proveedor" name="modal_proveedor"/>

							<label >Valor</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_valor" name="modal_valor" onkeypress="return valida(event)"/>

							<label>Código</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_codigo" name="modal_codigo" />

							<input type="text" required="" style="display:none;"  class="form-control input-sm" maxlength="10" id="CodigoActual" name="CodigoActual" readonly="readonly"/>

							<hr>
							
					</div>

							
					
						
							
							<center><button type="submit"    class="bt fond" name="modalBtnActualizar"><span class="icon-cycle"></span>  <b>Actualizar</b></button></center>
					
						</form>
					</div>
					
				</div>
			</div>
		</div>


		<div id="myModal2" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-head">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><strong><span class="icon-trash"></span> Eliminar producto</strong></h4>

					</div>
					<div class="modal-body col2">						 
						
						<form class="form-horizontal" action="?controlador=producto&accion=EliminarProducto" role="form" method="POST">
						
						<input type="text" style="display:none;" required="" class="form-control" maxlength="50"  id="idmodal_idProducto_eliminar" name="idmodal_idProducto_eliminar" readonly="readonly"/>

						<label >Nombre</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_nombre_eliminar" name="modal_nombre_eliminar" readonly="readonly"/>

						<label >Código</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_codigo_eliminar" name="modal_codigo_eliminar" readonly="readonly"/>

						<label>Valor</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_valor_eliminar" name="modal_valor_eliminar" readonly="readonly"/>
						<br>
						<center><button type="submit"    class="btn btn-danger fond" name="modalBtnEliminar" > <span class="icon-remove-user"></span> <b>Eliminar</b></button></center>
						</form>
					</div>
					
				</div>
			</div>
		</div>

		<br><br><br><br><br><br><br><br><br><br><br><br><br>

</body>

</html>


