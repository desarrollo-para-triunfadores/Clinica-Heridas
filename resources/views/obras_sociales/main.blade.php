@extends('partes.index')

@section('title')
Obras sociales registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Obras sociales
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Obras sociales</li>
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
                                    <th class="text-center">Cantidad de afiliados</th>
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($obras_sociales as $obra_social)
                                <tr>                                    
                                    <td class="text-center text-bold">{{$obra_social->nombre}}</td>
                                    <td class="text-center">0{{--$obra_social->pacientes->count()--}}</td>
                                    <td class="text-center">{{$obra_social->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$obra_social}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$obra_social->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar una obra social" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar obra social
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('obras_sociales.formulario.create')
@include('obras_sociales.formulario.editar')
@include('obras_sociales.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/obra_social.js') }}"></script>
@endsection
