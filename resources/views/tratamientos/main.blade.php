@extends('partes.index')

@section('title')
Tratamientos registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Tratamientos
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Tratamientos</li>
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
                                    <th class="text-center">Descripcion</th>  
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tratamientos as $tratamiento)
                                <tr>                                    
                                    <td class="text-center text-bold">{{$tratamiento->nombre}}</td>
                                    <td class="text-center text-bold">{{$tratamiento->descripcion}}</td>
                                    @if ($tratamiento->estado)
                                    <td class="text-center text-bold">Activado</td>
                                    @else
                                    <td class="text-center text-bold">Desactivado</td>
                                    @endif
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$tratamiento}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$tratamiento->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                  
                                    <th class="text-center">Nombre</th> 
                                    <th class="text-center">Descripcion</th>  
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un tratamiento" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar tratamiento
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('tratamientos.formulario.create')
@include('tratamientos.formulario.editar')
@include('tratamientos.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/tratamiento.js') }}"></script>
@endsection
