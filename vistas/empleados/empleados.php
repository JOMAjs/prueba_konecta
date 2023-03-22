<?php $item = null; $listEmpleados = EmpleadoController::listarEmpleados($item);  ?>


<?PHP

if (empty($_GET['deletes'])) {
    # code...
    $delete = new EmpleadoController();
    $delete->deleteSoftEmpleados();
    
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Administrar Empleados
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="inicio"><i class="fa fa-dashboard"></i> 
                    Inicio
                </a>
            </li>
      
            <li class="active">
                Administrar Empleados
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-success btn-sm crearEmpleados" >
                    Agregar Empleados 
                </button>
            </div>
            <div class="box-body" id="tablaArea">
                <table class="table table-bordered table-striped dt-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Fecha Ingreso</th>
                            <th>Salario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($listEmpleados as $key => $value): ?>
                           <?php if($value['estado'] == 1): ?>
                            <tr>
                                <td><?php echo($key+1); ?></td>
                                <td><?php echo($value['nombre']); ?></td>
                                <td><?php echo($value['fecha_ingreso']); ?></td>
                                <td><?php echo($value['salario']); ?></td>
                                <td>
                                    <button data-empleado_id="<?php echo($value['id']); ?>" class="btn btn-success btn-sm crearEmpleados">
                                        <i class="fa fa-pencil"></i>
                                    </button>

                                    <button data-empleado_id="<?php echo($value['id']); ?>"  class="btn btn-danger btn-sm delete_soft_em ">
                                        <i class="fa fa-times"></i> 
                                    </button>

                                    <?php $contSolicitudes = EmpleadoController::contSolicitud($value['id']); ?>
                                    <?php if(isset($contSolicitudes['solicitudes'])): ?>
                                        <span class="badge badge-success"><a href="solicitud"  class="text-white"><?php echo $contSolicitudes['solicitudes']; ?> solicitudes</a></span> 
                                    <?php endif;?>
                                    
                                </td>
                            </tr>
                           <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
           

        </div>
    
    </section>
</div>

<?php
require_once "modal/mdlempleado.php";
?>

