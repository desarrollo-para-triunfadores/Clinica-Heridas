<br>
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Ecografía</label>            
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->ecografia)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>                                                                     
    <div class="col-md-3">
        <div class="form-group">
            <label>Eco doppler</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->eco_doppler)
                Sí
                @else
                No
                @endif
            </p>              
        </div>
    </div> 
    <div class="col-md-3">
        <div class="form-group">
            <label>Rayos x</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->rayos_x)
                Sí
                @else
                No
                @endif
            </p>                  
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Arteriografía</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->arteriografia)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Se adjuntó una copia de la arteriografía?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->adjunto_arteriografia)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>Resonancia magnética</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->resonancia_magnetica)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>                        
    <div class="col-md-3">
        <div class="form-group">
            <label>Centellograma</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->centellograma)
                Sí
                @else
                No
                @endif
            </p>                      
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>Cultivo antibiograma</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->cultivo_antibiograma)
                Sí
                @else
                No
                @endif
            </p>                     
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>Biopsia</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->biopsia)
                Sí
                @else
                No
                @endif
            </p>                        
        </div>
    </div>   
    <div class="col-md-9">
        <div class="form-group">
            <label>Observaciones</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->estudios->observaciones)
                {{$paciente->estudios->observaciones}}
                @else
                No se registró ninguna observación
                @endif
            </p>
        </div>
    </div>
</div>   
