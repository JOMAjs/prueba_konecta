
<div id="mdlsolicitud" class="modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="display: none;"  data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header bg-success">
                <h5 class="modal-title">Administrar Solicitud</h5>
            </div>
           
            <div class="modal-body" id="FormSolicitud"></div>
        </div>
    </div>

    <?php 
       $rest = new SolicitudController();
       $rest->ctrsolicitud();
    ?>

</div>