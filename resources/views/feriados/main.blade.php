@extends('partes.index')

@section('title')
Dias no laborales
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Feriados y asuetos
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Consultorios</li>
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
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Motivo</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feriados as $feriado)
                                <tr>
                                    <td class="text-center text-bold">{{$feriado->fecha}}</td>
                                    <td class="text-center text-bold">{{$feriado->motivo}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$feriado}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$feriado->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">Motivo</th>
                            <th class="text-center">Acciones</th>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar una feriado" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar feriado
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('feriados.formulario.create')
@include('feriados.formulario.editar')
@include('feriados.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/feriado.js') }}"></script>
@endsection
