@extends('partes.index')

@section('title')
Pacientes registrados
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Registrar valoración específica
            <small>y primer seguimiento</small>
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
                 <a href="{{ route('pacientes.show', $paciente_id) }}" title="volver a la pantalla anterior" class="btn btn-default btn-sm"><i class="fa fa-arrow-left"></i> volver</a>
                
                <br>
                
                <br>
                
                <form id="commentForm"  action="/valoraciones" method="POST"  class="form-horizontal">
                    <input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="paciente_id" id="paciente_id" value="{{$paciente_id}}" type="text" class="hide"> 
                    <div id="rootwizard">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="navbar">
                                    <div class="navbar-inner" style="display: inline-block;">
                                        <div class="container">
                                            <ul>
                                                <li><a href="#tab1" data-toggle="tab"><h4>Datos básicos</h2></a></li>
                                                <li><a href="#tab2" data-toggle="tab"><h4>Primer seguimiento</h2></a></li>          
                                                <li><a href="#tab3" data-toggle="tab"><h4>Tratamiento</h2></a></li> 
                                                <li><a href="#tab4" data-toggle="tab"><h4>Confirmar datos</h2></a></li>  
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div id="bar" class="progress">
                                    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                </div>
                            </div>                                         
                        </div>
                        <div class="box">
                            <div class="box-body ">                            
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab1">
                                        <legend>Datos básicos</legend>
                                        <div class="row">                                           
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Diagnóstico</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="diagnostico" name="diagnostico"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="presuntivo">Presuntivo</option>         
                                                            <option value="definitivo">Definitivo</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                 
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Fecha</label>
                                                    <div class="controls">
                                                        <input name="fecha" id="fecha" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">   
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Complicación:</label>
                                                    <div class="controls">
                                                        <select style="width: 100%"  name="complicacion_id"  placeholder="campo requerido"  class="select2 form-control">
                                                            @foreach($complicaciones as $complicacion)
                                                            <option value="{{$complicacion->id}}">{{$complicacion->nombre}}</option>                                                    
                                                            @endforeach
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="control-group">
                                                    <label>Desencadenante</label>
                                                    <div class="controls">
                                                        <textarea name="desencadenante" id="desencadenante" class="form-control" rows="3" maxlength="1000" placeholder="campo opcional (máximo 1000 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>                                    
                                            <div class="col-md-6">
                                                <div class="control-group">
                                                    <label>Factores de riesgo</label>
                                                    <div class="controls">
                                                        <textarea name="factoresriesgo" id="factoresriesgo" class="form-control" rows="3" maxlength="1000" placeholder="campo opcional (máximo 1000 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="control-group">
                                                    <label>Signos y síntomas</label>
                                                    <div class="controls">
                                                        <textarea name="signossintomas" id="signossintomas" class="form-control" rows="3" maxlength="1000" placeholder="campo opcional (máximo 1000 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="control-group">
                                                    <label>Observaciones</label>
                                                    <div class="controls">
                                                        <textarea name="observaciones_valoracion" id="observaciones_valoracion" class="form-control" rows="3" maxlength="500" placeholder="campo opcional (máximo 500 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                                                                                                  



                                    <div class="tab-pane" id="tab2">
                                        <legend>Primer seguimiento</legend>

                                        <div class="row">                                           
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Grado</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="grado" name="grado"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="1">1</option>         
                                                            <option value="2">2</option>   
                                                            <option value="3">3</option>         
                                                            <option value="4">4</option>   
                                                            <option value="5">5</option>                                                                     
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                 
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Dimesión</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="dimesion" name="dimesion"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="0-4 cm°">0-4 cm°</option>         
                                                            <option value="4-16 cm°">4-16 cm°</option>   
                                                            <option value="16-36 cm°">16-36 cm°</option>         
                                                            <option value="36-64 cm°">36-64 cm°</option>   
                                                            <option value="64-100 cm°">64-100 cm°</option>    
                                                            <option value="mayor a 100 cm°">mayor a 100 cm°</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Profundidad</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="profundidad" name="profundidad"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="Cicatrizada">Cicatrizada</option>         
                                                            <option value="Epidermis-Dermis">Epidermis-Dermis</option>   
                                                            <option value="Hipodermis">Hipodermis</option>         
                                                            <option value="Músculo">Músculo</option>   
                                                            <option value="Hueso/Tejido anexo">Hueso/Tejido anexo</option>     
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <br>



                                        <div class="row">                                           
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Bordes</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="bordes" name="bordes"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="No distinguible">No distinguible</option>         
                                                            <option value="Difuso">Difuso</option>   
                                                            <option value="Delimitados">Delimitados</option>         
                                                            <option value="Dañados">Dañados</option>   
                                                            <option value="Engrosado">Engrosado</option>    
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                 
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Tipo de tejido</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tipotejido" name="tipotejido"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="Cicatrización">Cicatrización</option>         
                                                            <option value="Epitelial">Epitelial</option>   
                                                            <option value="Granulación">Granulación</option>         
                                                            <option value="Necrótico y/o Esfacelo">Necrótico y/o Esfacelo</option>   
                                                            <option value="Necrótico">Necrótico</option>    
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Exudado</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="exudado" name="exudado"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="Húmedo">Húmedo</option>         
                                                            <option value="Mojado">Mojado</option>   
                                                            <option value="Saturado">Saturado</option>         
                                                            <option value="Con Fuga">Con Fuga</option>   
                                                            <option value="Seco">Seco</option>      
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <br>



                                        <div class="row">                                           
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Edema</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="edema" name="edema"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="Ausente">Ausente</option>         
                                                            <option value="+">+</option>   
                                                            <option value="++">++</option>         
                                                            <option value="+++">+++</option>   
                                                            <option value="++++">++++</option>    
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                                                 
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Dolor</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="dolor" name="dolor"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="0-1">0-1</option>         
                                                            <option value="2-3">2-3</option>   
                                                            <option value="4-5">4-5</option>         
                                                            <option value="6-7">6-7</option>   
                                                            <option value="9-10">9-10</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Piel circundante</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="pielcircundante" name="pielcircundante"  placeholder="campo requerido" class="select2 form-control">
                                                            <option value="Sana">Sana</option>         
                                                            <option value="Descamada">Descamada</option>   
                                                            <option value="Eritematosa">Eritematosa</option>         
                                                            <option value="Macerada">Macerada</option>   
                                                            <option value="Gangrenosa">Gangrenosa</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="control-group">
                                                    <label>Observaciones</label>
                                                    <div class="controls">
                                                        <textarea name="observaciones_seguimiento" id="observaciones_seguimiento" class="form-control" rows="3" maxlength="500" placeholder="campo opcional (máximo 500 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <legend>Tratamiento</legend>
                                        <table id="tblListaCaracteristicas" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>                                                  
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_caracteristicas">
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>                                                  
                                                    <th>Acción</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <hr>
                                        <br>
                                        <input name="cantidad_caracteristicas" class="hide" id="cantidad_caracteristicas" type="text" >
                                        <button title="Agregar un tratamiento" type="button" id="boton-modal-crear" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-agregar-tratamiento">
                                            <i class="fa fa-plus-circle"></i> &nbsp;agregar tratamiento
                                        </button>
                                        <br><br>
                                        <hr>
                                    </div>


                                    <div class="tab-pane" id="tab4">
                                        <legend>Confirmar datos</legend>
                                        <div class="callout callout-info">
                                            <p style="font-size:14pt;">Está a punto de registrar una serie de datos que conformarán a la historia clinica del paciente. Si usted se encuentra seguro puede proseguir dando un click en registrar datos.</p>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                    <ul class="pager wizard">

                                        <li class="previous">
                                            <a href="#">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
                                                &nbsp;volver
                                            </a>
                                        </li>

                                        <li class="next">
                                            <a href="#">                                               
                                                siguiente&nbsp;
                                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                            </a>
                                        </li>

                                        <li class="finish">
                                            <a href="javascript:;">
                                                <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                &nbsp;registrar datos
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>

                </form>











            </div>                                               
        </div>
    </section>




</div>


@include('valoraciones.formulario.elemento_seleccionado')
@include('valoraciones.formulario.modal_tratamientos')


@endsection
@section('script') 
<script src="{{ asset('js/valoracion.js') }}"></script>
@endsection
