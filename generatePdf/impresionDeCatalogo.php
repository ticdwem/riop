<?php session_start();?>
<?php if(isset($_SESSION['carrito'])){
			$carrito = $_SESSION['carrito'];

require_once '../config/parameters.php';
require_once '../helpers/utils.php';
		?>
<page backtop="35mm" backbottom="8mm" backleft="8mm" backright="12mm">
	<page_header>
		<div id="header">
		 	<div class="nombrePag" style=" position: relative; width: 50%; left: 30%;">
		 		<h2 >CATALOGO FERRETERIA RIO PISUEÑA</h2>
		 	</div>
		 	<div style="width: 88%; border:1px solid black;"></div>
		 	<div class="imagenLogo">
		 		<img src="../images/logo.png" alt="imagenRioPiseña">
		 	</div>     
	    </div>
	</page_header>
 
	<page_footer>
		<table width="1100" height="50">
			<tr>
				<th width="1000" height="20" valign="middle">Copyright © FERRETERA RIO PISUEÑA, S.A. DE C.V. |Aviso de Privacidad</th>
			</tr>
		</table>
	</page_footer>
<div>
	<div class="contenedor">
			<?php
		  	 foreach ($carrito as $indice => $elemento){
		  	 	//var_dump($elemento);
		  	 	$producto = $elemento['producto'][0];
		        $disponible = Utls::existImg($producto['fotoProdcuto']);
		        $modelo = Utls::existModelo($producto['modeloProducto']);
		        
		  	  ?>
		  	  <div class="imagen">
		  	  	<img src="<?=$disponible?>" alt="">
		  	  	<div class="description">
		  	  		<p class="descr" id="name" style="border:1px solid red;margin:0px;"><?=$producto['nombreProducto']?></p>
		  	  		<p class="descr" id="des" style="border:1px solid red;lmargin:0px"><?=$producto['descripcionProducto']?></p>
		  	  		<p class="descr" id="modelo" style="border:1px solid red;margin:0px;">modelo: <?=$modelo?></p>
		  	  		<p class="descr" id="marca" style="border:1px solid red;margin:0px;">marca: <?=$producto['nombreMarca']?></p>
		  	  	</div>
		  	  </div>
		  	<?php } ?>
		
	</div>
</div>
</page>
<?php } ?>