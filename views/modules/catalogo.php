<?php
include "views/modules/header.php";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";


?>
	<form method="post">
	<button name="borrar">borrar sesison</button>
	</form>
<?php
if(isset($_POST["borrar"])){
	$borrar = new CatalogoController();
	$borrar->delete_all();

}
include "views/modules/footer.php";
?>