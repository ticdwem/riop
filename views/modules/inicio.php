<?php
include "views/modules/header.php";
?>
<!-- <div class="line-btn btn-group-vertical">
  <button type="button" class="btn btn-lin">ABRASIVOS</button>
  <button type="button" class="btn btn-lin">ELECTRICO</button>
  <button type="button" class="btn btn-lin">MATERIAL ELECTRICO</button>
  <button type="button" class="btn btn-lin">PLOMERIA</button>
  <button type="button" class="btn btn-lin">ALMACENAMIENTO</button>
  <button type="button" class="btn btn-lin">HERRAMIENTA</button>
  <button type="button" class="btn btn-lin">PINTURA</button>
</div>  -->
<div class="container">
      <div class="btn-lineas">
          <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-danger active">
          <input type="radio" name="options" id="option1" autocomplete="off" checked> Abrasivos
        </label>
        <label class="btn btn-danger">
          <input type="radio" name="options" id="option2" autocomplete="off"> Cargas
        </label>
        <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Cintas
        </label>
        <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Eléctrico
        </label>
        <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Equipo de Seguridad
        </label>
        <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Escaleras
        </label>
        <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Fijación
        </label>
          <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Herramienta
        </label>
          <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Herramienta Corte
        </label>
          <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Herramienta Eléctrica
        </label>
          <label class="btn btn-danger">
          <input type="radio" name="options" id="option3" autocomplete="off"> Limpieza
        </label>
      </div>
</div>

<div class="row">

  
<div class="sec-1 col-lg-12">   
<div id="carouselExampleIndicators" class="stil carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba0.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block"> 
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba1.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba2.jpg" alt="Third slide">
    </div>
       <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba3.jpg" alt="Third slide">
    </div>
       <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba4.jpg" alt="Fourth slide">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba5.jpg" alt="Fifth slide">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner-prueba6.jpg" alt="Sixty slide">
    </div>
      <div class="carousel-item">
      <img class="d-block w-100" style="width: 100px; height: 250px;" src="images/banner24.png" alt="Seventy slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>
</div>
  <div class="sec-srch col-lg-12">
          <form class="bar-bus" action="<?php echo htmlspecialchars(base_url.'catalogo-productos');?>" method="get" id="frmFormSerarching">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="buscarInput" placeholder="Buscar producto" aria-label="large" name="buscar" aria-describedby="button-addon2" autocomplete="off">
            <div class="errorInput"></div>
            <div class="input-group-append">
             <!-- <button class="btn btn-outline-danger" type="button" id="btn_buscar"><i class="fa fa-search" aria-hidden="true"></i></button>-->
           <!--   <input type="submit" class="btn btn-outline-danger" id="btn_buscar" value="BUSCAR">  -->
            </div>
          </div>
        </form>
        </div>
        
<!-- <div class="col-lg-6">
<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Fferreriopisuena%2Fvideos%2F201354774131642%2F&show_text=0&width=560" width="100%" height="400" style="border:none;overflow:hidden"
 scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
</div> -->
  </div>
</div>
      


<div class="container">
  <div class="sec-3">
  <section class="herramientas-logos slider">
  <?php 
    $randomPr = new Productos();
    $randomPr->randomStrat();
  ?>
   <!-- <div class="slide"><a href="https://freefrontend.com/css-parallax/"><img src="images/soldadura.png"></a><p>Soldadura</p></div>
    <div class="slide"><img src="images/4040.png"></div>
    <div class="slide"><img src="images/reg-2.png"></div>
    <div class="slide"><img src="images/taladro.png"></div>
    <div class="slide"><img src="images/valvula2.png"></div>
    <div class="slide"><img src="images/cerradura.png"></div>
    <div class="slide"><img src="images/lijadora.png"></div>
    <div class="slide"><img src="images/niple-galvanizado.png"></div>
    <div class="slide"><img src="images/fanal-logo.jpg"></div>
    <div class="slide"><img src="images/fandeli-logo.jpg"></div>
    <div class="slide"><img src="images/fifa.png"></div>
    <div class="slide"><img src="images/fischer-logo.png"></div>
    <div class="slide"><img src="images/helvex.jpg"></div>
    <div class="slide"><img src="images/henkel-logo.png"></div>
    <div class="slide"><img src="images/intec-logo.jpg"></div>
    <div class="slide"><img src="images/truper-logo.png"></div>
    <div class="slide"><img src="images/3m-logo.png"></div> -->
  </section>
</div>
</div>
<div class="paral-sec">
  <div class="parallax-window" data-parallax="scroll" data-image-src="images/bann-catalogo5.jpg">
  <p class="texto-encima2">"Contamos con Ventas a Industrias"</p>
  <!-- <div class="centrado2" style="font-family: 'Dosis', sans-serif;">Ventas a Industrias</div> -->
  <!-- <button type="button" class="btn btn-danger boton-cursos">Me interesa</button> -->
   <a class="btn btn-danger boton-cursos text-white" id="" href="<?php echo $especifDato;?>contacto">Me Interesa</a>
</div>
</div>

