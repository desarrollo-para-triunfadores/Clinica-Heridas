<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar día no laboral</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/feriados" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Fecha:</label>
                        <input name="fecha" type="text" placeholder="campo requerido" class="form-control pull-right datepicker">                                                            
                    </div>
                    <br><br>
                    <div class="form-group">
                        <label>Motivo:</label>
                        <textarea name="motivo" type="text" maxlength="500" class="form-control" placeholder="no requerido" ></textarea>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar fecha</button>
            </div>
        </div>          
    </div>
</div>