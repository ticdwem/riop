<?php
include "views/modules/menulateral.php";
?>
 <div id="content" class="p-4 p-md-5 pt-5">
 <div class="tituloreg">
    <h2>ESCOGE LAS FILAS QUE DESEAS MODIFICAR</h2>
</div>
<input type="hidden" name="get" id="get" value="<?=$_GET['n']?>">
<div class="selectRows">
	<div class="form-group row">
		<div class="col-sm-10">
			<div class="form-check" >
				<input class="form-check-input" type="checkbox" id="codigo" name="codigoProducto" value="codigoProducto" checked disabled>
				<label class="form-check-label" for="codigo">
					CODIGO PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="NombreP" name="nombreProducto" value="nombreProducto">
				<label class="form-check-label" for="NombreP">
					NOMBRE PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="descripcion" name="descripcionProducto" value="descripcionProducto">
				<label class="form-check-label" for="descripcion">
					DESCRIPCIÓN PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="modelo" name="modeloProducto" value="modeloProducto">
				<label class="form-check-label" for="modelo">
					MODELO PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="sku" name="skuProducto" value="skuProducto">
				<label class="form-check-label" for="sku">
					SKU PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="csat" name="codigoSatProductos" value="codigoSatProductos">
				<label class="form-check-label" for="csat">
					CODIGO SAT PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="precio" name="precio" value="precio">
				<label class="form-check-label" for="precio">
					PRECIO PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="unidad" name="unidadBaseProducto" value="unidadBaseProducto">
				<label class="form-check-label" for="unidad">
					UNIDAD PRODUCTO
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="prove" name="idProveedorProducto" value="idProveedorProducto">
				<label class="form-check-label" for="prove">
					PROVEEDOR PRODUCTO
				</label>
			</div>
		</div>
	</div>
		<div class="idAlgo">

			<?php 
				$reciveGet;
				if(isset($_GET['n'])){$reciveGet = $_GET['n'];}
				$mira = new LineaSublinea();
				$mira->showbrand($reciveGet);
			 ?>
		</div>
		<div class="boto">
			<button id="sendCheckbox">GENERAR</button>
		</div>
</div>
 </div>
</div>







<?php
include "views/modules/footer.php";
?>