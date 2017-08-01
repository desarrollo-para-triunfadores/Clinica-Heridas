<br> 
<h3>Pacientes que están siendo llamados</h3>
<br> 
@if (count($turnos_en_llamado)<1)
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
            <th class="text-center">Estado</th>
            <th class="text-center">Consultorio</th>  
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos_en_llamado as $turno_en_llamado)
        <tr>                                                                                                        
            <td class="text-center text-bold">{{$turno_en_llamado->paciente->persona->apellido}} {{$turno_en_llamado->paciente->persona->nombre}}</td>
            <td class="text-center text-bold">{{$turno_en_llamado->paciente->persona->dni}}</td>
            @if ($turno_en_llamado->enfermero)
            <td class="text-center text-bold">Atendiendose</td>
            @else
            <td class="text-center text-bold">Llamando</td>
            @endif
            <td class="text-center text-bold">{{$turno_en_llamado->consultorio->nombre}}</td>
            <td class="text-center">   

                <a onclick="completar_campos_tomar_turno({{$turno_en_llamado->id}})" title="Atender paciente" class="btn btn-social-icon btn-success btn-sm"><i class="fa fa-check"></i></a>                                                 
                <a onclick="completar_campos_devolver({{$turno_en_llamado->id}})" title="Mandar a cola de espera" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-history" aria-hidden="true"></i></a>                                                 
            </td>
        </tr> 
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>   
            <th class="text-center">Estado</th>
            <th class="text-center">Consultorio</th>  
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>                     
@endif   