<div id="modal-tomar-turno" class="modal fade modal-success">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Tomar turno</h4>
            </div>
            <div class="modal-body">
                <form class="form-actualizar-estado" action="" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                    <div class="form-group">
                        <label>Enfermero:</label>
                        <select style="width: 100%"  name="enfermero_id"  placeholder="campo requerido"  class="select2 form-control">
                            @foreach($enfermeros as $enfermero)
                            <option value="{{$enfermero->id}}">{{$enfermero->persona->apellido}} {{$enfermero->persona->nombre}} (DNI: {{$enfermero->persona->dni}})</option>                                                      
                            @endforeach
                        </select> 
                    </div>                                     
                    <button id="boton_submit_tomar-turno" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit_tomar-turno').click()">actualizar estado</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-tomar-turno" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-tomar-turno"></button>
