<div id="modal-llamar" class="modal fade modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Llamar a paciente</h4>
            </div>
            <div class="modal-body">
                <form class="form-actualizar-estado" action="" method="POST">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                    <div class="form-group">
                        <label>Consultorio:</label>
                        <select style="width: 100%"  name="consultorio_id"  placeholder="campo requerido"  class="select2 form-control">
                            @foreach($consultorios as $consultorio)
                            <option value="{{$consultorio->id}}">{{$consultorio->nombre}}</option>                                                    
                            @endforeach
                        </select> 
                    </div> 
                    @if ($turno_anterior)
                    <input name="turno_anterior" value="{{$turno_anterior}}" type="text" class="hide"> 
                    @endif                    
                    <button id="boton_submit_llamar" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br>                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-outline" onclick="$('#boton_submit_llamar').click()">llamar</button>
            </div>
        </div>
    </div>
</div>


<button type="button" id="boton-modal-llamar" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-llamar"></button>
