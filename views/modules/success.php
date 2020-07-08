<?php

include "views/modules/header.php";
require_once 'helpers/utils.php';
require_once 'config/parameters.php';

 Utls::deleteSession('carrito');
?>
<div class="container">
	<div class="catlist" id="catlist">
		<div class="enviado">
			<figure>
				<figcaption>
					<h2>CORREO ENVIADO</h2>
				</figcaption>
				<img src="<?=base_url?>images/correoEnviado.png" alt="https://pixabay.com/es/vectors/correo-electr%C3%B3nico-r%C3%A1pido-servicio-1975010/">
			</figure>
		</div>
	</div>
</div>
<?php
include "views/modules/footer.php";

?>
<script type="text/javascript">
             setTimeout("location.href='http://192.168.1.69/final-catalogo'", 3000);
            </script>;