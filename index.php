<?php
require_once "models/enlaces.php";
require_once "models/catLineaSub.php";
require_once 'models/modeloBd.php';
require_once "models/productosModels.php";

require_once "controllers/enlaces.php";
require_once "controllers/template.php";
require_once "controllers/articulosController.php";
require_once "controllers/productoscontrollers.php";
require_once "controllers/validacion.php";
require_once "controllers/categorias.php";


// require_once "controllers/NumeroALetras.php";


$template = new TemplateController();
$template -> template();