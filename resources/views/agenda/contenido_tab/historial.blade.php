<br>   
<h3> Historial de turnos</h3>
<br>                                                      
@if (count($turnos_atendidos)<1)
<div class="callout callout-warning">
    <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
    <p>Para el día de la fecha no existen turnos que hayan sido entregados.</p>
</div>
@else                        
<table id="tabla_atendidos" class="row-border responsive datatable  hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>
            <th class="text-center">Horario de atención</th> 
            <th class="text-center">Fecha</th>
            <th class="text-center">Hora atendido</th>
            <th class="text-center">Enfermero</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos_atendidos as $turno_atendido)

        <tr>                                                                                                        
            <td class="text-center text-bold">{{$turno_atendido->paciente->persona->apellido}} {{$turno_atendido->paciente->persona->nombre}}</td>
            <td class="text-center text-bold">{{$turno_atendido->paciente->persona->dni}}</td>
            <td class="text-center text-bold">{{$turno_atendido->horario->hora_inicio}} - {{$turno_atendido->horario->hora_fin}}</td>
            <td class="text-center text-bold">{{$turno_atendido->fecha}}</td>
            <td class="text-center text-bold">{{$turno_atendido->updated_at->format('h:i A')}}</td>
            @if ($turno_atendido->enfermero)
            <td class="text-center text-bold">{{$turno_atendido->enfermero->persona->apellido}} {{$turno_atendido->enfermero->persona->nombre}}</td>
            @else   
            <td class="text-center text-bold"> - </td>
            @endif       
            <td class="text-center text-bold">{{$turno_atendido->estado}}</td>
            <td class="text-center">
                <a onclick="completar_campos()" title="Conocer detalle de consulta" class="btn btn-social-icon btn-info btn-sm"><i class="fa fa-list-ul"></i></a>                                        
            </td>
        </tr> 

        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>
            <th class="text-center">Horario de atención</th> 
            <th class="text-center">Fecha</th>
            <th class="text-center">Hora atendido</th>
            <th class="text-center">Enfermero</th>
            <th class="text-center">Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>                     
@endif    