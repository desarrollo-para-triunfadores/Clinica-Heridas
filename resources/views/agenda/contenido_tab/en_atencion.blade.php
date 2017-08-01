<br> 
<h3> Pacientes en atención</h3>
<br> 
@if (count($turnos_en_atencion)<1)
<div class="callout callout-info">
    <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
    <p>No hay personas siendo atendidas en este momento.</p>
</div>
@else                        
<table id="tabla_en_atencion" class="row-border responsive datatable  hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>
            <th class="text-center">Hora que comenzó la atención</th>
            <th class="text-center">Consultorio</th>  
            <th class="text-center">Enfermero</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos_en_atencion as $turno_en_atencion)
        <tr>                                                                                                        
            <td class="text-center text-bold">{{$turno_en_atencion->paciente->persona->apellido}} {{$turno_en_atencion->paciente->persona->nombre}}</td>
            <td class="text-center text-bold">{{$turno_en_atencion->paciente->persona->dni}}</td>
            <td class="text-center text-bold">{{$turno_en_atencion->updated_at->format('h:i A')}}</td>
            <td class="text-center text-bold">{{$turno_en_atencion->consultorio->nombre}}</td>
            <td class="text-center text-bold">{{$turno_en_atencion->enfermero->persona->apellido}} {{$turno_en_atencion->enfermero->persona->nombre}}</td>
            <td class="text-center text-bold">  <a href="{{ route('pacientes.show', $turno_en_atencion->paciente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a></td>
        </tr> 
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>   
            <th class="text-center">Hora que comenzó la atención</th>
            <th class="text-center">Consultorio</th>  
            <th class="text-center">Enfermero</th>
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>                     
@endif   