@extends('partes.index')

@section('title')
Enfermeros registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Enfermeros
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Enfermeros</li>
            <li class="active">Enfermeros</li>
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
                        <div class="row">
                            <div class="col-lg-4">
                                @if ($enfermero->persona->foto_perfil === "sin imagen")                                                                                                                                    
                                <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/sin-logo.png') }}" alt="User profile picture">                                                               
                                @else
                                <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/' . $enfermero->persona->foto_perfil) }} " alt="User profile picture">                                
                                @endif
                            </div>    

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Sexo:</label>
                                    <span class="form-control">{{$enfermero->persona->sexo}}</span>
                                </div>
                            </div>                                                                     
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                                    <span class="form-control">{{$enfermero->persona->fecha_nac}}</span>                           
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Número de documento:</label>
                                    <span class="form-control">{{$enfermero->persona->dni}}</span>                           
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>País de origen:</label>
                                    <span class="form-control">{{$enfermero->persona->pais->nombre}}</span>
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Matricula:</label>
                                    <span class="form-control">{{$enfermero->matricula}}</span>                           
                                </div>
                            </div>  
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Apellido/s:</label>
                                    <span class="form-control">{{$enfermero->persona->apellido}}</span>                           
                                </div>
                            </div>  

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Teléfono:</label>
                                    <span class="form-control">{{$enfermero->persona->telefono}}</span>                           
                                </div>
                            </div>  
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Teléfono de contacto</label>
                                    <span class="form-control">{{$enfermero->persona->telefono_contacto}}</span>                           
                                </div>
                            </div>   

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <span class="form-control">{{$enfermero->persona->email}}</span>                           
                                </div>
                            </div> 
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre/s</label>
                                    <span class="form-control">{{$enfermero->persona->nombre}}</span>                           
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Localidad:</label>
                                    <span class="form-control">{{$enfermero->persona->localidad->nombre}}</span>
                                </div>
                            </div>  

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    <span class="form-control">{{$enfermero->persona->direccion}}</span>
                                </div>
                            </div>
                        </div>  
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('enfermeros.index') }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>
                                 <button title="Registrar un enfermero" type="button" id="boton-modal-crear" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-crear">
                                        <i class="fa fa-plus-circle"></i> &nbsp;registrar enfermero
                                    </button>
                                <div class="pull-right">                                    
                                    <a onclick="completar_campos({{$enfermero}})" title="Editar este registro" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> actualizar registro</a>
                                    <a onclick="abrir_modal_borrar({{$enfermero->id}})" title="Eliminar este registro" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar registro</a>                                       
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>                                               
        </div>
    </section>
</div>
@include('enfermeros.formulario.create')
@include('enfermeros.formulario.editar')
@include('enfermeros.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/enfermero.js') }}"></script>
<script src="{{ asset('js/camara.js') }}"></script>
@endsection
