@extends('partes.index')

@section('title')
Paises registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Agenda
            <small>registros de turnos</small>
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
                        <li class=""><a href="#tab_1" data-toggle="tab" aria-expanded="false">Turnos agendados</a></li>
                        <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Turnos agendados para hoy</a></li>
                        <li class="active"><a href="#tab_3" data-toggle="tab" aria-expanded="false">Turnos en espera</a></li>
                        <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Pacientes que están siendo llamados</a></li>
                        <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Pacientes en atención</a></li> 
                        <li><a href="#tab_6" data-toggle="tab" aria-expanded="true">Historial de turnos</a></li>      
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="tab_1">
                            <div class="content">
                                @include('agenda.contenido_tab.agendados')
                            </div>                            
                        </div>                     
                        <div class="tab-pane" id="tab_2">
                            <div class="content">
                                @include('agenda.contenido_tab.agendados_hoy')
                            </div>
                        </div>       
                        <div class="tab-pane active" id="tab_3">
                            <div class="content">
                                @include('agenda.contenido_tab.en_espera')
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_4">
                            <div class="content">
                                @include('agenda.contenido_tab.en_llamado')
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_5">
                            <div class="content">
                                @include('agenda.contenido_tab.en_atencion')
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_6">
                            <div class="content">
                                @include('agenda.contenido_tab.historial')
                            </div>
                        </div>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('agenda.formulario.confirmar')
@include('agenda.formulario.create')
@include('agenda.formulario.reprogramar')
@include('agenda.formulario.cancelar')
@include('agenda.formulario.llamar')
@include('agenda.formulario.tomar_turno')
@include('agenda.formulario.volver_a_cola')

@endsection
@section('script') 
<script>
    $("#side-turnos-li").addClass("active");
    $("#side-ele-agenda").addClass("active");</script>
<script src="{{ asset('js/turno.js') }}"></script>
@endsection
