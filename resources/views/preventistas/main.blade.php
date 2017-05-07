@extends('partes.index')

@section('title')
Enfermeros registrados
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
            <li class="active">Enfermeros</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="col-md-9">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <label>&nbsp;Filtrar enfermeros</label>
                                        <select  id="select_enfermero" style="width: 100%" class="select2 form-control form-control-sm" multiple="multiple">
                                            @foreach($enfermeros as $enfermero)
                                            <option value="{{$enfermero->id}}">{{$enfermero->persona->apellido}} {{$enfermero->persona->nombre}}</option>                                                    
                                            @endforeach
                                        </select> 
                                        <small class="form-text text-muted"><strong>Información:</strong> seleccione uno o más enfermeros para filtrarlos en la lista de enfermeros.</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="products-list product-list-in-box">
                        <li class="item">
                            <div class="container" style="width:auto;">
                                <form>
                                    <div class="form-group">
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <label>&nbsp;Nuevo</label>
                                        <button title="Registrar un usuario" type="button" id="boton-modal-crear" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-crear">
                                            <i class="fa fa-plus-circle"></i> &nbsp;registrar enfermero
                                        </button>
                                        <small class="form-text text-muted">&nbsp;</small>
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>               
                <div class="col-md-12">                    
                    @include('partes.msj_acciones')                    
                </div>
                @foreach($enfermeros as $enfermero)                                
                <div id="div{{$enfermero->id}}" class="col-md-4 li_enfermero">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header" style="background-color:{{$enfermero->color}};">
                            <h3 class="widget-user-username"><b>{{$enfermero->persona->apellido}} {{$enfermero->persona->nombre}}</b></h3>
                            <h5 class="widget-user-desc">Registrado {{ $enfermero->created_at->diffForHumans() }}</h5>
                        </div>
                        <div class="widget-user-image">
                           @if ($enfermero->imagen === "sin imagen")                                           
                                <img style="width:90px;height:90px" class="img-circle" src="{{ asset('imagenes/personas/sin-logo.png') }}" alt="User Avatar">                                
                                @else
                                <img  style="width:90px;height:90px" class="img-circle" src="{{ asset('imagenes/personas/' . $enfermero->imagen) }}" alt="User Avatar">                                
                                @endif   
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Matrícula de enfermero</h5>
                                        <span class=" badge" style="background-color:{{$enfermero->color}};">{{$enfermero->matricula}}</span>
                                      
                                    </div>
                                </div>
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">DNI</h5>
                                        <span class=" badge" style="background-color:{{$enfermero->color}};">{{$enfermero->dni}}</span>
                                    
                                    </div>
                                </div>                                
                            </div>                               
                            <hr>                            
                            <div class="row">
                                <div class="col-sm-6 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Cantidad de recorridos</h5>
                                        <span class=" badge" style="background-color:{{$enfermero->color}};">{{$enfermero->rutas->count()}}</span>
                                    </div>
                                </div>
                                <div class="col-sm-6 border-right">
                                    <div class="description-block text-center">                                       
                                        <a onclick="completar_campos({{$enfermero}})"  title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$enfermero->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                  
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>                                                                
                @endforeach
            </div>
        </div>
    </section>
</div>

@include('enfermeros.formulario.create')
@include('enfermeros.formulario.editar')
@include('enfermeros.formulario.confirmar')

@endsection
@section('script') 
<script src="{{ asset('js/enfermeros.js') }}"></script>
@endsection
