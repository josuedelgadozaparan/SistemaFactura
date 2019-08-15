<header>
  <nav class="navba navbar-inverse nav" role="navigation">
    <!-- El logotipo y el icono que despliega el menú se agrupan
         para mostrarlos mejor en los dispositivos móviles -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse"
              data-target=".navbar-ex1-collapse">
        <span class="sr-only">Desplegar navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>



       <a class=" navbar-brand Titulonav" href="?controlador=login&accion=RedireccionaPrincipal">SistemFacture </a>
    </div>

    <!-- Agrupar los enlaces de navegación, los formularios y cualquier
         otro elemento que se pueda ocultar al minimizar la barra -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav"> 


           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="icon-users"></span> <b>Roles</b> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <li><a href="#" id="Usuarios"> <span class="icon-users sp"></span>  Usuarios</a></li>
               
                  <li ><a href="?controlador=cliente&accion=Iniciar_cliente"> <span class="icon-users sp"></span>  Clientes</a></li>              
              </ul>
          </li>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="icon-shopping-cart"></span>  <b>Transacciones</b> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                 <li><a id="Productos" href="#"> <span class="  icon-cog"></span>  Producto </a></li>  
                 <li><a  id="Proveedores" href="#"> <span class="icon-user"></span>  Proveedor </a></li>    
              </ul>
          </li>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="icon-news"></span>  <b>Facturacion </b> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                 <li><a href="?controlador=factura&accion=Iniciar_factura"><span class="icon-news"></span>  Factura </a></li>
              </ul>
          </li>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <span class="icon-text-document"></span>  <b>Informes</b> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="?controlador=informe&accion=Iniciar_informe"><span class="icon-text-document"></span>  Reportes</a></li>
                
              </ul>
          </li>
           <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <span class="icon-help-with-circle"></span>  <b>Ayuda</b> <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a  id="Nosotros"  href="?controlador=nosotros&accion=Iniciar_nosotros"><span class="icon-text-document"></span>  Nosotros</a></li>                
              </ul>
          </li>
           <li class="dropdown">
        <a  id="CerrarSesion" href="#" data-toggle="modal" data-target="#MyModal">
         <span class="icon-circle-with-cross"></span>  <b>Cerrar sesión</b></a>
         <input type="text"  style="display:none;"   id="Idusuario"  value= "<?php  echo  $_SESSION["IdUsuario"];?>"/>

      </li>

       
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="icon-shareable sp"></span><b> Bienvenido:
              <?php echo   $_SESSION["NombreUsuario"]; echo " ";  echo $_SESSION["ApellidoUsuario"];  ?></b>
           </a>
        </li>
      </ul>

    </div>

 </nav>


<div class="modal fade" id="MyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-head">

       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title" id="myModalLabel"><strong>¡ADVERTENCIA!</strong></h4></center>
      </div>
      <div class="modal-body">
        <center><h4>¿Está seguro que desea cerrar sesion?</h4></center>
      </div>
      <div class="modal-footer">
        <form class="form-horizontal" role="form" method="POST">
          <center><button type="button" class="btn btn-danger fond" data-dismiss="modal">NO</button>
          <a href="?controlador=login&accion=CerarSesion" class="btn btn-primary fond">SI</a></center>
        </from>
      </div>
    </div>
  </div>
</div>


</header>
