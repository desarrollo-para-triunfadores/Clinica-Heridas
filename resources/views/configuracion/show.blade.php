<div class="tab-pane active" id="settings">
    <br><br>
    <div class="row">
        <div class="col-lg-6">
            @if ($configuracion->logo === "sin imagen")                                                                                                                                    
            <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/otros/sin-logo.png') }}" alt="User profile picture">                                                               
            @else
            <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/otros/' . $configuracion->logo) }} " alt="User profile picture">                                
            @endif
        </div>       
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Linea telefónica 1:</label>
                        <span class="form-control">{{$configuracion->telefono}}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Linea telefónica 2:</label>                        
                        <span class="form-control">{{$configuracion->telefono_contacto}}</span>
                    </div>   
                </div>
            </div>
        </div>
        <div class="col-md-6">                
            <div class="form-group">
                <label>Email:</label>
                <span class="form-control">{{$configuracion->email}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Dirección:</label>
                <span class="form-control">{{$configuracion->direccion}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Nombre de la clínica:</label>
                <span class="form-control">{{$configuracion->nombre}}</span>
            </div>
        </div>                              
        <div class="col-md-6">
            <div class="form-group">
                <label>Localidad:</label>
                <span class="form-control">{{$configuracion->localidad->nombre}}</span>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Eslogan:</label>
                <span class="form-control">{{$configuracion->descripcion}}</span>
            </div>   
        </div>        
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Nombre del sistema:</label>
                        <span class="form-control">{{$configuracion->apodo}}</span>
                    </div>
                </div>
                <div class="col-md-4">        
                    <div class="form-group">
                        <label>Siglas:</label>
                        <span class="form-control">{{$configuracion->apodo_abreviado}}</span>
                    </div>
                </div>
            </div>              
        </div>                
    </div> 
</div>