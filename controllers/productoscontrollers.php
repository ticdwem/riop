<?php 
/**
 * mike trujillo
 */
class Productos
{
	private $VDato;
	private $VDPersonal;
	public  $tabla1;
	public  $tabla2;
	private $where;
	public $mira;

	public function mostrarProductos($datos){
		require_once "vendor/autoload.php";
		require_once 'models/modeloBd.php';

		$dato = $this->VDato = $datos;
		$tbl1 = $this->tabla1 = 'productos';
		$whereComplemett = $this->where = "";

		if(strlen($dato)>1){
			$validar = new Validacion();
			$veamos = $validar->pregmatchletras($dato);
			if($veamos == '0'){
				echo "DATOS INCORRECTOS, PRUEBA UNA VEZ MAS";
				die();
			}else{
				$whereComplemett = $this->where = " WHERE nombreProducto LIKE '%{$veamos}%'";
			}
		}
		
		$am = new ModeloBase();
		$am->setWhere($whereComplemett);
		$todosUs = $am->conseguirTodos($tbl1);

		$numero_elementos_pagina = 16;

		$numElementos =count($todosUs);
		// hacer pagination
		$pagination = new Zebra_Pagination();

		// numero total de elementos a paginar
		$pagination->records($numElementos);

		// numero de elementos por pagina
		$pagination->records_per_page($numero_elementos_pagina);
		$page = $pagination->get_page();

		$pagTion = new ProductosModels();
		$pagTion->setInicioPag(($page-1)*$numero_elementos_pagina);
		$pagTion->setWhereCTP($whereComplemett);
		$todpPagination = $pagTion->conseguirTodosPagination($tbl1,$numero_elementos_pagina);
		if($numElementos != 0 ){
			foreach ($todpPagination as $mostrar) {				
			?> 
	         <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
	         <div class="card h-100">
	            <a href="producto/<?php echo $mostrar["codigoProducto"]?>"><img class="card-img-top" src="<?php echo $mostrar["fotoProdcuto"]; ?>" alt="">
	             <div class="card-body">
	              <h4 class="card-title">
	              	<?php //echo Validacion::guionEnTexto($mostrar["nombreProducto"]); ?>
	              	<?php echo $mostrar["nombreProducto"]; ?>
	              </h4>
	              <p class="card-text">MODELO: <?php echo $mostrar["modeloProducto"]; ?></p>
	            </div>
	            </a>
	          </div>
	        </div>
			<?php
			}
		}else{
			echo '<div class="alert alert-danger" role="alert">LO SENTIMOS NO SE HAN ENCNTRADO RESULTADOS</div>';
		}
		$pagination->render();
		$paginasTotales =  $numElementos / $numero_elementos_pagina;
		$paginas;
		if(!isset($_GET["page"])){$paginas = 1;}else{$paginas = $_GET["page"];}

		echo '<p class="">ENCONTRADOS '.$numElementos.' RESULTADOS | PAGINA '.$paginas. ' DE '.ceil($paginasTotales).'</p>';	
	}

	public function mostrarPersonalizado($bPer){
		require_once "vendor/autoload.php";
		require_once "models/productosModels.php";

		$VDPersonal = $this->VDato = $bPer;
		$tbl1 = $this->tabla1='sublinea';
		$tbl2 = $this->tabla2='productos';

		$validar = new Validacion();
		$valTF = $validar->pregmatchletras($VDPersonal);
		if($valTF == '0'){
			echo '<div class="alert alert-danger" role="alert">DATOS INCORRECTOS PRUEBA UNA VEZ MÁS</div>';
			die();
		}

		$am = new ProductosModels();
		$am->setnomsb($valTF);
		$personalizado = $am->getTodos($tbl1,$tbl2,$valTF);
		$numero_elementos_pagina = 16;

		$numElementos =count($personalizado);
		// hacer pagination
		$pagination = new Zebra_Pagination();

		// numero total de elementos a paginar
		$pagination->records($numElementos);

		// numero de elementos por pagina
		$pagination->records_per_page($numero_elementos_pagina);
		$page = $pagination->get_page();

		$pagTion = new CatLineaSub();
		$empiezaAqui = (($page-1)*$numero_elementos_pagina);
		$todpPagination = $pagTion->getPersonalizado($tbl1,$tbl2,$valTF,$empiezaAqui,$numero_elementos_pagina);

		if($numElementos != 0 ){
			foreach ($todpPagination as $mostrar) {				
			?> 
	         <div class="col-lg-3 col-md-4 col-sm-6 mb-4" >
	         <div class="card h-100">
	            <a href="producto/<?php echo $mostrar["codigoProducto"];?>"><img class="card-img-top" src='<?php echo $mostrar["fotoProdcuto"]; ?>' alt="">
	             <div class="card-body">
	              <h4 class="card-title">
	              	<?php echo $mostrar["nombreProducto"]; ?>
	              </h4>
	              <p class="card-text">MODELO: <?php echo $mostrar["modeloProducto"]; ?></p>
	            </div>
	            </a>
	          </div>
	        </div>
			<?php
			}
		}else{
			echo '<div class="alert alert-danger" role="alert">LO SENTIMOS NO SE HAN ENCONTRADO RESULTADOS DE "'.strtoupper($_GET["sublinea"]).'"</div>';
		}
		$pagination->render();
		$paginasTotales =  $numElementos / $numero_elementos_pagina;
		$paginas;
		if(!isset($_GET["page"])){$paginas = 1;}else{$paginas = $_GET["page"];}

		echo '<p class="">ENCONTRADOS '.$numElementos.' RESULTADOS | PAGINA '.$paginas. ' DE '.ceil($paginasTotales).'</p>';

		
	}

	public function mostrarProducto($nombre){
		require_once 'models/modeloBd.php';
		$productoName = $this->VDPersonal = $nombre;
		$whereComplemett;

		if(strlen($productoName)>1){
			$validar = new Validacion();
			$veamos = $validar->valornumerico($productoName);
			if($veamos == '0'){
				echo "DATOS INCORRECTOS, PRUEBA UNA VEZ MAS";
				die();
			}
		}

		$productoO = new CatLineaSub();
		$mostrarP = $productoO->getProductSpecifict($veamos,'productos','marca','sublinea');
		?> 
        <div class="card mt-4">
          <img class="card-img-top img-fluid" src="<?php echo $mostrarP[0]["fotoProdcuto"] ?>" alt="">
          <div class="card-body">
            <h3 class="card-title"><?php echo $mostrarP[0]["nombreProducto"];?></h3>
			
			<div class="form-group row">
				<label for="">MODELO:</label>
				<p class="card-text"><?=$mostrarP[0]["modeloProducto"]?></p>			
			</div>
			<div class="form-group row">
				<label for="">MARCA:</label>
				<p class="card-text"><?=$mostrarP[0]["nombreMarca"]?></p>
			</div>
			<div class="form-group row">
				<label for="">SKU:</label>
				<p class="card-text"><?=$mostrarP[0]["skuProducto"]?></p>
			</div>
			<div class="form-group row">
				<label for="">UNIDAD:</label>
				<p class="card-text"><?=$mostrarP[0]["unidadBaseProducto"]?></p>
			</div>
			<div class="form-group row">
				<label for="">SUBLINEA:</label>
				<p class="card-text"><?=$mostrarP[0]["nombreSublinea"]?></p>
			</div>
            <button class="btn btn-success">AGEGAR A MI CATÁLOGO</button>
            <p class="card-text"><?php echo $mostrarP[0]["descripcionProducto"];?></p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
		<?php

	}
}


