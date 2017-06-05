<div class="modal fade" id="modal-crear">
    <div class="modal-dialog" style="width: 80%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar paciente</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/pacientes" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Información general</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Apellido/s:</label>
                                <input name="apellido" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nombre/s</label>
                                <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Sexo:</label>
                                <select style="width: 100%"  name="sexo"  placeholder="campo requerido"  class="select2 form-control">
                                    <option value="Femenino">Femenino</option>         
                                    <option value="Masculino">Masculino</option>   
                                </select> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fecha de cumpleaños</label>
                                <input name="fecha_nac" type="date" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Número de documento:</label>
                                <input name="dni" type="number" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>País de origen:</label>
                                <select style="width: 100%"  name="pais_id"  placeholder="campo requerido"  class="select2 form-control">
                                    @foreach($paises as $pais)
                                    <option value="{{$pais->id}}">{{$pais->nombre}}</option>                                                    
                                    @endforeach
                                </select> 
                            </div>
                        </div>  
                    </div>
                       <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputFile">Imagen de perfil:</label>
                                <input name="foto_perfil" type="file" class="form-control-file" aria-describedby="fileHelp">                            
                                <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva este campo no se actualizará.</small>
                            </div> 
                        </div> 
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Obra social:</label>
                                <select style="width: 100%" name="obrasocial_id"  placeholder="campo requerido"  class="select2 form-control">
                                    @foreach($obras as $obra)
                                    <option value="{{$obra->id}}">{{$obra->nombre}}</option>                                                    
                                    @endforeach
                                </select> 
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Médico de cabecera:</label>
                                <select style="width: 100%" name="medico_id"  placeholder="campo requerido"  class="select2 form-control">
                                    @foreach($medicos as $medico)
                                    <option value="{{$medico->id}}">{{$medico->nombre}}</option>                                                    
                                    @endforeach
                                </select> 
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
                                <label>Teléfono:</label>
                                <input name="telefono" type="tel" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Teléfono de contacto</label>
                                <input name="telefono_contacto" type="tel" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div>   
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" type="email" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Localidad:</label>
                                <select style="width: 100%"  name="localidad_id"  placeholder="campo requerido"  class="select2 form-control">
                                    @foreach($localidades as $localidad)
                                    <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>                                                    
                                    @endforeach
                                </select> 
                            </div>
                        </div>  
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Dirección</label>
                                <input name="direccion" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>                            
                            </div>
                        </div>                        
                    </div>                                       
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar paciente</button>
            </div>
        </div>          
    </div>
</div>