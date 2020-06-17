<?php
include "views/modules/header.php";
?>
  <!-- Page Content -->
  <div class="container">

    <div class="prod-stilo row">

      <div class="col-lg-12">
          <form class="bar-bus" action="<?php echo htmlspecialchars(base_url.'catalogo-productos');?>" method="get" id="frmFormSerarching">
          <div class="input-group input-group-lg">
            <input type="text" class="form-control" id="buscarInput" placeholder="Busqueda de producto" aria-label="" name="buscar" aria-describedby="button-addon2" autocomplete="off">
            <div class="errorInput"></div>
            <div class="input-group-append">
             <!-- <button class="btn btn-outline-danger" type="button" id="btn_buscar"><i class="fa fa-search" aria-hidden="true"></i></button>-->
           <!--   <input type="submit" class="btn btn-outline-danger" id="btn_buscar" value="BUSCAR"> -->
            </div>
          </div>
        </form>
        </div>

      <!-- <div class="col-lg-3"> -->
     <!--    <h1 class="my-4"></h1> -->
      <!--   <div class="list-group">
            <a href="#" class="list-group-item active">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
        </div> 
      </div>-->
      <!-- /.col-lg-3 -->

      <div class="prod-vis col-lg-12">
      <?php
       $name = "";
        if(isset($_GET["n"])){
            $name = $_GET["n"];
           $pr = new Productos();
           $pr->mostrarProducto($name);
        }else{
            echo "debes ingresar un producto";
        }
      ?>

        <!-- /.card -->
<!-- 
         <div class="card card-outline-secondary my-4">
          <div class="card-header">
            Product Reviews
          </div>
          <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
            <small class="text-muted">Posted by Anonymous on 3/1/17</small>
            <hr>
            <a href="#" class="btn btn-success">Leave a Review</a>
          </div>
        </div> -->
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->
    </div>

  </div>
<?php
include "views/modules/footer.php";
?>