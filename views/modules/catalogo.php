<?php
include "views/modules/header.php";
require_once 'helpers/utils.php';
?>
<div class="container">
	<div class="catlist" id="catlist">
		<div id="tituloCatalogo"><h3>MI CATALOGO</h3></div>
		<?php if(isset($_SESSION['carrito'])): 
			$carrito = $_SESSION['carrito'];
		?>

		<table class="table table-hover">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">IMAGEN</th>
		      <th scope="col">NOMBRE</th>
		      <th scope="col">ELIMINAR</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$contador = 1;
		  	 foreach ($carrito as $indice => $elemento):
		  	 	$producto = $elemento['producto'][0];
		        $disponible = Utls::existImg($producto['fotoProdcuto']);
		  	  ?>
		  	<tr>
		      <th scope="row"><?=$contador;?></th>
		      <td><img class="card-img-top" src="<?=$disponible?>" alt=""></td>
		      <td style="text-align: center;"><?=$producto['nombreProducto']?></td>
		      <td><button class="spinnerWhite" data-id="<?=$indice?>">ELIMINAR</button></td>
		    </tr>
		  	<?php 
		  		$contador ++;
		  	endforeach; ?>
		  </tbody>
		</table>
		<div class="botones">
			<button type="button" class="btn btn-outline-danger" data-id="carrito" id="vaciar">VACIAR <i class="fa fa-trash-o" aria-hidden="true"></i></button>
			<button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#fillFormToSentCat">IMPRIMIR <i class="fa fa-print" aria-hidden="true"></i></button>
			<!-- <button type="button" class="btn btn-outline-primary" name="print" id="print">IMPRIMIR <i class="fa fa-print" aria-hidden="true"></i></button> -->
		</div>
			<?php else: ?>
			<table class="table tableEmpty">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">IMAGEN</th>
		      <th scope="col">NOMBRE</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<tr>
		      <td colspan="5">SELECCIONA UN ARTÍCULO, PARA AGREGAR AL LA LISTA</td>
		    </tr>
		  </tbody>
		</table>
		<?php endif;?>
	</div>
</div>
<?php
// if(isset($_POST["borrar"])){
// 	$borrar = new CatalogoController();
// 	$borrar->delete_all();

//}
include "views/modules/footer.php";
?>


<div class="modal fade" id="fillFormToSentCat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">COMPLETA PARA ENVIAR CATALOGO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form>
		  <div class="form-group row">
	      	<label for="Inputname" class="col-sm-12 col-form-label">NOMBRE COMPLETO</label>
	      	<div class="col-sm-12">
	         <input type="text" class="form-control" id="Inputname" placeholder="JUAN PEREZ">
	      	</div>
	      	<div class="nameError"></div>
	      </div>
		  <div class="form-group row">
		    <label for="inputEmail" class="col-sm-12 col-form-label">Email</label>
		    <div class="col-sm-12">
		      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
		    </div>
		    <div class="emailError"></div>
		  </div>
		</form>

	 </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" id="cancel" data-dismiss="modal">Cancelar</button>
       <button type="button" class="btn btn-primary" name="print" id="print">Enviar</button>
     </div>
    </div>
  </div>
</div>