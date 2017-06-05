@extends('partes.index')

@section('title')
Consultorios registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Consultorios
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
                        <table id="example" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>                                  
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Localidad</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($consultorios as $consultorio)
                                <tr>
                                    <td class="text-center text-bold">{{$consultorio->nombre}}</td>
                                    <td class="text-center text-bold">{{$consultorio->localidad->nombre}} ({{$consultorio->localidad->provincia->nombre}})</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$consultorio}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$consultorio->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar una consultorio" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar consultorio
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('consultorios.formulario.create')
@include('consultorios.formulario.editar')
@include('consultorios.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/consultorio.js') }}"></script>
@endsection
