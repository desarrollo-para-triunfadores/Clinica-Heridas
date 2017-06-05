<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar consultorio</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/consultorios" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Localidad:</label>
                                <select style="width: 100%"  name="localidad_id"  placeholder="campo requerido"  class="select2 form-control">
                                    @foreach($localidades as $localidad)
                                        <option value="{{$localidad->id}}">{{$localidad->nombre}}  ({{$localidad->provincia->nombre}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar consultorio</button>
            </div>
        </div>          
    </div>
</div>