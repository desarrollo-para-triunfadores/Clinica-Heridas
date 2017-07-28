@extends('partes.index')

@section('title')
Valoraciones específicas registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Valoraciones específicas
            <small>registros almacenados</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
            <li>Valoraciones específicas</li>
            <li class="active">Valoraciones específicas</li>
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
                        <br>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Datos de la valoración</a></li>
                                <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Seguimientos</a></li>                               
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    @include('partes.msj_acciones')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Diagnóstico:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->diagnostico)
                                                    {{$valoracion->diagnostico}}
                                                    @else
                                                    No fue registrado.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>                                                                     
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->fecha)
                                                    {{$valoracion->fecha}}
                                                    @else
                                                    No fue registrado.
                                                    @endif
                                                </p>
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Desencadenante:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->desencadenante)
                                                    {{$valoracion->desencadenante}}
                                                    @else
                                                    No fue registrado.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Complicación:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->complicacion->nombre)
                                                    {{$valoracion->complicacion->nombre}}
                                                    @else
                                                    No fue registrado.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Factores de riesgo:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->factoresriesgo)
                                                    {{$valoracion->factoresriesgo}}
                                                    @else
                                                    No fue registrado.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Signos y síntomas:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->signossintomas)
                                                    {{$valoracion->signossintomas}}
                                                    @else
                                                    No fue registrado
                                                    @endif
                                                </p>
                                            </div>
                                        </div>  
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observaciones:</label>
                                                <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                    @if ($valoracion->observaciones)
                                                    {{$valoracion->observaciones}}
                                                    @else
                                                    No se registró ninguna observación.
                                                    @endif
                                                </p>
                                            </div>
                                        </div>  
                                    </div>  
                                </div>
                                <div class="tab-pane" id="tab_2">

                                    <div class="row">                          
                                        <div class="col-md-12">



                                            
                                            @include('partes.msj_acciones')
                                            <table id="example" class="display" cellspacing="0" width="100%">
                                                <thead>
                                                    <tr>                                  
                                                        <th class="text-center">Grado</th>
                                                        <th class="text-center">Dimesion</th>
                                                        <th class="text-center">Profundidad</th>
                                                        <th class="text-center">Bordes</th>
                                                        <th class="text-center">Tipo de tejido</th>
                                                        <th class="text-center">Exudado</th>
                                                        <th class="text-center">Edema</th>
                                                        <th class="text-center">Dolor</th>
                                                        <th class="text-center">Piel circundante</th>                                
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($valoracion->seguimientos as $seguimiento)
                                                    <tr>                                    
                                                        <td class="text-center text-bold">{{$seguimiento->grado}}</td>
                                                        <td class="text-center text-bold">{{$seguimiento->dimesion}}</td>
                                                        <td class="text-center text-bold">{{$seguimiento->profundidad}}</td>
                                                        <td class="text-center text-bold">{{$seguimiento->bordes}}</td>
                                                        <td class="text-center text-bold">{{$seguimiento->tipotejido}}</td>
                                                        <td class="text-center text-bold">{{$seguimiento->exudado}}</td>
                                                        <td class="text-center text-bold">casa</td>
                                                        <td class="text-center text-bold">{{$seguimiento->dolor}}</td>
                                                        <td class="text-center text-bold">{{$seguimiento->pielcircundante}}</td>                                
                                                        <td class="text-center">
                                                            <a onclick="completar_campos({{$seguimiento}})" title="Editar este registro" class="btn btn-social-icon btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                                            <a onclick="abrir_modal_borrar({{$seguimiento->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr> 
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>                                  
                                                        <th class="text-center">Grado</th>
                                                        <th class="text-center">Dimesion</th>
                                                        <th class="text-center">Profundidad</th>
                                                        <th class="text-center">Bordes</th>
                                                        <th class="text-center">Tipo de tejido</th>
                                                        <th class="text-center">Exudado</th>
                                                        <th class="text-center">Edema</th>
                                                        <th class="text-center">Dolor</th>
                                                        <th class="text-center">Piel circundante</th>                                
                                                        <th class="text-center">Acciones</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div> 


                                    </div>
                                </div>


                            </div>

                        </div>





















                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('pacientes.show', $valoracion->paciente_id) }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>

                                <a href="{{ route('seguimientos.edit', $valoracion->id) }}" title="Agregar seguimiento" class="btn btn-sm btn-success">
                                    <i class="fa fa-plus-circle"></i> &nbsp;registrar seguimiento
                                </a>


                                <div class="pull-right">                                    
                                    <a onclick="completar_campos({{$valoracion}})" title="Editar este registro" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> actualizar registro</a>
                                    <a onclick="abrir_modal_borrar({{$valoracion->id}})" title="Eliminar este registro" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar registro</a>                                       
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>      
            <br>




        </div>
    </section>
</div>





@endsection
@section('script') 
<script src="{{ asset('js/valoracion.js') }}"></script>
@endsection
