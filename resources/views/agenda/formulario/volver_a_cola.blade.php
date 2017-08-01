<div id="modal-volver-a-cola" class="modal fade modal-warning">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Devolver a cola de espera</h4>
            </div>
            <div class="modal-body">
                <form class="form-actualizar-estado" action="" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                    <h4 class="box-heading">¡Atención!</h4>
                    <p>Usted está a punto de devolver a la cola de espera de turnos al turno seleccionado. Si está seguro prosiga.</p>
                    <br>     
                    <input name="estado" id="estado" value="devolver" type="text" class="hide"> 
                    <input name="turno_id" id="turno_id_devolver" type="text" class="hide">                                  
                    <button id="boton_submit_devolver" type="submit" class="btn hide btn-primary"></button>
                </form>                                                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit_devolver').click()">devolver turno</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-devolver" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-volver-a-cola"></button>
