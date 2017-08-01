<br>    
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padece diabetes?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->diabetes)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>                                                                     
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Qué tipo?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tipo_diabetes)
                {{$paciente->antecedentes->tipo_diabetes}}  
                @else
                No corresponde
                @endif
            </p>
        </div>
    </div> 
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Qué tipo de medicación utiliza?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->medicacion_dbt2)
                {{$paciente->antecedentes->medicacion_dbt2}}   
                @else
                No corresponde
                @endif
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Fecha aproximada del diagnóstico</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tiempo_dbt)
                {{$paciente->antecedentes->tiempo_dbt}}
                @elseif ($paciente->antecedentes->diabetes)
                No fue registrado
                @else
                No corresponde
                @endif
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padeció un ACV?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->acv)
                Sí
                @else
                No
                @endif  
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>Fecha aproximada del episodio de ACV</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tiempo_acv)
                {{$paciente->antecedentes->tiempo_acv}}
                @elseif ($paciente->antecedentes->acv === '1')
                No fue registrado
                @else
                No corresponde
                @endif
            </p>
        </div>
    </div>                        
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padece de hipertensión arterial?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->hipertension)
                Sí
                @else
                No
                @endif   
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Se trata la hipertensión?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tratamiento_hipertension)
                Sí
                @elseif ($paciente->antecedentes->hipertension)
                No
                @else
                No corresponde
                @endif 
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padece de insuficiencia cardiaca?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->insuficiencia_cardiaca)
                Sí
                @else
                No
                @endif 
            </p>
        </div>
    </div>   
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padece de insuficiencia renal?</label>

            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->insuficiencia_renal)
                Sí
                @else
                No
                @endif    
            </p>
        </div>
    </div> 
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Le practican hemodiálisis?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->hemodialisis)
                Sí
                @elseif ($paciente->antecedentes->insuficiencia_renal)
                No
                @else
                No corresponde
                @endif    
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Fecha aproximada de la primer hemodiálisis</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tiempo_hemodialisis)
                {{$paciente->antecedentes->tiempo_hemodialisis}}
                @elseif ($paciente->antecedentes->insuficiencia_renal)
                No fue registrado
                @else
                No corresponde
                @endif 
            </p>
        </div>
    </div>  
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padeció o padece de neuropatía?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->neuropatia)
                Sí
                @else
                No
                @endif 
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padece de insuficiencia venosa?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->insuficiencia_venosa)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Se trata la insuficiencia venosa?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tratamiento_insuficiencia_venosa)
                Sí
                @elseif ($paciente->antecedentes->insuficiencia_venosa)
                No
                @else
                No corresponde
                @endif
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Qué tipo de tratamiento?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tratamiento_insuficiencia_venosa)
                {{$paciente->antecedentes->tipo_tratamiento_insuficiencia_venosa}}
                @elseif ($paciente->antecedentes->tratamiento_insuficiencia_venosa)
                No corresponde                                    
                @endif
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padece de arteriopatía periférica?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->arteriopatia_periferica)
                Sí
                @else
                No
                @endif
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Se trata la arteriopatía periférica?</label>


            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tratamiento_arteriopatia_periferica)
                Sí
                @elseif ($paciente->antecedentes->arteriopatia_periferica)
                No
                @else
                No corresponde
                @endif 
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Qué tipo de tratamiento?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tipo_tratamiento_arteriopatia_periferica)
                {{$paciente->antecedentes->tipo_tratamiento_arteriopatia_periferica}}
                @elseif ($paciente->antecedentes->tratamiento_arteriopatia_periferica)                                               
                No corresponde
                @endif 
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>¿Padeció un TVP?</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tvp)
                Sí
                @else
                No
                @endif      
            </p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Fecha aproximada del episodio de TVP</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->tiempo_tvp)
                {{$paciente->antecedentes->tiempo_tvp}}
                @elseif ($paciente->antecedentes->tvp)
                No fue registrado
                @else
                No corresponde
                @endif 
            </p>
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group">
            <label>Observaciones</label>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                @if ($paciente->antecedentes->observaciones)
                {{$paciente->antecedentes->observaciones}}
                @else
                No se registró ninguna observación
                @endif
            </p>
        </div>
    </div>
</div>   


