<?php 
$data = array();

class EmpleadoController {

    static public function ctrEmpleado()
    {
        if(isset($_POST['nombre']))
        {

            $tabla = "empleado";
            $datos = array(
                "id" => $_POST["empleado_id"],
                "nombre"=>$_POST["nombre"],
                "fecha_ingreso"=>$_POST["fecha_ingreso"],
                "salario"=>$_POST["salario"]
            );

            $respuesta = Empleado::createEmpleados($tabla, $datos);

            if ($respuesta == "ok") {

                ?><script>

                    Swal.fire({
                        type: "success",
                        position: 'top-right',
                        icon: 'success',
                        title: 'Sea Filtrado Correctamente la informacion',
                        showConfirmButton: false,
                        timer: 1600
                    })
                     .then(function(result){
                            window.location = "empleados";
                        })

                </script>
            <?php
            }

            elseif($respuesta == "error") {
                ?>
                <script>
                                 
                    Swal.fire({
                        type: "error",
                        position: 'top-right',
                        title: "El empleado no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: false,
                        timer: 1600
                      })
                    .then(function(result){

                        if (result.value) {
                            window.location = "empleados";

                        }
                    });
                </script>
                <?php
            }


        } 
    }

    static public function contSolicitud($item)
    {
        $tabla     = "empleado";
        $respuesta = Empleado::contSolicitudes($tabla, $item);
        return $respuesta;
    }

    static public function listarEmpleados($item)
    {
        $tabla     =  "empleado";
        $respuesta = Empleado::showEmpleados($tabla, $item);
        return $respuesta;
    } 

    static public function deleteSoftEmpleados()
    {
        if (isset($_POST['delete_empleado_id'])) {
            
            $tabla = "empleado";
            $item  = $_POST['delete_empleado_id'];
            $respuesta = Empleado::deleteSoftEmpleado($tabla, $item);
            return $respuesta;
            
        } 
    }

}
?>