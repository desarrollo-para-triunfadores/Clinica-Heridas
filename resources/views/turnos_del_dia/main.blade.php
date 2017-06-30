@extends('partes.index')

@section('title')
Paises registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Turnos
            <small>turnos del día</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Turnos del día</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @include('partes.msj_acciones')  
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Turnos pendientes</a></li>
                        <li class="active"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Turnos en espera</a></li>
                        <li><a href="#tab_3" data-toggle="tab" aria-expanded="true">Atendidos hoy</a></li>
                        <li><a href="#tab_4" data-toggle="tab" aria-expanded="true">Historial</a></li>      
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab_1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-right">                                 
                                        <button title="Registrar turno especial" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                                            <i class="fa fa-plus-circle"></i> &nbsp;registrar turno especial
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <h3> Turnos pendientes</h3>
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
                                        <th class="text-center">Turno</th> 
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turnos_pendientes as $turno_pendiente)
                                    <tr>                                                                                                        
                                        <td class="text-center text-bold">{{$turno_pendiente->paciente->persona->apellido}} {{$turno_pendiente->paciente->persona->nombre}}</td>
                                        <td class="text-center text-bold">{{$turno_pendiente->paciente->persona->dni}}</td>
                                        <td class="text-center text-bold">{{$turno_pendiente->agenda->turno}}</td>
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
                                        <th class="text-center">Turno</th> 
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>                     
                            @endif    
                            <br><hr><br>
                            <h3> Turnos del día</h3>
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
                                        <th class="text-center">Turno</th> 
                                        <th class="text-center">Horario de atención</th> 
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turnos_dia_pendientes as $turno_dia_pendiente)
                                    <tr>                                                                                                        
                                        <td class="text-center text-bold">{{$turno_dia_pendiente->paciente->persona->apellido}} {{$turno_dia_pendiente->paciente->persona->nombre}}</td>
                                        <td class="text-center text-bold">{{$turno_dia_pendiente->paciente->persona->dni}}</td>
                                        <td class="text-center text-bold">{{$turno_dia_pendiente->agenda->turno}}</td>
                                        <td class="text-center text-bold">{{$turno_dia_pendiente->agenda->hora_inicio}} - {{$turno_dia_pendiente->agenda->hora_fin}}</td>
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
                                        <th class="text-center">Turno</th>   
                                        <th class="text-center">Horario de atención</th> 
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>                     
                            @endif   
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane active" id="tab_2">
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
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Consultorio</th>  
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turnos_en_atencion as $turno_en_atencion)
                                    <tr>                                                                                                        
                                        <td class="text-center text-bold">{{$turno_en_atencion->paciente->persona->apellido}} {{$turno_en_atencion->paciente->persona->nombre}}</td>
                                        <td class="text-center text-bold">{{$turno_en_atencion->paciente->persona->dni}}</td>
                                        @if ($turno_en_atencion->enfermero)
                                        <td class="text-center text-bold">Atendiendose</td>
                                        @else
                                        <td class="text-center text-bold">Llamando</td>
                                        @endif
                                        <td class="text-center text-bold">{{$turno_en_atencion->consultorio->nombre}}</td>
                                        <td class="text-center">   

                                            @if ($turno_en_atencion->enfermero)
                                            <b>-</b>
                                            @else
                                            <a onclick="completar_campos_tomar_turno({{$turno_en_atencion->id}})" title="Atender paciente" class="btn btn-social-icon btn-success btn-sm"><i class="fa fa-check"></i></a>                                                 
                                            @endif  


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
                            <br><hr><br>
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


                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <h3> Turnos atendidos hoy</h3>
                            <br>                                                             
                            @if (count($turnos_atendidos_hoy)<1)
                            <div class="callout callout-warning">
                                <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
                                <p>Para el día de la fecha no existen turnos que hayan sido entregados.</p>
                            </div>
                            @else                        
                            <table id="tabla_atendidos_hoy" class="row-border responsive datatable  hover order-column" cellspacing="0" width="100%">
                                <thead>
                                    <tr>                                  
                                        <th class="text-center">Paciente</th>
                                        <th class="text-center">Número de documento</th>
                                        <th class="text-center">Turno</th>
                                        <th class="text-center">Hora atendido</th>
                                        <th class="text-center">Enfermero</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($turnos_atendidos_hoy as $turno_atendido_hoy)
                                    <tr>                                                                                                        
                                        <td class="text-center text-bold">{{$turno_atendido_hoy->paciente->persona->apellido}} {{$turno_atendido_hoy->paciente->persona->nombre}}</td>
                                        <td class="text-center text-bold">{{$turno_atendido_hoy->paciente->persona->dni}}</td>
                                        <td class="text-center text-bold">{{$turno_atendido_hoy->agenda->turno}}</td>
                                        <td class="text-center text-bold">{{$turno_atendido_hoy->updated_at->format('h:i A')}}</td>
                                        <td class="text-center text-bold">{{$turno_atendido_hoy->enfermero->persona->apellido}} {{$turno_atendido_hoy->enfermero->persona->nombre}}</td>
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
                                        <th class="text-center">Turno</th>
                                        <th class="text-center">Hora atendido</th>
                                        <th class="text-center">Enfermero</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>                     
                            @endif    

                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_4">

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
                                        <th class="text-center">Turno</th>
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
                                        <td class="text-center text-bold">{{$turno_atendido->agenda->turno}}</td>
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
                                        <th class="text-center">Turno</th>
                                        <th class="text-center">Fecha</th>
                                        <th class="text-center">Hora atendido</th>
                                        <th class="text-center">Enfermero</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>                     
                            @endif    

                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>




            </div>                                               
        </div>
    </section>
</div>

@include('turnos_del_dia.formulario.confirmar')
@include('turnos_del_dia.formulario.create')
@include('turnos_del_dia.formulario.reprogramar')
@include('turnos_del_dia.formulario.cancelar')
@include('turnos_del_dia.formulario.llamar')
@include('turnos_del_dia.formulario.tomar_turno')

@endsection
@section('script') 
<script src="{{ asset('js/turno.js') }}"></script>
@endsection
