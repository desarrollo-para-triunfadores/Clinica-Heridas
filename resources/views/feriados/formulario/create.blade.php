<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar Feriado o Asueto</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/feriados" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha:</label>
                                <input name="fecha" id="calendario" type="date" maxlength="10" class="form-control" placeholder="campo requerido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Motivo:</label>
                                <textarea name="motivo" type="text" maxlength="500" class="form-control" placeholder="no requerido" ></textarea>
                            </div>
                        </div>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar Feriado o dia de Asueto</button>
            </div>
        </div>          
    </div>
</div>