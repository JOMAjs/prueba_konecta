<?php 
$data = array();

class SolicitudController {

    static public function ctrsolicitud()
    {
        if(isset($_POST['codigo']))
        {

            $tabla = "solicitud";
            $datos = array(
                "id" =>$_POST['solicitud_id'],
                "codigo"=>$_POST["codigo"],
                "descripcion"=>$_POST["descripcion"],
                "resumen"=>$_POST["resumen"],
                "empleado_id"=>$_POST["empleado_id"]

            );

            $respuesta = Solicitud::createSolicitud($tabla, $datos);

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
                            window.location = "solicitud";
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
                        title: "La solicitud no puede ir vacía o llevar caracteres especiales!",
                        showConfirmButton: false,
                        timer: 1600
                      })
                    .then(function(result){

                        if (result.value) {
                            window.location = "solicitud";

                        }
                    });
                </script>
                <?php
            }


        } 
    }

    static public function listarSolicitud($item)
    {
        $tabla     =  "solicitud";
        $respuesta = Solicitud::showSolicitud($tabla, $item);
        return $respuesta;
    } 

    static public function deleteSoftsolicitud()
    {
        if (isset($_POST['solicitud_id'])) {
            
            $tabla = "solicitud";
            $item  = $_POST['solicitud_id'];
            $respuesta = Solicitud::deleteSoftsolicitud($tabla, $item);
            return $respuesta;
            
        } 
    }






}
?>