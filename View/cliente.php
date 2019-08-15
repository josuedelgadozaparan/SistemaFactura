<div class="container">
		<div class="panel panel-primary sombra">
			<div class="panel-heading ">

				<h3 class="panel-title TituloPanel"><center><b><span class="icon-users"></span> Administracion de clientes</b></center></h3>
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
								<tr class="info"><th class="text-center">Id</th><th class="text-center">Nombre</th><th class="text-center">Documento</th><th class="text-center">Direccion</th><th class="text-center">Barrio</th><th class="text-center">Telefono</th><th class="text-center">Email</th><th class="text-center">Compra</th><th class="text-center">Editar</th><th class="text-center">Eliminar</th></tr>
								</thead>
								<tbody class="text-center">
								  <?php cliente_controlador::llenarTablaCliente();

								 // echo 'Versión actual de PHP: ' . phpversion();
								  ?>
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
						<h4 class="modal-title TituloPanel"><strong><span class="icon-add-user"></span> Registrar cliente</strong></h4>

					</div>
					<div class="modal-body body col2">						 
						
						<form class="form-horizontal"  action="?controlador=cliente&accion=RegistrarCliente"  role="form" method="POST">
						<div class="row">
						
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
							
							<label>Nombre(s)</label>
							<input type="text" required="" placeholder="Nombre" class="form-control input-sm SombFact" maxlength="50" onkeypress="return soloLetras(event)" id="nombre" name="nombre" />
							<label >Apellido(s)</label>
							<input type="text" required="" placeholder="Apellidos" class="form-control input-sm SombFact" onkeypress="return soloLetras(event)" maxlength="50"  name="apellido"/>

							<label >Barrio</label>
							<input type="text" required="" placeholder="Barrio" class="form-control input-sm SombFact" maxlength="50"  name="barrio"/>
							<label >Direccion</label>
							<input type="text" required="" placeholder="Direccion" class="form-control input-sm SombFact" maxlength="50"  name="direccion"/>
							<label >Celular</label>
							<input type="text" placeholder="Celular" required="" class="form-control input-sm SombFact" maxlength="50"  name="telefono" onkeypress="return valida(event)"/>				
							


					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
						
						<label >Tipo de doc</label>						
						<select   name="opcion" class="form-control input-sm">
					          <option select>Seleccione una opcion...</option>
					          <option>CC</option>
					          <option>T.I</option>	         					   
						</select>

						<label >Documento</label>
						<input type="text" required="" placeholder="Documento" class="form-control input-sm SombFact" maxlength="50"  name="documento" onkeypress="return valida(event)"/>						
						<label >Email</label>
						<input type="text" required="" placeholder="Email" class="form-control input-sm SombFact" maxlength="50"  name="correo"/>
						
						<label >Tipo cliente</label>
						<select   name="TipoCliente" class="form-control input-sm">
					          <option select>Seleccione una opcion...</option>
					          <option value="Natural">Natural</option>
					          <option value="Juridico">Juridico</option>
					         					   
						</select>
						<label >Estado</label>
						<input type="text" value="1" readonly="readonly" placeholder="Estado" class="form-control input-sm SombFact" maxlength="50"  name="Estado"/>
					
					</div>
	
    					
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">

						<center><img src="<?php echo $URL."/Resource/img/docentes.png";?>" class="img-responsive">
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
							<span class="icon-new-message" ></span> Editar cliente</strong></h4>
					</div>
					<div class="modal-body col2">
						<center><h4><strong>¿Está seguro que desea actualizar el cliente?</strong></h4></center> 

							<form class="form-horizontal" action="?controlador=cliente&accion=ActualizarCliente" role="form" method="POST">
								<hr>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
							<label >Id</label>
							<input type="text" required=""  class="form-control input-sm SombFact" maxlength="50"  id="modal_idcliente" name="modal_idcliente"  readonly="readonly"/>

							<label >Nombre:</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_nombre" name="modal_nombre" />
							
							<label >Documento:</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="10" id="modal_documento" name="modal_documento" onkeypress="return valida(event)"/>			
							<hr>
							
					</div>


					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
								<label >Barrio</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_barrio" name="modal_barrio" />
							
							<label >Direccion</label>
							<input type="text" required=""   class="form-control input-sm SombFact" maxlength="50" id="modal_prueba" name="modal_prueba"/>

							<label>Celular</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_telefono" name="modal_telefono" onkeypress="return valida(event)"/>
							<input type="text" required="" style="display:none;"  class="form-control input-sm" maxlength="10" id="DocumentoActual" name="DocumentoActual" readonly="readonly"/>

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
						<h4 class="modal-title"><strong><span class="icon-trash"></span> Eliminar cliente</strong></h4>

					</div>
					<div class="modal-body col2">						 
						
						<form class="form-horizontal" action="?controlador=cliente&accion=EliminarCliente" role="form" method="POST">
					

					    <input type="text" required="" style="display:none;"  class="form-control input-sm" maxlength="10" id="modal_idcliente_eliminar" name="modal_idcliente_eliminar" readonly="readonly"/>
						<label for="text" class="col-sm-12" control-label>Nombre:</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_nombre_eliminar" name="modal_nombre_eliminar" readonly="readonly"/>
						<label for="text" class="col-sm-12" control-label>Cedula:</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="modal_cedula_eliminar" name="modal_cedula_eliminar" readonly="readonly"/>
						<br>
						<br>
						<center><button type="submit"    class="btn btn-danger fond" name="modalBtnEliminar" > <span class="icon-remove-user"></span> <b>Eliminar</b></button></center>
						</form>
					</div>
					
				</div>
			</div>
		</div>

		<br><br><br><br><br><br><br><br><br><br><br><br><br>





