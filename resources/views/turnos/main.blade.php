@extends('partes.index')

@section('title')
Obtener Turno
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Turnos
            <small>registrar turno</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Turnos</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <h3 class="box-title"> Turnos</h3>
                    </div>
                    <div class="box-body ">                                                  
                        @if (!$fecha)
                        <div class="callout callout-info">
                            <h2><i class="fa fa-info-circle fa-lg" aria-hidden="true"></i> Información</h2>
                            <h3>
                                <p>Para buscar turnos disponibles presione el botón <b>buscar turnos</b> y especifique una fecha de interés. El sistema buscará turnos diponibles para la fecha seleccionada.</p>
                            </h3>
                        </div>
                        @else      
                        @if (count($horarios)<1)
                        <div class="callout callout-warning">
                            <h4><i class="fa fa-exclamation-circle fa-lg" aria-hidden="true"></i> Información</h4>
                            <p>La búsqueda para la fecha seleccionada <b>no produjo resultados</b>. Es posible que los cupos disponibles ya hayan sido agotados. Si se tratara de una emergencia puede solicitar un <b>turno especial</b> a través del apartado de la turnera sino intente con otra fecha nuevamente.</p>
                        </div>
                        @else                        
                        <table id="tabla_disponibles" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                            <thead>
                                <tr>                                  
                                    <th class="text-center">Turno</th>
                                    <th class="text-center">Hora inicio</th>
                                    <th class="text-center">Hora fin</th>
                                    <th class="text-center">Diponibles/ocupados</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)
                                <tr>                                                                                                        
                                    <td class="text-center text-bold">{{$horario["agenda"]["turno"]}}</td>
                                    <td class="text-center text-bold">{{$horario["agenda"]["hora_inicio"]}}</td>
                                    <td class="text-center text-bold">{{$horario["agenda"]["hora_fin"]}}</td>
                                    <td class="text-center text-bold">{{$horario["agenda"]["cupo_turnos"]}}/{{$horario["turnos_ocupados"]}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$horario["agenda"]["id"]}})" title="Tomar turno" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>                                        
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                  
                                    <th class="text-center">Turno</th>
                                    <th class="text-center">Hora inicio</th>
                                    <th class="text-center">Hora fin</th>
                                    <th class="text-center">Diponibles/ocupados</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                        @endif 
                        @endif    
                    </div> 
                    <div class="box-footer">
                        <div class="row">                           
                            <div class="col-sm-10">   
                                @if ($turno_especial)
                                <small class="form-text text-muted" id="info"><strong>Información:</strong> se encuentra en una solicitada de <b>turno especial</b>. Las limitaciones de cupos no son tenidas en cuenta para este tipo solicitudes.</small>
                                @endif                                
                            </div>
                            <div class="col-sm-2">
                                <div class="text-right">                                    
                                    <button title="Buscar turno" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                                        <i class="fa fa-plus-circle"></i> &nbsp;buscar turnos
                                    </button>
                                </div> 
                            </div>
                        </div>




                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('turnos.formulario.create')
@include('turnos.formulario.tomar_turno')

@endsection
@section('script') 
<script>
            $("#side-turnos-li").addClass("active");
            $("#side-ele-obtener-turno").addClass("active");  
</script>
<script src="{{ asset('js/turno.js') }}"></script>
@endsection
