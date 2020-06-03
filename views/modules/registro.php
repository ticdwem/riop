<?php
include "views/modules/menulateral.php";
?>
 <div id="content" class="p-4 p-md-5 pt-5">
 <div class="tituloreg">
    <h2>REGISTRO DE USUARIO</h2>
</div>
<div class="formulario">
<form action="" method="post">
    <div class="form-group"> 
        <label for="full_name_id" class="control-label">Nombre (s)</label>
        <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
    </div>

    <div class="form-group">
        <label for="street1_id" class="control-label">Apellidos</label>
        <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Fernández ">
    </div>                   
                            
    <div class="form-group">
        <label for="street2_id" class="control-label">Nombre Usuario</label>
        <input type="text" class="form-control" id="street2_id" name="street2" placeholder="juan12">
    </div>    

    <div class="form-group">
        <label for="city_id" class="control-label">Password</label>
        <div class=" input-group">        
            <input type="password" class="form-control" id="passUser" name="city" placeholder="PassWord123#">
            <div class="input-group-prepend extaInfo">
                <i class="fas fa-eye-slash fa-3x icon" id="showPass"></i>
            </div>
        </div>
    </div>                   
    <div class="form-group">
        <label for="state_id" class="control-label">Tipo Usuario</label>
        <select class="form-control" id="state_id">
            <option value="AL">Adminstrador</option>
            <option value="AK">invitado</option>
        </select>                    
    </div>
    
    <div class="form-group">
        <label for="zip_id" class="control-label">E-mail</label>
        <input type="text" class="form-control" id="zip_id" name="zip" placeholder="ejemplo@expample.com">
    </div>        
    
    <div class="form-group botones">
        <button type="submit" class="btn btn-primary save">GUARDAR</button>
        <button type="button" class="btn btn-outline-danger">CANCELAR</button>
    </div>     
    
</form>
</div>
 </div>
</div>







<?php
include "views/modules/footer.php";
?>