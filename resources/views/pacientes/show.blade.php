@extends('partes.index')

@section('title')
Detalle del registro
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Pacientes
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Pacientes</li>
            <li class="active">Pacientes</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-list-ul" aria-hidden="true"></i>
                        <h3 class="box-title"> Detalle del registro</h3>
                    </div>
                    <div class="box-body ">         
                        @include('partes.msj_acciones')

                        @if (!$paciente->antecedentes)
                        @include('pacientes.contenido_tab.msj_historia_incompleta')
                        @endif


                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Datos identificatorios</a></li>
                                @if ($paciente->antecedentes)
                                <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Antecedentes mórbidos</a></li>
                                <li><a href="#tab_3" data-toggle="tab" aria-expanded="true">Factores de riesgo</a></li>
                                <li><a href="#tab_4" data-toggle="tab" aria-expanded="true">Medicamentos</a></li>      
                                <li><a href="#tab_5" data-toggle="tab" aria-expanded="true">Estudios complementarios</a></li>  
                                @endif
                                <li><a href="#tab_6" data-toggle="tab" aria-expanded="true">Valoraciones específicas</a></li>  
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="content">
                                        @include('pacientes.contenido_tab.datos_identificatorios')
                                    </div> 
                                </div>
                                @if ($paciente->antecedentes)
                                <div class="tab-pane" id="tab_2">
                                    <div class="content">
                                        @include('pacientes.contenido_tab.antecedentes')
                                    </div> 
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <div class="content">
                                        @include('pacientes.contenido_tab.factores')
                                    </div> 
                                </div>
                                <div class="tab-pane" id="tab_4">
                                    <div class="content">
                                        @include('pacientes.contenido_tab.medicamentos')
                                    </div> 
                                </div>
                                <div class="tab-pane" id="tab_5">
                                    <div class="content">
                                        @include('pacientes.contenido_tab.estudios_complementarios')
                                    </div> 
                                </div>
                                @endif
                                <div class="tab-pane" id="tab_6">
                                    <div class="content">
                                        @include('pacientes.contenido_tab.valoraciones')
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('pacientes.index') }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>
                                <button title="Registrar un enfermero" type="button" id="boton-modal-crear" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-crear">
                                    <i class="fa fa-plus-circle"></i> &nbsp;registrar paciente
                                </button>
                                @if (!$paciente->antecedentes)
                                <a href="{{ route('historias.edit', $paciente->id) }}" title="registrar datos básicos de la historia clínica del paciente" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> completar historia clínica</a>                                 
                                @endif
                                <a href="{{ route('valoraciones.edit', $paciente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus-circle"></i> &nbsp;agregar valoración específica
                                </a>
                                <div class="pull-right">   
                                    @if ($paciente->antecedentes)                           
                                    <a href="{{ route('historias.edit', $paciente->id) }}" title="actualizar los datos básicos de la historia clínica del paciente" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> actualizar historia clínica</a>
                                    @endif
                                    <a onclick="completar_campos({{$paciente}})" title="Editar este registro" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> actualizar datos identificatorios</a>
                                    <a onclick="abrir_modal_borrar({{$paciente->id}})" title="Eliminar este registro" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar registro</a>                                       
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>
@include('pacientes.formulario.create')
@include('pacientes.formulario.editar')
@include('pacientes.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/paciente.js') }}"></script>
<script src="{{ asset('js/camara.js') }}"></script>
@endsection
