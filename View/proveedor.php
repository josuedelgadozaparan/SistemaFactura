<div class="container">
		<div class="panel panel-primary sombra">
			<div class="panel-heading">

				<h3 class="panel-title TituloPanel"><center><span class="icon-v-card"></span>  <b>Gestión de proveedores</b></center></h3>
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
								<tr class="info"><th class="text-center">Id</th><th class="text-center">Nombre</th><th class="text-center">Direccion</th><th class="text-center">Nombre contacto</th><th class="text-center">Celular contacto</th><th class="text-center">Nit</th><th class="text-center">Pagina web</th><th class="text-center">Editar</th><th class="text-center">Eliminar</th></tr>
								</thead>
								<tbody class="text-center">
								  <?php proveedor_controlador::llenarTablaProveedor();?>
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
						<h4 class="modal-title TituloPanel"><strong><span class="icon-add-user"></span> Registrar proveedor</strong></h4>

					</div>
					<div class="modal-body body col2">						 
						
						<form class="form-horizontal" action="?controlador=proveedor&accion=RegistrarProveedor" role="form" method="POST">
						<div class="row">
						
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
						
							<label >Nombre proveedor</label>
							<input type="text" required="" placeholder="Nombre proveedor" class="form-control input-sm SombFact" onkeypress="return soloLetras(event)" maxlength="50" id="Nombre" name="Nombre" />
							<label >Direccion</label>
							<input type="text" required="" placeholder="Direccion" class="form-control input-sm SombFact" maxlength="50"id="direccion_proveedor"  name="direccion_proveedor"/>
							<label >Nombre contacto</label>
							<input type="text" required="" placeholder="Nombre contacto" class="form-control input-sm SombFact" onkeypress="return soloLetras(event)" maxlength="50" id="nombreContacto"  name="nombreContacto"/>

					
						
					    </div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
						
						<label >Celular contacto</label>
						<input type="text" required=""  placeholder="Celular contacto" class="form-control input-sm SombFact" maxlength="50" id="Celular_contacto_proveedor"  onkeypress="return valida(event)" name="Celular_contacto_proveedor"/>

						<label>Nit</label>
						<input type="text"  placeholder="Nit"  class="form-control input-sm SombFact" maxlength="50"          id="Nit" onkeypress="return valida(event)" name="Nit"/>

						<label>Pagina web</label>
						<input type="text" required="" placeholder="Pagina web" class="form-control input-sm SombFact" maxlength="50" id="pagina_web"  name="pagina_web"/>

					</div>
	
    					
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">

						<br>
						<center><img src="<?php echo $URL."/Resource/img/proveedor_opt.png";?>" class="img-responsive">
						</center>

					</div>
				</div>

				<br>

				<div class="modal-footer">	
						<center><button type="submit"    class="btm fond" name="BtnRegistrar" > <b>Registrar</b>  <span class="icon-save"></span></button></center>
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
							<span class="icon-new-message" ></span> Editar proveedor</strong></h4>
					</div>
					<div class="modal-body col2">
						<center><h4><strong>¿Está seguro que desea actualizar el proveedor?</strong></h4></center> 

							<form class="form-horizontal" action="?controlador=proveedor&accion=ActualizarProveedor" role="form" method="POST">
								<hr>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
							<input  style="display: none;" type="text" required="" class="form-control" maxlength="50"  id="modal_idProveedor" name="modal_idProveedor" readonly="readonly"/>					
							
							<label >Nombre proveedor</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" onkeypress="return soloLetras(event)"  id="modal_nombre" name="modal_nombre" />
							
							<label >Direccion</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="10" id="modal_direccion" name=" modal_direccion" />

							<label >Nombre contacto</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="10" onkeypress="return soloLetras(event)" id="modal_nombre_contacto" name="modal_nombre_contacto" />	
							<hr>
							
					</div>



					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
							<label >Celular contacto</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="10" id="modal_celular_contacto" name="modal_celular_contacto" onkeypress="return valida(event)"/>									

							<label>Nit</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_Nit" name="modal_Nit" onkeypress="return valida(event)"/>

							<label >Pagina web</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_pagina_web" name="modal_pagina_web"/>

							<input type="text" required="" style="display:none;"  class="form-control input-sm" maxlength="10" id="NitActual" name="NitActual" readonly="readonly"/>
							<hr>
							
					</div>

							
					
						
							
							<center><button type="submit"    class="bt fond" name="modalBtnActualizar"> <b><span class="icon-cycle"></span> Actualizar</b></button></center>
					
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
						<h4 class="modal-title "><strong><span class="icon-trash"></span> Eliminar proveedor</strong></h4>

					</div>
					<div class="modal-body col2">						 
						
						<form  class="form-horizontal" action="?controlador=proveedor&accion=EliminarProveedor" role="form" method="POST">
						<input type="text" required="" class="form-control input-sm" maxlength="50"  id="idmodal_idProveedor_eliminar" style="display: none;" name="idmodal_idProveedor_eliminar" readonly="readonly"/>

						<label >Nombre proveedor</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_nombre_eliminar" name="modal_nombre_eliminar" readonly="readonly"/>

						<label >Direccion</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_direccion_eliminar" name="idmodal_direccion_eliminar" readonly="readonly"/>

						<label >Nit</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_Nit_eliminar" name="idmodal_Nit_eliminar" readonly="readonly"/>
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


