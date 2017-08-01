<div class="modal fade" id="modal-crear">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar horario de atención</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/horarios" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Horario y cantidad de turnos</h3>
                            <br>
                            <div class="form-group">
                                <label>Horario de inicio:</label>
                                <input name="hora_inicio" value="00:00" type="time" placeholder="campo requerido" class="form-control" required>   
                            </div>
                            <div class="form-group">
                                <label>Horario de cierre:</label>
                                <input name="hora_fin" value="00:00" type="time" placeholder="campo requerido" class="form-control">   
                            </div>                                                                                                      
                            <div class="form-group">
                                <label>Cantidad de turnos diarios a otorgar:</label>
                                <input name="cupo_turnos" type="number" max="1000" min="1" class="form-control" placeholder="campo requerido" required>
                            </div>   
                            <div class="form-group">
                                <label>Descripción:</label>
                                <textarea name="turno"  class="form-control" rows="4" maxlength="250" placeholder="campo opcional (máximo 250 caracteres)"></textarea>   
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <h3>Días de atención</h3>
                            <br>
                            <div class="form-group">                                
                                <input type="checkbox" name="lunes" value="1"><font size=4>&nbsp;Lunes</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" name="martes" value="1"><font size=4>&nbsp;Martes</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" name="miercoles" value="1"><font size=4>&nbsp;Miércoles</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" name="jueves" value="1"><font size=4>&nbsp;Jueves</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" name="viernes" value="1"><font size=4>&nbsp;Viernes</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" name="sabado" value="1"><font size=4>&nbsp;Sábado</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" name="domingo" value="1"><font size=4>&nbsp;Domingo</font>
                            </div>
                        </div>                        
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar horario de atención</button>
            </div>
        </div>     
    </div>   
</div>

