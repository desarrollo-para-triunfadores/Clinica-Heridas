<br>
<h3> Turnos en espera</h3>
<br>                                                             
@if (count($turnos_esperando)<1)
<div class="callout callout-warning">
    <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
    <p>Para el día de la fecha no existen turnos que hayan sido entregados.</p>
</div>
@else                        
<table id="tabla_espera" class="row-border responsive datatable  hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>  
            <th class="text-center">Hora de llegada</th>  
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos_esperando as $turno_esperando)
        <tr>                                                                                                        
            <td class="text-center text-bold">{{$turno_esperando->paciente->persona->apellido}} {{$turno_esperando->paciente->persona->nombre}}</td>
            <td class="text-center text-bold">{{$turno_esperando->paciente->persona->dni}}</td>
            <td class="text-center text-bold">{{$turno_esperando->updated_at->format('h:i A')}}</td>
            <td class="text-center">                                            
                <a onclick="completar_campos_cancelar({{$turno_esperando->id}})" title="Cancelar turno" class="btn btn-social-icon btn-danger btn-sm"><i class="fa fa-trash"></i></a> 
                <a onclick="completar_campos_llamar({{$turno_esperando->id}})" title="Llamar a paciente" class="btn btn-social-icon btn-primary btn-sm"><i class="fa fa-bullhorn"></i></a>                             
            </td>
        </tr> 
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>    
            <th class="text-center">Hora de llegada</th>
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>                     
@endif  