<div class="modal fade" id="modal-update">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Actualizar información del sistema</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form id="form-update" action="/configuraciones/1" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                    <input name="_method" type="hidden" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Información general</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre de la clínica:</label>
                                <input name="nombre"  type="text" maxlength="50" class="form-control" value="{{$configuracion->nombre}}" placeholder="campo requerido" required>                            
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Eslogan:</label>
                                <input name="descripcion" type="text" maxlength="50" class="form-control" value="{{$configuracion->descripcion}}" placeholder="campo requerido" required>                            
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Logo:</label>
                                <input name="logo" id="foto_perfil" type="file" class="form-control-file" aria-describedby="fileHelp">                            
                                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva este campo no se actualizará.</small>
                            </div> 
                        </div> 
                    </div>
                    <br>
                    <hr/>  
                    <br>                                         
                    <h3>Contacto y dirección</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Linea telefónica 1:</label>
                                <input name="telefono" type="tel" maxlength="50" class="form-control" value="{{$configuracion->telefono}}"  placeholder="campo requerido" required>                            
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Linea telefónica 2:</label>
                                <input name="telefono_contacto" type="tel" maxlength="50" class="form-control" value="{{$configuracion->telefono_contacto}}" placeholder="campo requerido" required>                            
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" maxlength="50" class="form-control" value="{{$configuracion->email}}" placeholder="campo requerido" required>                            
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Localidad:</label>
                                <select style="width: 100%" name="localidad_id" id="localidad_id" placeholder="campo requerido"  class="select2 form-control">
                                    @foreach($localidades as $localidad)
                                    <option value="{{$localidad->id}}">{{$localidad->nombre}} ({{$localidad->provincia->nombre}})</option>                                                    
                                    @endforeach
                                </select> 
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dirección:</label>
                                <input id="direccion" name="direccion" type="text" maxlength="50" class="form-control" value="{{$configuracion->direccion}}" placeholder="campo requerido" required>                            
                            </div>
                        </div>                        
                    </div>  
                    <br>
                    <hr/>  
                    <br>                                         
                    <h3>Otros parámetros</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre del sistema:</label>
                                <input name="apodo" type="text" maxlength="50" class="form-control" value="{{$configuracion->apodo}}" placeholder="campo requerido" required>                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Siglas:</label>
                                <input name="apodo_abreviado" type="text" maxlength="50" class="form-control" value="{{$configuracion->apodo_abreviado}}" placeholder="campo requerido" required>                            
                            </div>
                        </div>
                        <div class="col-md-12">
                            <small class="form-text text-muted" id="info"><strong>Información:</strong> se recomienda que estos campos no pasen de los catorce (14) y cuatro (4) caracteres respectivamente para su correcta visualización.</small>
                        </div>

                    </div>  
                    <button id="boton_submit_update" type="submit" class="btn btn-primary hide"></button>
                </form>  
                <br>               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn  btn-warning" onclick="$('#boton_submit_update').click()">actualizar información</button>
            </div>
        </div>
    </div>
</div>