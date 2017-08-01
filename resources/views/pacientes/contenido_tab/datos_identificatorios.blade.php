
<br> 
<div class="row">
    <div class="col-lg-4">
        @if ($paciente->persona->foto_perfil === "sin imagen")                                                                                                                                    
        <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/sin-logo.png') }}" alt="User profile picture">                                                               
        @else
        <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/' . $paciente->persona->foto_perfil) }} " alt="User profile picture">                                
        @endif
    </div>    

    <div class="col-md-4">
        <div class="form-group">
            <label>Sexo:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->sexo}}
            </p>
        </div>
    </div>                                                                     
    <div class="col-md-4">
        <div class="form-group">
            <label>Fecha de nacimiento:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->fecha_nac}}
            </p>
        </div>
    </div> 
    <div class="col-md-4">
        <div class="form-group">
            <label>Número de documento:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->dni}}
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>País de origen:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->pais->nombre}}
            </p>
        </div>
    </div>  
    <div class="col-md-4">
        <div class="form-group">
            <label>Obra social:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->obrasocial->nombre}}
            </p>
        </div>
    </div>  
    <div class="col-md-4">
        <div class="form-group">
            <label>Médico de cabecera:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->medico->nombre}}
            </p>
        </div>
    </div>                        
    <div class="col-md-4">
        <div class="form-group">
            <label>Apellido/s:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->apellido}}
            </p>
        </div>
    </div>  
    <div class="col-md-2">
        <div class="form-group">
            <label>Teléfono:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->persona->telefono)
                {{$paciente->persona->telefono}}  
                @else
                No fue registrado
                @endif
            </p>            
        </div>
    </div>  
    <div class="col-md-2">
        <div class="form-group">
            <label>Teléfono de contacto</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->persona->telefono_contacto)
                {{$paciente->persona->telefono_contacto}}
                @else
                No fue registrado
                @endif
            </p>
        </div>
    </div>   
    <div class="col-md-4">
        <div class="form-group">
            <label>Email</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->persona->email)
                {{$paciente->persona->email}}</span> 
                @else
                No fue registrado
                @endif
            </p>
        </div>
    </div> 
    <div class="col-md-4">
        <div class="form-group">
            <label>Nombre/s</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->nombre}}
            </p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Localidad:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                {{$paciente->persona->localidad->nombre}}
            </p>
        </div>
    </div>  
    <div class="col-md-4">
        <div class="form-group">
            <label>Dirección:</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->persona->direccion)
                {{$paciente->persona->direccion}}
                @else
                No fue registrado
                @endif        
            </p>
        </div>
    </div>
</div> 