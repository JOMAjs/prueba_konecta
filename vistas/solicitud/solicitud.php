<?php $item = null; $listSolicitud = SolicitudController::listarSolicitud($item); ?>

<?PHP

if (empty($_GET['delete_soft'])) {
    # code...
    $delete = new SolicitudController();
    $delete->deleteSoftSolicitud();
    
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Solicitud
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Solicitud
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-success btn-sm crearSolicitud" >
                    Agregar Solicitud
                </button>
            </div>
            <div class="box-body" id="tablaArea">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Resumen</th>
                            <th>Empleados</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listSolicitud as $key => $value): ?>
                           <?php //if($value['estado'] == 1): ?>
                            <tr>
                                <td><?php echo($key+1); ?></td>
                                <td><?php echo($value['codigo']); ?></td>
                                <td><?php echo($value['descripcion']); ?></td>
                                <td><?php echo($value['resumen']); ?></td>
                                <td><?php echo($value['nombre']); ?></td>
                                <td>
                                    <button data-solicitud_id="<?php echo($value['soli']); ?>" class="btn btn-success btn-sm crearSolicitud">
                                        <i class="fa fa-pencil"></i>
                                    </button>

                                    <button data-solicitud_id="<?php echo($value['soli']); ?>"  class="btn btn-danger btn-sm delete_soft ">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                           <?php //endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
           

        </div>
    
    </section>
</div>

<?php
require_once "modal/mdlsolicitud.php";
?>

