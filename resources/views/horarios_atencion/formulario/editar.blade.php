<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar feriado</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form id="form-update" action="" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Horario y cantidad de turnos</h3>
                            <br>
                            <div class="form-group">
                                <label>Horario de inicio:</label>
                                <input name="hora_inicio" id="hora_inicio" type="time" placeholder="campo requerido" class="form-control" required>   
                            </div>
                            <div class="form-group">
                                <label>Horario de inicio:</label>
                                <input name="hora_fin" id="hora_fin" type="time" placeholder="campo requerido" class="form-control">   
                            </div>                                                                                                        
                            <div class="form-group">
                                <label>Cantidad de turnos diarios a otorgar:</label>
                                <input name="cupo_turnos" id="cupo_turnos" type="number" max="1000" min="1" class="form-control" placeholder="campo requerido" required>
                            </div>   
                            <div class="form-group">
                                <label>Descripción:</label>
                                <textarea name="turno" id="turno" class="form-control" rows="4" maxlength="250" placeholder="campo opcional (máximo 250 caracteres)"></textarea>   
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <h3>Días de atención</h3>
                            <br>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="lunes" id="lunes" value="1"><font size=4>&nbsp;Lunes</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="martes" id="martes" value="1"><font size=4>&nbsp;Martes</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="miercoles" id="miercoles" value="1"><font size=4>&nbsp;Miércoles</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="jueves" id="jueves" value="1"><font size=4>&nbsp;Jueves</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="viernes" id="viernes" value="1"><font size=4>&nbsp;Viernes</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="sabado" id="sabado" value="1"><font size=4>&nbsp;Sábado</font>
                            </div>
                            <div class="form-group">                                
                                <input type="checkbox" class="actualizar_check" name="domingo" id="domingo"value="1"><font size=4>&nbsp;Domingo</font>
                            </div>
                        </div>                     
                    </div>
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update').click()">actualizar registro</button>
            </div>
        </div>
    </div>
</div>

<button type="button" id="boton-modal-update" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-update"></button>