
<form id="myform" action=""  method="POST">
    <input type="hidden" name="empleado_id" id="empleado_id">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <input  type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese un nombre">
    </div>
    
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control" placeholder="Ingrese una fecha ingreso">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <input type="number" name="salario" id="salario" class="form-control" placeholder="Ingrese un salario">
    </div>

    <button type="submit" class="btn btn-sm btn-success float-right ">
        Guardar
    </button>

    <button type="button" class="btn btn-sm btn-default float-left" data-dismiss="modal">
        Salir
    </button>

</form>

<script>
  
   $("#myform").validate({
       rules: {
 
        nombre: {
           required: true
         },

         fecha_ingreso: {
           required: true
         },

         salario: {
           required: true
         }

       },

       messages: {
        
         nombre: {
           required: "Por favor, introduzca el nombre de usuario en cargado",
         },

         fecha_ingreso: {
           required: "Por favor, introduzca la fecha de ingreso",
         },

         salario: {
           required: "Por favor, introduzca un salario determinado",
         },

       }
       
   });
</script>