<div class="serv-stilo container">
<div class=" row">
<div class="col-lg-3">
<div class="card text-white bg-danger">
  <img class="card-img-top" src="images/3.png" alt="Card image cap" style="height: 150px;">
  <div class="card-body">
    <h5 class="card-title">Atencion a Clientes:</h5>
    <p class="card-text">Si no encuentra lo que busca NOSOTROS LO CONSEGUIMOS.</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>
<div class="col-lg-3">
<div class="card" style="background: #0c2461;">
  <img class="card-img-top" src="images/servicio-domicilio.png" alt="Card image cap" style="height: 150px;">
  <div class="card-body text-white">
    <h5 class="card-title">Servicio a Domicilio</h5>
    <p class="card-text">Le ofrecemos una gran variedad de productos (más de 15 mil artículos).</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>
<div class="col-lg-3">
<div class="card" style="">
  <img class="card-img-top" src="images/servicio5.png" alt="Card image cap" style="height: 150px;">
  <div class="card-body text-white bg-danger ">
    <h5 class="card-title">Linea de Credito</h5>
    <p class="card-text">Podemos ofrecerle una línea de crédito de acuerdo a sus necesidades</p>
   <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>
<div class="col-lg-3">
<div class="card" style="background: #0c2461;">
  <img class="card-img-top" src="images/servicio4.png" alt="Card image cap" style="height: 150px;">
  <div class="card-body text-white">
    <h5 class="card-title">Asesoría en compras:</h5>
    <p class="card-text">Contamos con un amplio grupo de profesionales, ¡Llámanos!</p>
   <!--  <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>
</div>
</div>
   <!--    <div class="container">
          <div class="row">
           <div class="col-lg-12 sec-2">
          <ul class="car" id="c"> 	
              <li class="car-sec"><div class="card text-white bg-danger" style="width: 100% ; ">
            <img class="card-img-top" src="images/3.png" alt="Card image cap" style="height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Atencion a Clientes:</h5>
              <p class="card-text">Si no encuentra lo que busca NOSOTROS LO CONSEGUIMOS.</p>
            </div>
          </div>
          </li>
              <li class="car-sec"><div class="card" style="width: 100%; background: #0c2461;">
            <img class="card-img-top" src="images/servicio-domicilio.png" alt="Card image cap" style="height: 150px;">
            <div class="card-body text-white ">
              <h5 class="card-title">Servicio a Domicilio</h5>
              <p class="card-text">Le ofrecemos una gran variedad de productos (más de 15 mil artículos).</p>
            </div>
          </div>
          </li>
              <li class="car-sec"><div class="card text-white bg-danger" style="width: 100%;">
            <img class="card-img-top" src="images/servicio5.png" alt="Card image cap" style="height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Linea de Credito</h5>
              <p class="card-text">Podemos ofrecerle una línea de crédito de acuerdo a sus necesidades</p>
            </div>
          </div> 
          </li>
              <li class="car-sec"><div class="card text-white" style="width: 100%; background: #0c2461;">
            <img class="card-img-top" src="images/servicio4.png" alt="Card image cap" style="height: 150px;">
            <div class="card-body">
              <h5 class="card-title">Asesoría en scompras:</h5>
              <p class="card-text">Contamos con un amplio grupo de profesionales.</p>
            </div>
      </div>
      </li>
		<li class="car-sec"><img src="images/servicio4.png" width="75%" height="125px"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li class="car-sec"><p class="p"><strong>6</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li class="car-sec"><p class="p"><strong>7</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li class="car-sec"><p class="p"><strong>8</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>  

	<li class="car-sec"><p class="p"><strong>9</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li class="car-sec"><p class="p"><strong>10</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li class="car-sec"><p class="p"><strong>11</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li>
		<li class="car-sec"><p class="p"><strong>12</strong></p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p></li> 
	</ul>
    </div>
</div>
</div> -->

<div class="sec-4 map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3765.1812673414006!2d-99.074568!3d19.317939!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce0364188dc1ef%3A0xec3ae9996a20d6c!2sFerretera%20Rio%20Pisue%C3%B1a!5e0!3m2!1ses-419!2smx!4v1590605222309!5m2!1ses-419!2smx" 
			width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<div class="sec-3">
  <section class="customer-logos slider">
    <div class="slide"><img src="images/werner-logo.png" width="" height=""></div>
    <div class="slide"><img src="images/anclo-logo.png" width="" height="" ></div>
    <div class="slide"><img src="images/austromex-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/bosch-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/cifunsa-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/deacero-logo.gif" width="" height=""></div>
    <div class="slide"><img src="images/dewalt-logo.png" width="" height=""></div>
    <div class="slide"><img src="images/escalumex-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/fanal-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/fandeli-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/fifa.png"  width="" height=""></div>
    <div class="slide"><img src="images/fischer-logo.png" width="" height=""></div>
    <div class="slide"><img src="images/helvex.jpg" width="" height=""></div>
    <div class="slide"><img src="images/henkel-logo.png" width="" height=""></div>
    <div class="slide"><img src="images/intec-logo.jpg" width="" height=""></div>
    <div class="slide"><img src="images/truper-logo.png" width="" height=""></div>
    <div class="slide"><img src="images/3m-logo.png" width="" height=""></div>
  </section>
</div>   



<?php
include "views/modules/footer.php";
?>