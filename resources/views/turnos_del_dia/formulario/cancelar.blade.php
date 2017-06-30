<div id="modal-cancelar" class="modal fade modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Cancelar turno</h4>
            </div>
            <div class="modal-body">
                <form class="form-actualizar-estado" action="" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                    <h4 class="box-heading">¡Atención!</h4>
                    <p>Usted está a punto de proceder con la cancelación del turno seleccionado. Puede especificar un motivo en el campo de abajo.</p>
                    <br>
                    <div class="form-group">
                        <label>Motivo:</label>
                        <input name="comentario" type="text" maxlength="50" class="form-control" placeholder="campo opcional">
                    </div>  
                    <input name="estado" id="estado" value="cancelado" type="text" class="hide"> 
                    <input name="turno_id" id="turno_id_cancelar" type="text" class="hide">                                  
                    <button id="boton_submit_cancelar" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit_cancelar').click()">cancelar turno</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-cancelar" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-cancelar"></button>
