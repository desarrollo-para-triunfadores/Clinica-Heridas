<br>
<h3>Turnos agendados para hoy</h3>
<br>                                                             
@if (count($turnos_dia_pendientes)<1)
<div class="callout callout-warning">
    <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
    <p>Para el día de la fecha no existen turnos que hayan sido entregados.</p>
</div>
@else                        
<table id="tabla_pendientes_dia" class="row-border responsive datatable  hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th> 
            <th class="text-center">Horario de atención</th> 
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos_dia_pendientes as $turno_dia_pendiente)
        <tr>
            <td class="text-center text-bold">{{$turno_dia_pendiente->paciente->persona->apellido}} {{$turno_dia_pendiente->paciente->persona->nombre}}</td>
            <td class="text-center text-bold">{{$turno_dia_pendiente->paciente->persona->dni}}</td>
            <td class="text-center text-bold">{{$turno_dia_pendiente->horario->hora_inicio}} - {{$turno_dia_pendiente->horario->hora_fin}}</td>
            <td class="text-center">
                <a onclick="completar_campos_esperando({{$turno_dia_pendiente->id}})" title="Marcar asistencia" class="btn btn-social-icon btn-success btn-sm"><i class="fa fa-pencil"></i></a> 
                <a onclick="completar_campos()" title="Reprogramar turno" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-calendar"></i></a>                                        
                <a onclick="completar_campos_cancelar({{$turno_dia_pendiente->id}})" title="Cancelar turno" class="btn btn-social-icon btn-danger btn-sm"><i class="fa fa-trash"></i></a>                                                                                
            </td>
        </tr> 
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>  
            <th class="text-center">Horario de atención</th> 
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>                     
@endif   

