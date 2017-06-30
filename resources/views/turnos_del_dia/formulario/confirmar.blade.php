<div id="modal-esperando" class="modal fade modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar estado</h4>
            </div>
            <div class="modal-body">
                <form class="form-actualizar-estado" action="" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                    <h4 class="box-heading">Información:</h4>
                    <p>Usted se encuentra por actualizar el estado del turno de pendiente a esperando. Una concluido el proceso el paciente entra en cola de espera para ser llamado al consultorio.</p>                                   
                    <input name="comentario" value="" class="hide">                 
                    <input name="estado" value="esperando" type="text" class="hide"> 
                    <input name="turno_id" id="turno_id_esperando" type="text" class="hide">                                  
                    <button id="boton_submit_esperando" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit_esperando').click()">actualizar estado</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-esperando" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-esperando"></button>
