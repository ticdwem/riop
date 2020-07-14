<?php
include_once 'sesion_cehck.php';
include "views/modules/menulateral.php";
?>
 <div id="content" class="p-4 p-md-5 pt-5">
 <div class="tituloreg">
    <h2>REGISTRO DE USUARIO</h2>
</div>
<div class="formulario">
<form method="post">
    <div class="form-group"> 
        <label for="full_name_id" class="control-label">Nombre (s)</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="John Deer">
    </div>

    <div class="form-group">
        <label for="street1_id" class="control-label">Apellidos</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Fernández ">
    </div>                   
                            
    <div class="form-group">
        <label for="street2_id" class="control-label">Nombre Usuario</label>
        <input type="text" class="form-control" id="nameUser" name="nameUser" placeholder="juan12">
        <div class="valid-feedback" id="message">          
        </div>
    </div>    

    <div class="form-group">
        <label for="city_id" class="control-label">Password</label>
        <div class=" input-group">        
            <input type="password" class="form-control" id="passUser" name="password" placeholder="PassWord123#">
            <div class="input-group-prepend extaInfo">
                <i class="fas fa-eye-slash fa-3x icon" id="showPass"></i>
            </div>
        </div>
    </div>                   
    <div class="form-group">
        <label for="state_id" class="control-label">Tipo Usuario</label>
        <select class="form-control" id="tu" name="tu">
            <option value="1">Adminstrador</option>
            <option value="2">invitado</option>
        </select>                    
    </div>
    
    <div class="form-group">
        <label for="zip_id" class="control-label">E-mail</label>
        <input type="email" class="form-control" id="zip_id" name="email" placeholder="ejemplo@expample.com">
    </div>        
    
    <div class="form-group botones">
        <button type="submit" class="btn btn-primary save" name="guardar">GUARDAR</button>
        <button type="button" class="btn btn-outline-danger">CANCELAR</button>
    </div>     
    
</form>
<?php
   $insert = new Saveuser();
   $insert -> guardarUser();
?>
</div>
 </div>
</div>
<?php
include "views/modules/footer.php";
?>