<?php
include "views/modules/header.php";
?>
<div class="container">  
  <div class="card border-0 shadow my-5"> 
    <div class="card-body p-5">
      <div class="row">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
             <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100"style="width: 100px; height:350px;"  src="images/banner.png" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" style="width: 100px; height: 350px;"  src="images/bann-catalogo3.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" style="width: 100px; height: 350px;" src="images/bann-catalogo5.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
        <form action="<?php echo htmlspecialchars('catalogo-productos');?>" method="get" id="frmFormSerarching">
          <div class="input-group bus-bar input-group-lg">
            <input type="text" class="form-control" id="buscarInput" placeholder="Busqueda de producto" aria-label="" name="buscar" aria-describedby="button-addon2" autocomplete="off">
            <div class="errorInput"></div>
            <div class="input-group-append">
             <!-- <button class="btn btn-outline-danger" type="button" id="btn_buscar"><i class="fa fa-search" aria-hidden="true"></i></button>-->
             <input type="submit" class="btn btn-outline-danger" id="btn_buscar" value="BUSCAR"><i class="fa fa-search" aria-hidden="true"></i>
            </div>
          </div>
        </form>
      </div>     
      <div style="height:100%">  
        <div class="row check-all">
          <div class="card bus-check card-body col-lg-4">
            <p class="text-center">LINEA</p>
            <div class="row" id="Dvlinea">
              <?php
                $ln = new LineaSublinea();
                $ln->getCategoria();
               ?>

            </div>
          </div>
          <div class="card bus-check card-body col-lg-4">
            <p class="text-center">SUBLINEA CAMBIAR DESPUES PLEASE</p>
            <div class="row" id="Sublinea">
            </div>
            <button type="button" class="btn btn-outline-success" id="btnBuscarPreciso" style="display: none;">BUSCAR</button>
          </div>
               <div class="card bus-check3 card-body col-lg-4">
                 <p class="text-center">LINEA</p>
            <div class="row">
            <div class="form-check col-lg-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">CARPINTERIA</label>
            </div>
            <div class="form-check col-lg-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">PLOMERIA</label>
            </div>
            <div class="form-check col-lg-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">ALBAÑILERIA</label>
            </div>
            <div class="form-check col-lg-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">ABRASIVOS</label>
            </div>
            <div class="form-check col-lg-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">HERRAMIENTA</label>
            </div>
             <div class="form-check col-lg-6">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">ELECTRICO</label>
            </div>
            </div>
          </div>
        </div>
        <div class="row">
        <?php
        $dato = "";
        if(isset($_GET["buscar"])) {
          $dato = $_GET['buscar'];
          $m = new Productos();
          $m->mostrarProductos($dato);
         }elseif (isset($_GET["sublinea"])) {
          $dato = $_GET['sublinea'];
          $m = new Productos();
          $m->mostrarPersonalizado($dato);
         }else{
           $m = new Productos();
           $m->mostrarProductos($dato);
        }
        ?>
        </div>


        </div>
      </div>
        
    </div>
  </div>
</div>

<?php
include "views/modules/footer.php";
?>