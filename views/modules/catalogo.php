<?php
include "views/modules/header.php";
require_once 'helpers/utils.php';
?>
<div class="container">
	<div class="catlist">
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
		      <th scope="col">PRECIO</th>
		      <th scope="col">UNIDADES</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$contador = 1;
		  	 foreach ($carrito as $indice => $elemento):
		  	 	//var_dump($elemento);
		  	 	$producto = $elemento['producto'][0];
		        $disponible = Utls::existImg($producto['fotoProdcuto']);
		  	  ?>
		  	<tr>
		      <th scope="row"><?=$contador;?></th>
		      <td><img class="card-img-top" src="<?=$disponible?>" alt=""></td>
		      <td><?=$producto['nombreProducto']?></td>
		      <td><?=$elemento['precio'];?></td>
		      <td><?=$elemento['unidades'];?></td>
		    </tr>
		  	<?php 
		  		$contador ++;
		  	endforeach; ?>
		  </tbody>
		</table>
			<form method="post">
			<button name="borrar">VACIAR CARRITO</button>
			</form>
			<?php else: ?>
			<table class="table tableEmpty">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">IMAGEN</th>
		      <th scope="col">NOMBRE</th>
		      <th scope="col">PRECIO</th>
		      <th scope="col">UNIDADES</th>
		      <th scope="col">ACCIÓN</th>
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
if(isset($_POST["borrar"])){
	$borrar = new CatalogoController();
	$borrar->delete_all();

}
include "views/modules/footer.php";
?>