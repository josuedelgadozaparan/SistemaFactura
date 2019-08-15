<div class="container">
		<div class="panel panel-primary sombra">
			<div class="panel-heading">

				<h3 class="panel-title TituloPanel"><center><b><span class="icon-users"></span> Administracion de usuarios</b></center></h3>
			</div>
			<div class= "panel-body">
				<form class="form-horizontal" role="form" method="POST">

					
				<br>
						<div class="col-md-12">
							<div class="form-group">
								<button  type="button"   class="btn btn-primary fond butt" data-toggle="modal" data-target="#myModalP" > Agregar nuevo  <span class="glyphicon glyphicon-plus"></span></button>
								
								<a href="?controlador=login&accion=RedireccionaPrincipal" class="btn btn-danger fond butt"><span class="icon-got"></span>Regresar <span class=" icon-reply-all"></span></a>
							</div>
						</div>	

				</form>
			
				<div class="row ">
					<div class= "col-md-12 ">
						<div class="table-responsive " id="tablauser">
							<table class="table table-succee  table-hover table-bordered " id="TablaDinamicaLoad">
								<thead>
								<tr class="info"><th class="text-center">Id</th><th class="text-center">Usuario</th><th class="text-center">Contraseña</th><th class="text-center">Nombre</th><th class="text-center">Apellido</th><th class="text-center">Documento</th><th class="text-center">Correo</th><th class="text-center">Tipo Usuario</th><th class="text-center">Editar</th><th class="text-center">Eliminar</th></tr>
								</thead>
								<tbody class="text-center">
								  <?php usuario_controlador::consusuario();?>
							</tbody>
								</table>
						    </div>
					    </div>
					</div>
				</div>
			</div>
		</div>



<!-- Button trigger modal -->




		<!-- Trigger the modal with a button -->
		<div id="myModalP" class="modal fade " role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content ">
					<div class="modal-head">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title TituloPanel"><strong><span class="icon-add-user"></span> Registrar usuario</strong></h4>

					</div>
					<div class="modal-body body col2">						 
						
						<form class="form-horizontal" action="?controlador=usuario&accion=RegistrarUsuario" role="form" method="POST">
						<div class="row">
						
					<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
						
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
							
							<label for="text" class="col-sm-12 lb" control-label>Usuario</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" placeholder="Digite usuario" name="usuario" />
							<label for="password"required=""  class="col-sm-12 lb" control-label>Contarseña</label>
							<input type="password" required=""  class="form-control input-sm SombFact" maxlength="50" placeholder="Digite contraseña" name="contraseña"/>
							<label for="text" class="col-sm-12  lb" control-label>Nombre(s)</label>
							<input type="text" required="" onkeypress="return soloLetras(event)" placeholder="Digite nombre" class="form-control input-sm SombFact" maxlength="50"  name="nombre"/>
							<label for="password" class="col-sm-12 lb" control-label>Apellidos</label>
							<input type="text"  required="" class="form-control input-sm SombFact" maxlength="50" placeholder="Digite sus apellidos" onkeypress="return soloLetras(event)"  name="apellidos"/>
							
							<label for="password" class="col-sm-12 lb" control-label>Direccion</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" placeholder="Digite direccion"  name="direccion"/>



					</div>
					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6 ">
						
						<label >Tipo de doc</label>						
						<select   name="opcion" class="form-control input-sm">
					          <option select>Seleccione una opcion...</option>
					          <option>CC</option>
					          <option>T.I</option>	         					   
						</select>
						<label for="password" class="col-sm-12 lb" control-label>Documento</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" placeholder="Digite documento"  name="documento" onkeypress="return valida(event)"/>
						<label for="password" class="col-sm-12 lb" control-label>Telefono</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" placeholder="Digite telefono"  name="celular"onkeypress="return valida(event)"/>
						<label for="password" class="col-sm-12 lb" control-label>Correo</label>
						<input type="text" required=""  class="form-control input-sm SombFact" maxlength="50" placeholder="Digite correo"  name="correo"/>
						<label >Estado</label>
						<input type="text" value="1" readonly="readonly" placeholder="Estado" class="form-control input-sm SombFact" maxlength="50"  name="Estado"/>

						

					
					</div>
	
    					
					</div>
					
					<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-6">

						<br>
						<center><img src="<?php echo $URL."/Resource/img/usuarios_.png";?>" class="img-responsive">
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
							<span class="icon-new-message" ></span> Editar usuario</strong></h4>
					</div>
					<div class="modal-body col2">
						<center><h4><strong>¿Está seguro que desea actualizar el usuario?</strong></h4></center> 

							<form class="form-horizontal"  action="?controlador=usuario&accion=ActualizarUsuario" role="form" method="POST">
								<hr>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
							<input type="text" style="display:none;" required="" class="form-control " maxlength="50"  id="idmodal_idusuario" name="modal_idusuario" readonly="readonly"/>

							<label>Usuario</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_usuario" name="modal_usuario" />
							
							<label >Contraseña</label>
							<input type="password" required="" class="form-control input-sm SombFact" maxlength="10" id="idmodal_password" name="modal_password"/>

							<label>Nombre(s)</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" onkeypress="return soloLetras(event)" id="idmodal_nombre" name="modal_nombre"/>
							<hr>
							
					</div>



					<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-6">
						
								<label>Apellidos</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50" onkeypress="return soloLetras(event)"  id="idmodal_apellido" name="modal_apellido"/>

							<label >Documento</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_documento" name="modal_documento"  onkeypress="return valida(event)"/>

							<label >Correo</label>
							<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_correo" name="modal_correo"  />
							 <input type="text" required="" style="display:none;"  class="form-control input-sm" maxlength="10" id="modal_DocumentoActual" name="modal_DocumentoActual" readonly="readonly"/>
							  <input type="text" required="" style="display:none;"  class="form-control input-sm" maxlength="10" id="modal_LoginActual" name="modal_LoginActual" readonly="readonly"/>
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
						<h4 class="modal-title"><strong><span class="icon-trash"></span> Eliminar usuario</strong></h4>

					</div>
					<div class="modal-body col2 ">						 
						
						<form class="form-horizontal" action="?controlador=usuario&accion=usuarioeliminar" role="form" method="POST">
						<input  type="text" required="" class="form-control" maxlength="10" id="idmodal_idusuario_eliminar" name="modal_idusuario_eliminar" readonly="readonly" style="display:none;"/>

						<label >Nombre</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_cedula_eliminar" name="modal_cedula_eliminar" readonly="readonly"/>
						<label>Apellido</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_nombre_eliminar" name="modal_nombre_eliminar" readonly="readonly"/>
						<label >Cedula</label>
						<input type="text" required="" class="form-control input-sm SombFact" maxlength="50"  id="idmodal_apellido_eliminar" name="modal_apellido_eliminar" readonly="readonly"/>
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


