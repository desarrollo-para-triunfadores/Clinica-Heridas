<div class="modal fade" id="modal-crear-turno">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Reservar turno</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/turnos" method="POST" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                                              
                    <div class="form-group">
                        <label>Paciente:</label>
                        @if ($paciente)
                        <span class="form-control">{{$paciente->persona->apellido}} {{$paciente->persona->nombre}}</span>  
                        <input name="paciente_id" value="{{$paciente->id}}" type="text" class="hide">                        
                        <input name="comentario_reprogramado" value="{{$comentario_reprogramado}}" type="text" class="hide">
                        <input name="turno_id" value="{{$turno_id}}" type="text" class="hide">
                        @else 
                        <select style="width: 100%"  name="paciente_id"  placeholder="campo requerido"  class="select2 form-control">
                            @foreach($pacientes as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->persona->apellido}} {{$paciente->persona->nombre}} (DNI: {{$paciente->persona->dni}})</option>                                                    
                            @endforeach
                        </select> 
                        @endif  
                    </div>  
                    <div class="form-group">
                        <label>Comentario:</label>
                        <input name="comentario" type="text" maxlength="50" class="form-control" placeholder="campo opcional">
                    </div>  
                    <input name="fecha" id="fecha" value="{{$fecha}}" type="text" class="hide"> 
                    <input name="agenda_id" id="agenda_id" type="text" class="hide">                                                                
                    <button id="boton_submit_crear-turno" type="submit" class="btn hide btn-primary"></button>
                </form>
                <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear-turno').click()">tomar turno</button>
            </div>
        </div>          
    </div>
</div>

<button type="button" id="boton-crear-turno" class="btn btn-primary btn-lg hide" data-toggle="modal" data-target="#modal-crear-turno"></button>