<?php
include_once 'sesion_cehck.php';
include "views/modules/menulateral.php";
?>
 <div id="content" class="p-4 p-md-5 pt-5">
 <div class="tituloreg">
    <h2>ESCOGE UNA CATEGORIA PARA MODIFICAR</h2>
</div>
<div class="categoriasExceldownload">
	<div class="catExcelD"><a href="<?=base_url?>selectRowExcel/marca"><img src="<?=base_url?>images/marcas.png" alt="marcas"></a></div>
	<div class="catExcelD"><a href="<?=base_url?>selectRowExcel/sublinea"><img src="<?=base_url?>images/sublinea.png" alt="sublinea"></a></div>
	<div class="catExcelD"><a href="<?=base_url?>selectRowExcel/proveedor"><img src="<?=base_url?>images/proveedor.png" alt="proveedor"></a></div>
	<div class="catExcelD"><a href="<?=base_url?>selectRowExcel/linea"><img src="<?=base_url?>images/linea.png" alt="linea"></a></div>
</div>
 </div>
</div>
<?php
include "views/modules/footer.php";
?>