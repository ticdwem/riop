<?php  
if (!isset($_SESSION["usuario"])) {
	 	echo '<script type="text/javascript">';
        echo ' window.location.href = getAbsolutePath()+"error404"';
        echo '</script>';
} 