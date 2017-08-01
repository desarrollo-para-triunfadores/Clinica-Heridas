<br>
<div class="row">
    <div class="col-md-4">
        <h3>Turnos agendados</h3>
    </div>
    <div class="col-md-8">                                    
        <div class="pull-right">                                 
            <button title="Registrar turno especial" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                <i class="fa fa-plus-circle"></i> &nbsp;registrar turno especial
            </button>
        </div>
    </div>
</div>
<br>                                                             
@if (count($turnos_pendientes)<1)
<div class="callout callout-warning">
    <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
    <p>Para el día de la fecha no existen turnos que hayan sido entregados.</p>
</div>
@else                        
<table id="tabla_pendientes" class="row-border responsive datatable  hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Paciente</th>
            <th class="text-center">Número de documento</th>
            <th class="text-center">Horario de atención</th> 
            <th class="text-center">Fecha</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($turnos_pendientes as $turno_pendiente)
        <tr>                                                                                                        
            <td class="text-center text-bold">{{$turno_pendiente->paciente->persona->apellido}} {{$turno_pendiente->paciente->persona->nombre}}</td>
            <td class="text-center text-bold">{{$turno_pendiente->paciente->persona->dni}}</td>
            <td class="text-center text-bold">{{$turno_pendiente->horario->hora_inicio}} - {{$turno_pendiente->horario->hora_fin}}</td>
            <td class="text-center text-bold">{{$turno_pendiente->fecha}}</td>
            <td class="text-center">
                <a onclick="completar_campos_reprogramar({{$turno_pendiente}})" title="Reprogramar turno" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-calendar"></i></a>                                        
                <a onclick="completar_campos_cancelar({{$turno_pendiente->id}})" title="Cancelar turno" class="btn btn-social-icon btn-danger btn-sm"><i class="fa fa-trash"></i></a>                                        
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
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>                     
@endif   
