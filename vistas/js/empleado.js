$(function(){

    $(document).on("click",".crearEmpleados",function(){
        console.log("estimado usuarios");
        var empleado_id  = $(this).data("empleado_id");
       
        $.ajax({
            url: "vistas/empleados/partials/form_empleado.php",
            method: "POST",
            data: {
                empleado_id: empleado_id,
            },
            success: function(data)
            { console.log(empleado_id);
                
                if (Number(empleado_id)) {
                    $.ajax({
                        url: "ajax/AjaxController.php",
                        method: "POST",
                        data: {
                            empleado_id: empleado_id
                        },
                        dataType:"JSON",
                        success: function(result){
                            
                            $("#empleado_id").val(result['id']);
                            $("#nombre").val(result['nombre']);
                            $("#fecha_ingreso").val(result['fecha_ingreso']);
                            $("#salario").val(result['salario']);

                            

                        }
                    });
                }

               
                $("#mdlempleados").modal("show");
              
                $("#FormEmpleados").html(data); 

            }
        });
        return false;
    });



    $(document).on("click",".delete_soft_em",function(){
        var delete_empleado_id = $(this).data("empleado_id");

        Swal.fire({
            title: 'Desea elimnar esta empleado?',
            showDenyButton: true,
            icon: "warring",
            confirmButtonText: 'validar',
            denyButtonText: `Cancelar`,
        })
        .then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "./empleados?deletes",
                    method: "POST",
                    data: {
                        delete_empleado_id: delete_empleado_id,
                    },
                    success: function(res){
                        Swal.fire({
                            type: "success",
                            position: 'top-right',
                            icon: 'success',
                            title: "¡El empleado fue Eliminado correctamente!",
                            showConfirmButton: false,
                            timer: 1600
                        })
                        .then(function(result){
                            window.location = "./empleados";
                          
                        });
                    }
                })

            } else if (result.isDenied) {
              Swal.fire('se ha canceado tu  peticion', '', 'info')
            }
        })

    })

})