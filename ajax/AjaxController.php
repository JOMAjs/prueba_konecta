<?php 

require_once "../controllers/EmpleadoController.php";
require_once "../controllers/SolicitudController.php";
require_once "../models/solicitud.php";
require_once "../models/empleado.php";


class AjaxController {

    public $solicitud_id;
    public $empleado_id;

    public function ToolsEmpleado()
    {
        $val  = $this->empleado_id;
        $res = EmpleadoController::listarEmpleados($val);
        echo json_encode($res);
    }

    public function ToolsSolicitud()
    {
        $val  = $this->solicitud_id;
        $ress = SolicitudController::listarSolicitud($val);
        echo json_encode($ress);
    }


}



if(isset($_POST["empleado_id"])){

	$areas = new AjaxController();
	$areas -> empleado_id = $_POST["empleado_id"];
	$areas -> ToolsEmpleado();
}

if(isset($_POST["solicitud_id"])){

	$areas2 = new AjaxController();
	$areas2 -> solicitud_id = $_POST["solicitud_id"];
	$areas2 -> ToolsSolicitud();
}