  
<?php
include "views/modules/header.php";
?>
<br><br><br>
<div class="container">
  <div class="card">
    <div class="card-body bg-light">
    <h3 class="text-center text-light bg-dark ">Cotizaciones, Quejas &oacute; Sugerencias</h3>
  <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-2">
  <div class="form-group row ">
    <label for="nombre" class=" col-sm-12 col-md-12 col-lg-12 col-form-label"><p class=" d-inline-block text-light bg-dark">Nombre:</p></label>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre, Empresa o Contacto">
    </div>
    <div class="errorAlert errorNombre" style="display: none;">este campo esta vacio</div>
  </div>
  <div class="form-group row">
    <label for="telefono" class="col-sm-12 col-md-12 col-lg-12 col-form-label"><p class=" d-inline-block text-light bg-dark">Telefono:</p></label>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <input class="form-control" type="text" name="telefono" id="telefono" placeholder="(LADA)+Telefono">
    </div>
    <div class="errorAlert errorTel" style="display: none;">este campo esta vacio</div>
  </div>
  <div class="form-group row">
    <label for="correo" class="col-sm-12 col-md-12 col-lg-12 col-form-label"><p class=" d-inline-block text-light bg-dark">Email:</p></label>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <input class="form-control" name="correo" type="text" id="correo" placeholder="contacto@ejemplo.com">
    </div>
    <div class="errorAlert errorCorreo" style="display: none;">este campo esta vacio</div>
  </div>
  <div class="form-group row">
    <label for="dir" class="col-sm-12 col-md-12 col-lg-12 col-form-label"><p class=" d-inline-block text-light bg-dark">Direccion:</p></label>
    <div class="col-sm-12 col-md-12 col-lg-12">
      <input class="form-control" type="text" name="dir" id="dir" placeholder="Calle ejemplo Mz 00 Lt 00 Cidudad de Mexico">
    </div>
    <div class="errorAlert errorDir" style="display: none;">este campo esta vacio</div>
  </div>
  <div class="form-group row">
    <label for="mess" class="col-sm-12 col-md-12 col-lg-12 col-form-label "><p class=" d-inline-block text-light bg-dark">Mensaje</p></label>
    <div class="col-sm-12 col-md-12 col-lg-12">
       <textarea class="form-control" id="mess" name="mess" rows="5" placeholder="Escribe tu mensaje ..."></textarea>
    </div>
    <div class="errorAlert errorMensaje" style="display: none;">este campo esta vacio</div>
  </div>
<br>
<!-- <input class="submit" type="submit" value="Submit"> -->
<button id="btnEnviarCorreo" class="btn btn-success btn-lg">Enviar</button>
<br>
<div class="alert" id="errorEmail" style="display: none;"></div>
<br>
  </div>
  </div>
</div>


</div><br>
  <!-- Image Section - set the background image for the header in the line below -->
    <div class="container">
      <br><br>
          <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
         <div class="carousel-item active">
          <img class="d-block w-100" style="width: 100px; height: 300px;" src="images/banner50.png" alt="FERRETERA RIO PISUEÑA SA DE CV">

        </div>
        <div class="carousel-item">
          <img class="d-block w-100" style="width: 100px; height: 300px;" src="images/banner61.png" alt="FERRETERA RIO PISUEÑA SA DE CV">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" style="width: 100px; height: 300px;" src="images/banner52.png" alt="FERRETERA RIO PISUEÑA SA DE CV">
        </div>
           <div class="carousel-item">
          <img class="d-block w-100" style="width: 100px; height: 300px;" src="images/banner53.png" alt="FERRETERA RIO PISUEÑA SA DE CV">
        </div>
          <div class="carousel-item">
          <img class="d-block w-100" style="width: 100px; height: 300px;" src="images/banner60.png" alt="FERRETERA RIO PISUEÑA SA DE CV">
        </div>
        
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
      </a>
    </div>
              </div>
<br><br>


<?php
include "views/modules/footer.php";
?>