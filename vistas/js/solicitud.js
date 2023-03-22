$(function(){

    $(document).on("click",".crearSolicitud",function(){
        console.log("estimado usuarios");
        var solicitud_id  = $(this).data("solicitud_id");
        var empleado_id   = $(this).data("empleado_id");
        $.ajax({
            url: "vistas/solicitud/partials/form_solicitud.php",
            method: "POST",
            data: {
                solicitud_id: solicitud_id,
            },
            success: function(data)
            { console.log(solicitud_id);
                
                if (Number(solicitud_id)) {
                    $.ajax({
                        url: "ajax/AjaxController.php",
                        method: "POST",
                        data: {
                            solicitud_id: solicitud_id
                        },
                        dataType:"JSON",
                        success: function(result){
                            
                            $("#solicitud_id").val(result['id']);
                            $("#codigo").val(result['codigo']);
                            $("#descripcion").val(result['descripcion']);
                            $("#resumen").val(result['resumen']);

                            select_Empleados(result['empleado_id'])

                        }
                    });
                }

               
                $("#mdlsolicitud").modal("show");
                select_Empleados(empleado_id = null);
                $("#FormSolicitud").html(data); 

            }
        });
        return false;
    });

    function select_Empleados(empleado_id)
    {
        $.ajax({
            url: "ajax/AjaxController.php",
            method: "POST",
            data: {
                empleado_id: empleado_id
            },
            dataType:"JSON",
            success: function(result)
            { 
                $(result).each( function(index, res){
                    if (res.id == empleado_id) {
                        console.log(res.nombre)
                        $(".empleado_id option[value='"+ res.id +"']").attr("selected",true);
                        $(".empleado_id").append('<option value="'+res.id+'">' + res.nombre + '</option>')
                    }
                    $(".empleado_id").append('<option value="'+res.id+'">' + res.nombre + '</option>')
                })
                
                var ChosenInputValue = $('.chosen-choices input').val();//get the current value of the search
                $(".empleado_id").trigger("chosen:updated");
                $('.chosen-choices input').val(ChosenInputValue);
            }
        });
    }

    $(document).on("click",".delete_soft",function(){
        var solicitud_id = $(this).data("solicitud_id");

        Swal.fire({
            title: 'Desea elimnar la solicitud ?',
            showDenyButton: true,
            icon: "warring",
            confirmButtonText: 'validar',
            denyButtonText: `Cancelar`,
        })
        .then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "solicitud?delete_soft",
                    method: "POST",
                    data: {
                        solicitud_id: solicitud_id,
                    },
                    success: function(res){
                        Swal.fire({
                            type: "success",
                            position: 'top-right',
                            icon: 'success',
                            title: "¡La solicitud fue Eliminado correctamente!",
                            showConfirmButton: false,
                            timer: 1600
                        })
                        .then(function(result){
                            window.location = "./solicitud";
                          
                        });
                    }
                })

            } else if (result.isDenied) {
              Swal.fire('se ha canceado tu  peticion', '', 'info')
            }
        })

    })

})