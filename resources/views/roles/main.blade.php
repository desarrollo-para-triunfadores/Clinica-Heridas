@extends('partes.index')

@section('title')
Roles registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Roles
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Lugares</li>
            <li class="active">Roles</li>
        </ol>
    </section>
    <section class="content animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <br>
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <h3 class="box-title"> Registros</h3>
                    </div>
                    <div class="box-body ">                            
                        @include('partes.msj_acciones')                       
                        <table id="example" class="row-border responsive hover order-column" cellspacing="0" width="100%">

                            <thead>
                                <tr>                                  
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Puede acceder a los modulos:</th>
                                    <th class="text-center">Cantidad de usuarios con este rol</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $rol)
                                <tr>                                    
                                    <td class="text-center text-bold">{{$rol->nombre}}</td>
                                    <td class="text-center">{{$rol->modulos}}</td>
                                    <td class="text-center">{{$rol->usuarios->count()}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$rol}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$rol->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>                                  
                                    <th class="text-info">*Los roles proporcionan permisos de acceso a las pantallas que se enumeran en 'Modulos'</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <button title="Registrar un país" type="button" id="boton-modal-crear" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-crear">
                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar Rol
                        </button>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>

@include('roles.formulario.create')
@include('roles.formulario.editar')
@include('roles.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/rol.js') }}"></script>
@endsection
