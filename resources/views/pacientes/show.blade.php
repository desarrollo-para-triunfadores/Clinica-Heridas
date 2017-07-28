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

                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Datos identificatorios</a></li>
                                <li><a href="#tab_2" data-toggle="tab" aria-expanded="false">Antecedentes mórbidos</a></li>
                                <li><a href="#tab_3" data-toggle="tab" aria-expanded="true">Factores de riesgo</a></li>
                                <li><a href="#tab_4" data-toggle="tab" aria-expanded="true">Medicamentos</a></li>      
                                <li><a href="#tab_5" data-toggle="tab" aria-expanded="true">Estudios complementarios</a></li>  
                                <li><a href="#tab_6" data-toggle="tab" aria-expanded="true">Valoraciones específicas</a></li>  
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">


                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            @if ($paciente->persona->foto_perfil === "sin imagen")                                                                                                                                    
                                            <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/sin-logo.png') }}" alt="User profile picture">                                                               
                                            @else
                                            <img style="width:200px;height:200px"  alt="User Image" class="profile-user-img img-responsive img-circle" src="{{ asset('imagenes/personas/' . $paciente->persona->foto_perfil) }} " alt="User profile picture">                                
                                            @endif
                                        </div>    

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Sexo:</label>
                                                <span class="form-control">{{$paciente->persona->sexo}}</span>
                                            </div>
                                        </div>                                                                     
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento:</label>
                                                <span class="form-control">{{$paciente->persona->fecha_nac}}</span>                           
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Número de documento:</label>
                                                <span class="form-control">{{$paciente->persona->dni}}</span>                           
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>País de origen:</label>
                                                <span class="form-control">{{$paciente->persona->pais->nombre}}</span>
                                            </div>
                                        </div>  

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Obra social:</label>
                                                <span class="form-control">{{$paciente->obrasocial->nombre}}</span>
                                            </div>
                                        </div>  
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Médico de cabecera:</label>
                                                <span class="form-control">{{$paciente->medico->nombre}}</span>
                                            </div>
                                        </div>                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Apellido/s:</label>
                                                <span class="form-control">{{$paciente->persona->apellido}}</span>                           
                                            </div>
                                        </div>  

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Teléfono:</label>
                                                @if ($paciente->persona->telefono)
                                                <span class="form-control">{{$paciente->persona->telefono}}</span>  
                                                @else
                                                <span class="form-control">No fue registrado</span>
                                                @endif
                                            </div>
                                        </div>  
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Teléfono de contacto</label>
                                                @if ($paciente->persona->telefono_contacto)
                                                <span class="form-control">{{$paciente->persona->telefono_contacto}}</span>
                                                @else
                                                <span class="form-control">No fue registrado</span>
                                                @endif

                                            </div>
                                        </div>   

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Email</label>
                                                @if ($paciente->persona->email)
                                                <span class="form-control">{{$paciente->persona->email}}</span> 
                                                @else
                                                <span class="form-control">No fue registrado</span>
                                                @endif
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nombre/s</label>
                                                <span class="form-control">{{$paciente->persona->nombre}}</span>                           
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Localidad:</label>
                                                <span class="form-control">{{$paciente->persona->localidad->nombre}}</span>
                                            </div>
                                        </div>  

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dirección:</label>
                                                @if ($paciente->persona->direccion)
                                                <span class="form-control">{{$paciente->persona->direccion}}</span>
                                                @else
                                                <span class="form-control">No fue registrado</span>
                                                @endif                                                
                                            </div>
                                        </div>
                                    </div>            
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <br>                          
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padece diabetes?</label>
                                                @if ($paciente->antecedentes->diabetes)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif
                                            </div>
                                        </div>                                                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Qué tipo?</label>
                                                @if ($paciente->antecedentes->tipo_diabetes)
                                                <span class="form-control">{{$paciente->antecedentes->tipo_diabetes}}</span>  
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Qué tipo de medicación utiliza?</label>
                                                @if ($paciente->antecedentes->medicacion_dbt2)
                                                <span class="form-control">{{$paciente->antecedentes->medicacion_dbt2}}</span>   
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha aproximada del diagnóstico</label>
                                                @if ($paciente->antecedentes->tiempo_dbt)
                                                <span class="form-control">{{$paciente->antecedentes->tiempo_dbt}}</span>
                                                @elseif ($paciente->antecedentes->diabetes)
                                                <span class="form-control">No fue registrado</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padeció un ACV?</label>
                                                @if ($paciente->antecedentes->acv)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                                           
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha aproximada del episodio de ACV</label>
                                                @if ($paciente->antecedentes->tiempo_acv)
                                                <span class="form-control">{{$paciente->antecedentes->tiempo_acv}}</span>
                                                @elseif ($paciente->antecedentes->acv === '1')
                                                <span class="form-control">No fue registrado</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif
                                            </div>
                                        </div>                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padece de hipertensión arterial?</label>
                                                @if ($paciente->antecedentes->hipertension)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                           
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Se trata la hipertensión?</label>
                                                @if ($paciente->antecedentes->tratamiento_hipertension)
                                                <span class="form-control">Sí</span>
                                                @elseif ($paciente->antecedentes->hipertension)
                                                <span class="form-control">No</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif                      
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padece de insuficiencia cardiaca?</label>
                                                @if ($paciente->antecedentes->insuficiencia_cardiaca)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                       
                                            </div>
                                        </div>   
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padece de insuficiencia renal?</label>
                                                @if ($paciente->antecedentes->insuficiencia_renal)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                      
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Le practican hemodiálisis?</label>
                                                @if ($paciente->antecedentes->hemodialisis)
                                                <span class="form-control">Sí</span>
                                                @elseif ($paciente->antecedentes->insuficiencia_renal)
                                                <span class="form-control">No</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif                        
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha aproximada de la primer hemodiálisis</label>
                                                @if ($paciente->antecedentes->tiempo_hemodialisis)
                                                <span class="form-control">{{$paciente->antecedentes->tiempo_hemodialisis}}</span>
                                                @elseif ($paciente->antecedentes->insuficiencia_renal)
                                                <span class="form-control">No fue registrado</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif 
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padeció o padece de neuropatía?</label>
                                                @if ($paciente->antecedentes->neuropatia)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padece de insuficiencia venosa?</label>
                                                @if ($paciente->antecedentes->insuficiencia_venosa)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Se trata la insuficiencia venosa?</label>
                                                @if ($paciente->antecedentes->tratamiento_insuficiencia_venosa)
                                                <span class="form-control">Sí</span>
                                                @elseif ($paciente->antecedentes->insuficiencia_venosa)
                                                <span class="form-control">No</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Qué tipo de tratamiento?</label>
                                                @if ($paciente->antecedentes->tratamiento_insuficiencia_venosa)
                                                <span class="form-control">{{$paciente->antecedentes->tipo_tratamiento_insuficiencia_venosa}}</span>
                                                @elseif ($paciente->antecedentes->tratamiento_insuficiencia_venosa)
                                                <span class="form-control">No corresponde</span>                                    
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padece de arteriopatía periférica?</label>
                                                @if ($paciente->antecedentes->arteriopatia_periferica)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Se trata la arteriopatía periférica?</label>
                                                @if ($paciente->antecedentes->tratamiento_arteriopatia_periferica)
                                                <span class="form-control">Sí</span>
                                                @elseif ($paciente->antecedentes->arteriopatia_periferica)
                                                <span class="form-control">No</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif                                                
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Qué tipo de tratamiento?</label>
                                                @if ($paciente->antecedentes->tipo_tratamiento_arteriopatia_periferica)
                                                <span class="form-control">{{$paciente->antecedentes->tipo_tratamiento_arteriopatia_periferica}}</span>
                                                @elseif ($paciente->antecedentes->tratamiento_arteriopatia_periferica)                                               
                                                <span class="form-control">No corresponde</span>
                                                @endif 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Padeció un TVP?</label>
                                                @if ($paciente->antecedentes->tvp)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                                             
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha aproximada del episodio de TVP</label>
                                                @if ($paciente->antecedentes->tiempo_tvp)
                                                <span class="form-control">{{$paciente->antecedentes->tiempo_tvp}}</span>
                                                @elseif ($paciente->antecedentes->tvp)
                                                <span class="form-control">No fue registrado</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif   
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                @if ($paciente->antecedentes->observaciones)
                                                <span class="form-control">{{$paciente->antecedentes->observaciones}}</span>
                                                @else
                                                <span class="form-control">No se registró ninguna observación</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>            
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <table id="tabla_factores" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>                                  
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paciente->factores_paciente as $factor_paciente)
                                            <tr>
                                                <td class="text-center text-bold">{{$factor_paciente->factor->nombre}}</td>         
                                                <td class="text-center">                                                  
                                                    <a onclick="abrir_modal_borrar({{$factor_paciente->factor->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>                                  
                                                <th class="text-center">Nombre</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_4">
                                    <table id="tabla_medicamentos" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>                                  
                                                <th class="text-center">Nombre comercial</th>
                                                <th class="text-center">Nombre droga</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paciente->MedicacionPaciente as $MedicacionPaciente)
                                            <tr>
                                                <td class="text-center text-bold">{{$MedicacionPaciente->medicamento->nombre_comercial}}</td>   
                                                <td class="text-center text-bold">{{$MedicacionPaciente->medicamento->nombre_droga}}</td>    
                                                <td class="text-center">                                                  
                                                    <a onclick="abrir_modal_borrar({{$MedicacionPaciente->medicamento->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>                                  
                                                <th class="text-center">Nombre comercial</th>
                                                <th class="text-center">Nombre droga</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table>   
                                </div>
                                <div class="tab-pane" id="tab_5">


                                    <br>                          
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ecografía</label>
                                                @if ($paciente->estudios->ecografia)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif
                                            </div>
                                        </div>                                                                     
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Eco doppler</label>
                                                @if ($paciente->estudios->eco_doppler)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                
                                            </div>
                                        </div> 
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Rayos x</label>
                                                @if ($paciente->estudios->rayos_x)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                         
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Arteriografía</label>
                                                @if ($paciente->estudios->arteriografia)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif
                                            </div>
                                        </div>  

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>¿Se adjuntó una copia de la arteriografía?</label>
                                                @if ($paciente->estudios->adjunto_arteriografia)
                                                <span class="form-control">Sí</span>
                                                @elseif ($paciente->estudios->arteriografia)
                                                <span class="form-control">No</span>
                                                @else
                                                <span class="form-control">No corresponde</span>
                                                @endif
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Resonancia magnética</label>
                                                @if ($paciente->estudios->resonancia_magnetica)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif 
                                            </div>
                                        </div>                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Centellograma</label>
                                                @if ($paciente->estudios->centellograma)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                          
                                            </div>
                                        </div>  

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cultivo antibiograma</label>
                                                @if ($paciente->estudios->cultivo_antibiograma)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                         
                                            </div>
                                        </div>  
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Biopsia</label>
                                                @if ($paciente->estudios->biopsia)
                                                <span class="form-control">Sí</span>
                                                @else
                                                <span class="form-control">No</span>
                                                @endif                         
                                            </div>
                                        </div>   

                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Observaciones</label>
                                                @if ($paciente->antecedentes->observaciones)
                                                <span class="form-control">{{$paciente->antecedentes->observaciones}}</span>
                                                @else
                                                <span class="form-control">No se registró ninguna observación</span>
                                                @endif                                                
                                            </div>
                                        </div>
                                    </div>            
                                </div>

                                <div class="tab-pane" id="tab_6">



                                    <table id="tabla_valoraciones" class="row-border responsive hover order-column" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>                                  
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Diagnóstico</th>
                                                <th class="text-center">Complicación</th>
                                                <th class="text-center">Cantidad de seguimientos</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($paciente->valoraciones as $valoracion)
                                            <tr>
                                                <td class="text-center text-bold">{{$valoracion->fecha}}</td>   
                                                <td class="text-center text-bold">{{$valoracion->diagnostico}}</td> 
                                                <td class="text-center text-bold">{{$valoracion->complicacion->nombre}}</td>   
                                                <td class="text-center text-bold">{{$valoracion->seguimientos->count()}}</td>    
                                                <td class="text-center">                                                  
                                                    <a onclick="abrir_modal_borrar({{$valoracion->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                                    <a href="{{ route('valoraciones.show', $valoracion->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>                                  
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center">Diagnóstico</th>
                                                <th class="text-center">Complicación</th>
                                                <th class="text-center">Cantidad de seguimientos</th>
                                                <th class="text-center">Acciones</th>
                                            </tr>
                                        </tfoot>
                                    </table> 
                                    <br>




                                </div>

                            </div>
                        </div>



                    </div> 
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('pacientes.index') }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>
                                <button title="Registrar un enfermero" type="button" id="boton-modal-crear" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-crear">
                                    <i class="fa fa-plus-circle"></i> &nbsp;registrar paciente
                                </button>
                                <a href="{{ route('valoraciones.edit', $paciente->id) }}" title="Visualizar el detalle de este registro" class="btn btn-success btn-sm">
                                    <i class="fa fa-plus-circle"></i> &nbsp;agregar valoración específica
                                </a>
                                <div class="pull-right">                                    
                                    <a onclick="completar_campos({{$paciente}})" title="Editar este registro" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> actualizar registro</a>
                                    <a onclick="abrir_modal_borrar({{$paciente->id}})" title="Eliminar este registro" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> eliminar registro</a>                                       
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>                                               
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
