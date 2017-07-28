@extends('partes.index')

@section('title')
Medicamentos registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Medicamentos
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li class="active">Medicamentos</li>
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
                                    <th class="text-center">Nombre de la droga</th> 
                                    <th class="text-center">Nombre comercial</th>  
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medicamentos as $medicamento)
                                <tr>                                    
                                    <td class="text-center text-bold">{{$medicamento->nombre_comercial}}</td>
                                    <td class="text-center text-bold">{{$medicamento->nombre_droga}}</td>
                                    <td class="text-center">{{$medicamento->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$medicamento}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$medicamento->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                  
                                    <th class="text-center">Nombre de la droga</th> 
                                    <th class="text-center">Nombre comercial</th>  
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar una medicamento" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;registrar medicamento
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('medicamentos.formulario.create')
@include('medicamentos.formulario.editar')
@include('medicamentos.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/medicamento.js') }}"></script>
@endsection
