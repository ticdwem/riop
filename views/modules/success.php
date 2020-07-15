<?php

include "views/modules/header.php";
require_once 'helpers/utils.php';
require_once 'config/parameters.php';


 
if(!empty($_GET["n"])){
    $n = $_GET["n"];
    switch($n){
        case 'registro':
?>
            <script type="text/javascript">
                Swal.fire({
                  title: 'SUCCESS',
                  text: "USUARIO INGRESADO CORRECTAMENTE",
                  icon: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ACEPTAR'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = getAbsolutePath()+"registro";
                  }
                })
            </script>;
<?php
            break;
        case 'email':
             Utls::deleteSession('carrito');
 ?>
            <script type="text/javascript">
                Swal.fire({
                  title: 'SUCCESS',
                  text: "CORREO ENVIADO CORRECTAMENTE",
                  icon: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ACEPTAR'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = getAbsolutePath()+"inicio";
                  }
                })
            </script>;
<?php 
            break;
        case 'xlsx':
             Utls::deleteSession('carrito');
 ?>
            <script type="text/javascript">
                Swal.fire({
                  title: 'SUCCESS',
                  text: "SE HA MODIFICADO CORRECTAMENTE",
                  icon: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ACEPTAR'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = getAbsolutePath()+"updateDatos";
                  }
                })
            </script>;
<?php 
            break;
        default:
?>
            <script type="text/javascript">
                Swal.fire({
                  title: '?',
                  text: "ALGO PASO ...",
                  icon: 'question',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ACEPTAR'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = getAbsolutePath()+"inicio";
                  }
                })
            </script>;
<?php 
            break;
            
    }
 
}else{
 ?>
            <script type="text/javascript">
                Swal.fire({
                  title: 'X',
                  text: "PAGINA NO VÁLIDA",
                  icon: 'error',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ACEPTAR'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = getAbsolutePath()+"inicio";
                  }
                })
            </script>;
<?php
}

include "views/modules/footer.php";

