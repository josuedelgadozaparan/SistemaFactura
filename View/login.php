<div class="container">
	
	<br>
		<div class="row">
			<div class="col-md-4 col-lg-4">
			</div>
			<div class="col-xs-12 col-ms-12 col-md-4 col-lg-4">
				<div class="panel panel-primary login borde">

						<div class="panel-heading">
							<center><h4 class="pane-title"><b>INICIAR SESIÓN</b></h4></center>
						</div>
						
						<div class="well-g ">
							<div class="panel-body">
								  <center><img src="<?php echo $URL."/Resource/img/login.png";?>" class="img-responsive"></center><br><br>
								<form  action="?controlador=login&accion=Validar_Credenciales"  method="POST">
										<div class="form-group">
											<input type="text" class="form-control inp SombFact" name="Usuario" required="" placeholder="Usuario">
										</div>
										<div class="form-group">
											<input type="password" class="form-control inp SombFact" name="Contraseña" required=""   placeholder="Password">
										</div>
										<div class="form-group">

											<button  type="submit"  name="BtnAcceder" id="IdBtnAcceder" class="btn btn-primary btn-block fond but" ><span class="glyphicon glyphicon-log-in"></span> INGRESAR </button>
											
										</div>
										
							     </form>
						    </div>
						</div>
					<div class="col-md-4 col-lg-4">
				    </div>					
				</div>
			
		   </div>			
	</div>
</div>
<br><br><br>
<br><br><br>
<br><br><br>
</body>


</html>