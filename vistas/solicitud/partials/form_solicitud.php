
<form id="myform" action=""  method="POST">
    <input type="hidden" name="solicitud_id" id="solicitud_id">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <input  type="text" name="codigo" id="codigo" class="form-control" placeholder="Ingrese un codigo">
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <input type="text" name="resumen" id="resumen" class="form-control" placeholder="Ingrese una resumen">
        
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <textarea name="descripcion" id="descripcion" class="form-control" cols="20" placeholder="Ingrese una descripcion"></textarea>
    </div>

    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fa fa-list"></i></span>
        </div>
        <select name="empleado_id" id="empleado_id" class="form-control empleado_id" data-placeholder="Seleccione un empleado"></select>
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
 
        codigo: {
           required: true
         },

         descripcion: {
           required: true
         },

         resumen: {
           required: true
         },

         empleado_id: {
           required: true
         }


       },

       messages: {
        
         codigo: {
           required: "Por favor, introduzca el codigo",
         },

         descripcion: {
           required: "Por favor, introduzca la descripcion",
         },

    
         resumen: {
           required: "Por favor, introduzca el resumen",
         },

         empleado_id: {
           required: "Por favor, introduzca el empleado",
         },

       }
       
   });
</script>