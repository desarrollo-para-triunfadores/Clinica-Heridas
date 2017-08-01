<div class="modal fade" id="modal-reprogramar">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Reprogramar turno</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/buscar_turnos" method="GET">                   
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                                              
                    <div class="form-group">
                        <label>Fecha de interés:</label>
                        <input name="fecha" type="text" placeholder="campo requerido" class="form-control pull-right datepicker">                                                                
                    </div>  
                    <br>
                    <br>
                    <div class="form-group">
                        <label>Motivo:</label>
                        <input name="comentario" type="text" maxlength="50" class="form-control" placeholder="campo opcional">
                    </div>  
                    <input name="turno_especial" value="true" type="text" class="hide">                 
                    <input name="paciente" id="paciente" type="text" class="hide"> 
                    <input name="turno_id" id="turno_id_reprogramar" type="text" class="hide">                                  
                    <button id="boton_submit_reprogramar" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_reprogramar').click()">reprogramar turno</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-reprogramar" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-reprogramar"></button>