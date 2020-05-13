<?php 
/**
 * 
 */
class Productos
{
	private $VDato;
	private $VDPersonal;
	public  $tabla1;
	public  $tabla2;

	public function mostrarProductos($datos){
		require_once "vendor/autoload.php";
		require_once 'models/modeloBd.php';

		$dato = $this->VDato = $datos;
		$tbl1 = $this->tabla1 = 'productos';

		$where = "";
		if(strlen($dato)>1){
			$validar = new Validacion();
			$veamos = $validar->pregmatchletras($dato);
			if($veamos == '0'){
				echo "DATOS INCORRECTOS, PRUEBA UNA VEZ MAS";
				die();
			}else{
				$where = " WHERE nombreProducto LIKE '%{$veamos}%'";
			}
		}
		$am = new ModeloBase();
		$todosUs = $am->conseguirTodos($tbl1,$where);
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
		$empiezaAqui = (($page-1)*$numero_elementos_pagina);
		$todpPagination = $pagTion->conseguirTodosPagination($tbl1,$empiezaAqui,$numero_elementos_pagina,$where);
		if($numElementos != 0 ){
			foreach ($todpPagination as $mostrar) {				
			?> 
	         <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
	         <div class="card h-100">
	            <a href="?p=taladro"><img class="card-img-top" src="http://www.riopisuena.com.mx/images/logo1.png" alt="">
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
		require_once 'models/modeloBd.php';

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
	         <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
	         <div class="card h-100">
	            <a href="?p=taladro"><img class="card-img-top" src="http://www.riopisuena.com.mx/images/logo1.png" alt="">
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
}


