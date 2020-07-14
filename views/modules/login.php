<div class="main">
   <div class="contenedorLoguin">
      <center>
         <div class="middle">
            <div id="login">
               <form>
                  <fieldset class="clearfix">
                     <p ><span class="fa fa-user"></span><input type="text" id="user"  Placeholder="Usuario" required></p> 
                     <!-- <p><span class="fa fa-lock"></span><input type="password" id="pass"  Placeholder="Contraseña" required></p> -->
                     <p><span class="fa fa-lock"></span><input type="password" id="pass" class="form-control" class="input-block-level" data-toggle="tooltip" title="MAYUS ACTIVADA" data-trigger="manual" data-title="La tecla Bloq Mayús está activada" placeholder="Contraseña" autocomplete="off" required></p>
                     <div>
                        <span style="width:48%; text-align:left;  display: inline-block;"><a class="small-text" href="#"></a></span>
                        <span style="width:50%; text-align:right;  display: inline-block;"><input type="submit" id="sigin" value="Sign In"></span>
                     </div>
                  </fieldset>
                  <div class="clearfix error_validacion"></div>
               </form>
               <div class="clearfix errorVacio"></div>
            </div> <!-- end login -->
            <div class="logo">
               <figure>
                  <figcaption>
                     <h2>INICIAR SESSION</h2>
                  </figcaption>
                  <img src="<?=base_url?>images/logo.png" alt="logotipo rio pisueña">
               </figure>
            </div>
         </div>
      </center>
   </div>
</div>