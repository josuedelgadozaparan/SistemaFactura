 <!-- Carousel Default -->
  <section class="my-carrusel  carousel-default">
    <div id="carousel-default" class="carousel slide " data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-default" data-slide-to="0" class=""></li>
        <li data-target="#carousel-default" data-slide-to="1" class=""></li>
        <li data-target="#carousel-default" data-slide-to="2" class="active"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- NOTE: Bootstrap v4 changes class name to carousel-item -->
        <div class="item">
          <img src="<?php echo $URL."/Resource/img/contabilidades.jpg";?>" alt="First slide">
          <div class="carousel-caption">
            <h3>Control estricto</h3>
            <p>Todos los registros controlados</p>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo $URL."/Resource/img/contabilidades.jpg";?>"               alt="Second slide">
          <div class="carousel-caption">
            <h3>Supervision diaria</h3>
            <p>Gestion de entradas y salidas</p>
          </div>
        </div>
        <div class="item active">
          <img src="<?php echo $URL."/Resource/img/contabilidades.jpg";?>"alt="Third slide">
          <div class="carousel-caption">
            <h3>Automatizacion</h3>
            <p>Registro organizado de cuentas</p>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-default" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-default" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </section>
  <!-- /end Carousel Default -->