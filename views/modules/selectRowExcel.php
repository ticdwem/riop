<?php
include "views/modules/menulateral.php";
?>
 <div id="content" class="p-4 p-md-5 pt-5">
 <div class="tituloreg">
    <h2>FILAS SELECCIONADAS PARA DESCARGAR</h2>
</div>
<!-- <form action="controllers/updateCatalogo.php" method="post"> -->
<input type="hidden" name="get" id="get" value="<?=$_GET['n']?>">
<div class="selectRows">
	<div class="form-group row">
		<div class="col-sm-10">
			<div class="form-check" >
				<input class="form-check-input" type="checkbox" id="codigo" name="checkrowExcel[]" value="codigoProducto" checked >
				<label class="form-check-label" for="codigo">
					CODIGO PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="NombreP" name="checkrowExcel[]" value="nombreProducto" checked >
				<label class="form-check-label" for="NombreP">
					NOMBRE PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="descripcion" name="checkrowExcel[]" value="descripcionProducto" checked>
				<label class="form-check-label" for="descripcion">
					DESCRIPCIÓN PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="modelo" name="checkrowExcel[]" value="modeloProducto" checked >
				<label class="form-check-label" for="modelo">
					MODELO PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="sku" name="checkrowExcel[]" value="skuProducto" checked  >
				<label class="form-check-label" for="sku">
					SKU PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="csat" name="checkrowExcel[]" value="codigoSatProductos" checked  >
				<label class="form-check-label" for="csat">
					CODIGO SAT PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="precio" name="checkrowExcel[]" value="precio" checked  >
				<label class="form-check-label" for="precio">
					PRECIO PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="unidad" name="checkrowExcel[]" value="unidadBaseProducto" checked  >
				<label class="form-check-label" for="unidad">
					UNIDAD PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="prove" name="checkrowExcel[]" value="idProveedorProducto" checked  >
				<label class="form-check-label" for="prove">
					PROVEEDOR PRODUCTO
				</label>
			</div>
		</div>
	</div>
</div>
<div class="idAlgo">
	<select class="form-control form-control-lg" name="datos">
	<?php 
		$reciveGet;
		if(isset($_GET['n'])){$reciveGet = $_GET['n'];}
		$mira = new LineaSublinea();
		$mira->showbrand($reciveGet);
	 ?>
	</select>
</div>
	<div class="boto">
		<button id="sendCheckbox">GENERAR</button>
		<!-- <input type="submit" name="todo" values="GENERAR"> -->
	</div>
<!-- </form> -->
 </div>
</div>
<?php


include "views/modules/footer.php";
?>

