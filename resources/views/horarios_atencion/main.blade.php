@extends('partes.index')

@section('title')
Consultorios registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Horarios de atención
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Horarios de atención</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <h3 class="box-title"> Registros</h3>
                    </div>                    
                    <div class="box-body ">                                                                                                                                                                                                                                                                            
                        @include('partes.msj_acciones')
                        <table id="example" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Hora inicio</th>
                                    <th class="text-center">Hora fin</th>                               
                                    <th class="text-center">Cantidad máxima de turnos</th>
                                    <th class="text-center">Lunes</th>
                                    <th class="text-center">Martes</th>
                                    <th class="text-center">Miércoles</th>
                                    <th class="text-center">Jueves</th>
                                    <th class="text-center">Viernes</th>
                                    <th class="text-center">Sábado</th>
                                    <th class="text-center">Domingo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)
                                <tr>
                                    <td class="text-center text-bold">{{$horario->hora_inicio}}</td>
                                    <td class="text-center text-bold">{{$horario->hora_fin}}</td>
                                    <td class="text-center text-bold">{{$horario->cupo_turnos}}</td>
                                    <td class="text-center text-bold">
                                        @if ($horario->lunes)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                     <td class="text-center text-bold">
                                        @if ($horario->martes)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                     <td class="text-center text-bold">
                                        @if ($horario->miercoles)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                     <td class="text-center text-bold">
                                        @if ($horario->jueves)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                     <td class="text-center text-bold">
                                        @if ($horario->viernes)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                     <td class="text-center text-bold">
                                        @if ($horario->sabado)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                     <td class="text-center text-bold">
                                        @if ($horario->domingo)
                                        Sí
                                        @else
                                        <font color="#cc0a0a">No</font>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$horario}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$horario->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Hora inicio</th>
                                    <th class="text-center">Hora fin</th>
                                    <th class="text-center">Cantidad máxima de turnos</th>
                                    <th class="text-center">Lunes</th>
                                    <th class="text-center">Martes</th>
                                    <th class="text-center">Miércoles</th>
                                    <th class="text-center">Jueves</th>
                                    <th class="text-center">Viernes</th>
                                    <th class="text-center">Sábado</th>
                                    <th class="text-center">Domingo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>                                                        
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar una feriado" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar horario de atención
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('horarios_atencion.formulario.create')
@include('horarios_atencion.formulario.editar')
@include('horarios_atencion.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/horario.js') }}"></script>
@endsection
