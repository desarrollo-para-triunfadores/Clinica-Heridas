@extends('partes.index')

@section('title')
Pacientes registradas
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
    <section id="vista_tabular" class="content hide animated fadeIn">
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
                        <div>
                            Columnas:                        
                            <a class="toggle-vis" href="" data-column="0">Apellido y nombre</a> - 
                            <a class="toggle-vis" href="" data-column="1">Sexo</a> -
                            <a class="toggle-vis" href="" data-column="2">Documento</a> - 
                            <a class="toggle-vis" data-column="3">País de origen</a> -
                            <a class="toggle-vis" href="" data-column="4">Nacimiento</a> - 
                            <a class="toggle-vis" href="" data-column="5">Teléfono</a> - 
                            <a class="toggle-vis" href="" data-column="6">Teléfono contacto</a> -
                            <a class="toggle-vis" href="" data-column="7">Email</a> - 
                            <a class="toggle-vis" href="" data-column="8">Localidad</a> -
                            <a class="toggle-vis" href="" data-column="9">Dirección</a> - 
                            <a class="toggle-vis" href="" data-column="10">Fecha alta</a> -
                            <a class="toggle-vis" href="" data-column="11">Acciones</a>                            
                        </div>
                        <br>
                        <table id="example" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Apellido y nombre</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Documento</th>
                                    <th class="text-center">País de origen</th>
                                    <th class="text-center">Nacimiento</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Teléfono contacto</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Localidad</th> 
                                    <th class="text-center">Dirección</th>                                                                       
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pacientes as $paciente)
                                <tr>
                                    <td class="text-center text-bold">{{$paciente->persona->apellido}} {{$paciente->persona->nombre}}</td>
                                    <td class="text-center">{{$paciente->persona->sexo}}</td>
                                    <td class="text-center">{{$paciente->persona->dni}}</td>
                                    <td class="text-center">{{$paciente->persona->pais->nombre}}</td>
                                    <td class="text-center">{{$paciente->persona->fecha_nac}}</td>
                                    <td class="text-center">{{$paciente->persona->telefono}}</td>
                                    <td class="text-center">{{$paciente->persona->telefono_contacto}}</td>
                                    <td class="text-center">{{$paciente->persona->email}}</td>
                                    <td class="text-center">{{$paciente->persona->localidad->nombre}}</td>
                                    <td class="text-center">{{$paciente->persona->direccion}}</td>
                                    <td class="text-center">{{$paciente->persona->created_at->format('d/m/Y')}}</td>
                                    <td class="text-center">
                                        <a onclick="completar_campos({{$paciente}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a onclick="abrir_modal_borrar({{$paciente->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>                                                                                                                       
                                        <a href="{{ route('pacientes.show', $paciente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">Apellido y nombre</th>
                                    <th class="text-center">Sexo</th>
                                    <th class="text-center">Documento</th>
                                    <th class="text-center">País de origen</th>
                                    <th class="text-center">Nacimiento</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Teléfono contacto</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Localidad</th> 
                                    <th class="text-center">Dirección</th>                                                                       
                                    <th class="text-center">Fecha alta</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <button onclick="cambiar_vista(true)" title="Cambiar a vista resumida" type="button" class="btn btn-default">
                                        <i class="fa fa-list-ul"></i> &nbsp;cambiar vista
                                    </button>
                                    <button title="Registrar un paciente" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                                        <i class="fa fa-plus-circle"></i> &nbsp;registrar paciente
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>                                               
        </div>
    </section>
    <section id="vista_resumida" class="content animated fadeIn">
        <br>
        <div class="row">
            <div class="col-md-8">
                <ul class="products-list product-list-in-box">
                    <li class="item">
                        <div class="container" style="width:auto;">
                            <form>
                                <div class="form-group">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <label>&nbsp;Filtrar pacientes</label>
                                    <select  style="width: 100%"id="select_filtro" class="select2 form-control form-control-sm" multiple="multiple">
                                        @foreach($pacientes as $paciente)
                                        <option value="{{$paciente->id}}">{{$paciente->persona->apellido}} {{$paciente->persona->nombre}}</option>                                                    
                                        @endforeach
                                    </select> 
                                    <small class="form-text text-muted"><strong>Información:</strong> seleccione uno o más enfermeros para filtrarlos en la lista de enfermeros.</small>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-2">
                <ul class="products-list product-list-in-box">
                    <li class="item">
                        <div class="container" style="width:auto;">
                            <form>
                                <div class="form-group">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                    <label>&nbsp;Visualización</label>
                                    <button title="Cambiar a vista tabulada" type="button" onclick="cambiar_vista(false)" class="btn btn-default btn-block">
                                        <i class="fa fa-list"></i> &nbsp;cambiar vista
                                    </button>
                                    <small class="form-text text-muted">&nbsp;</small>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div> 
            <div class="col-md-2">
                <ul class="products-list product-list-in-box">
                    <li class="item">
                        <div class="container" style="width:auto;">
                            <form>
                                <div class="form-group">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                    <label>&nbsp;Nuevo</label>
                                    <button title="Registrar un enfermero" type="button" id="boton-modal-crear" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-crear">
                                        <i class="fa fa-plus-circle"></i> &nbsp;registrar paciente
                                    </button>
                                    <small class="form-text text-muted">&nbsp;</small>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>  
        </div>
        <br>
        <br>
        <div class="row">
            @foreach($pacientes as $paciente)
            <div class="col-md-3 li_item animated pulse" id="{{$paciente->id}}">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if ($paciente->persona->foto_perfil === "sin imagen")                                                                                                                                    
                        <img style="width:100px;height:100px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/sin-logo.png') }}" alt="User profile picture">                                                               
                        @else
                        <img style="width:100px;height:100px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/' . $paciente->persona->foto_perfil) }} " alt="User profile picture">                                
                        @endif
                        <h3 class="profile-username text-center">{{$paciente->persona->apellido}} {{$paciente->persona->nombre}}</h3>
                        <p class="text-muted text-center">registrado {{$paciente->persona->created_at->diffForHumans()}}</p>
                        <br>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                @if ($paciente->persona->telefono_contacto)                                                                                                                                    
                                <b>Teléfonos</b> <a class="pull-right">{{$paciente->persona->telefono}} - {{$paciente->persona->telefono_contacto}}</a>
                                @else
                                <b>Teléfono</b> <a class="pull-right">{{$paciente->persona->telefono}}</a>
                                @endif
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{$paciente->persona->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Dirección</b> <a class="pull-right">{{$paciente->persona->direccion}}</a>
                            </li>
                        </ul>
                        <div style="text-align: center;">
                            <a onclick="completar_campos({{$paciente}})" title="Editar este registro" class="btn  btn-warning btn-sm"><i class="fa fa-pencil"></i> actulizar</a>
                            <a onclick="abrir_modal_borrar({{$paciente->id}})" title="Eliminar este registro" class="btn  btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar</a>
                            <a href="{{ route('pacientes.show', $paciente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-sm btn-info"><i class="fa fa-list"> visualizar</i></a>
                        </div>

                    </div>
                </div>              
            </div>
            @endforeach
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
