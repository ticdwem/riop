<?php
include "views/modules/menulateral.php";
?>
 <div id="content" class="p-4 p-md-5 pt-5">
 <div class="tituloreg">
    <h2>ESCOGE TU ARCHIVO</h2>
</div>
<div class="formulario">
<form method="post" enctype="multipart/form-data" id="filesForm">
    <div class="">
        <input type="file" class="form-control" name="fileContacts">
        <button type="button" id="uploadData" class="btn btn-primary">CARGAR</button>
        <div class="spinnerWhite"></div>
    </div>
    
</form>
</div>
 </div>
</div>







<?php
include "views/modules/footer.php";
?>