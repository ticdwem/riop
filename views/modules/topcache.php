<?php
// Settings
$cachedir = 'helpers/cache/';   // directorio de cache
$cachetime = 86400;   // duración del cache
$cacheext = 'html';   // extensión de cache
// script a procesar
$cachepage = $_SERVER["REQUEST_URI"];
$cachefile = $cachedir.md5($cachepage).'.'.$cacheext;
// calculamos el tiempo del cache
if (@file_exists($cachefile)) {
    $cachelast = @filemtime($cachefile);
} else {
    $cachelast = 0;
}
@clearstatcache();
// Mostramos el archivo si aun no vence
if (time() - $cachetime < $cachelast) {
    @readfile($cachefile);
    exit();
}
ob_start();
?>