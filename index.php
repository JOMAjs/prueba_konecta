<?php 
/////////////// controladores /////////////////////////////
require_once "controllers/PlantillaController.php";
require_once "controllers/EmpleadoController.php";
require_once "controllers/SolicitudController.php";


/////////////// modelos ///////////////////////////////////////
require_once "models/Empleado.php";
require_once "models/Solicitud.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();

//include "vistas/modulos/inicio.php";