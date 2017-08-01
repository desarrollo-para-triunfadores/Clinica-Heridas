@extends('partes.index')

@section('title')
Pacientes registradas
@endsection

@section('content')
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content-header">
        <h1>
            Pacientes
            <small>registrar historia clínica</small>
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
                <form id="commentForm"  action="/historias" method="POST"  class="form-horizontal">
                    <input id="token-create" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input name="paciente_id" id="paciente_id" value="{{$paciente_id}}" type="text" class="hide"> 
                    <div id="rootwizard">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="navbar">
                                    <div class="navbar-inner" style="display: inline-block;">
                                        <div class="container">
                                            <ul>
                                                <li><a href="#tab1" data-toggle="tab"><h4>Antecedentes mórbidos</h2></a></li>
                                                <li><a href="#tab2" data-toggle="tab"><h4>Factores de riesgo</h2></a></li>
                                                <li><a href="#tab3" data-toggle="tab"><h4>Medicamentos</h2></a></li>
                                                <li><a href="#tab4" data-toggle="tab"><h4>Estudios complementarios</h2></a></li>  
                                                <li><a href="#tab5" data-toggle="tab"><h4>Confirmar datos</h2></a></li>
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
                                        <legend>Antecedentes mórbidos</legend>
                                        <div class="row">
                                            <!--Inicio sección diabetes-->
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padece diabetes?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="diabetes" name="diabetes"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Qué tipo?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="tipo_diabetes" name="tipo_diabetes" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="tipo 1">Tipo 1</option>         
                                                            <option value="tipo 2">Tipo 2</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Qué tipo de medicación utiliza?</label>
                                                    <div class="controls">
                                                        <select style="width: 100%" id="medicacion_dbt2" name="medicacion_dbt2"  placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="comprimidos">Comprimidos</option>         
                                                            <option value="comprimidos e insulina">Comprimidos e insulina</option>   
                                                            <option value="insulina">Insulina</option> 
                                                            <option value="">Ninguna</option> 
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                        
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>Fecha aproximada del diagnóstico</label>
                                                    <div class="controls">
                                                        <input name="tiempo_dbt" id="tiempo_dbt" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">   
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Fin sección diabetes-->
                                        </div>
                                        <br>
                                        <div class="row">
                                            <!--Inicio sección acv-->
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padeció un ACV?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="acv" name="acv"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                                                                  
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>Fecha aproximada del episodio de ACV</label>
                                                    <div class="controls">
                                                        <input name="tiempo_acv" id="tiempo_acv" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">   
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Fin sección acv-->  
                                            <!--Inicio sección hipertension-->
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padece de hipertensión arterial?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="hipertension" name="hipertension"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Se trata la hipertensión?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tratamiento_hipertension" name="tratamiento_hipertension"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <!--Fin sección hipertension-->
                                        </div>
                                        <br>
                                        <!--Inicio sección insuficiencias-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padece de insuficiencia cardiaca?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="insuficiencia_cardiaca" name="insuficiencia_cardiaca"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padece de insuficiencia renal?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="insuficiencia_renal" name="insuficiencia_renal"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Le practican hemodiálisis?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="hemodialisis" name="hemodialisis"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>Fecha aproximada de la primer hemodiálisis</label>
                                                    <div class="controls">
                                                        <input name="tiempo_hemodialisis" id="tiempo_hemodialisis" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">   
                                                    </div>
                                                </div>
                                            </div>                                                                                      
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padeció o padece de neuropatía?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="neuropatia" name="neuropatia"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>      
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padece de insuficiencia venosa?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="insuficiencia_venosa" name="insuficiencia_venosa"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>   
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Se trata la insuficiencia venosa?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tratamiento_insuficiencia_venosa" name="tratamiento_insuficiencia_venosa"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Qué tipo de tratamiento?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tipo_tratamiento_insuficiencia_venosa" name="tipo_tratamiento_insuficiencia_venosa"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="drogas">Drogas</option>         
                                                            <option value="cirugía">cirugía</option>  
                                                            <option value="">Ninguna</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                                                                      
                                        </div>             
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padece de arteriopatía periférica?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="arteriopatia_periferica" name="arteriopatia_periferica"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                              
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Se trata la arteriopatía periférica?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tratamiento_arteriopatía_periferica" name="tratamiento_arteriopatia_periferica"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Qué tipo de tratamiento?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tipo_tratamiento_arteriopatía_periferica" name="tipo_tratamiento_arteriopatia_periferica"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="angioplastía">Angioplastía</option>         
                                                            <option value="by pass">By pass</option> 
                                                            <option value="prostaglandía">Prostaglandía</option>  
                                                            <option value="">Ninguna</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                          
                                            <!--Fin sección insuficiencias-->
                                            <!--Inicio sección acv-->
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>¿Padeció un TVP?</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="tvp" name="tvp"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="control-group">
                                                    <label>Fecha aproximada del episodio de TVP</label>
                                                    <div class="controls">
                                                        <input name="tiempo_tvp" id="tiempo_tvp" type="text" placeholder="campo opcional" class="form-control pull-right datepicker">   
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
                                                        <textarea name="observaciones_antecedentes" id="observaciones_antecedentes" class="form-control" rows="3" maxlength="500" placeholder="campo opcional (máximo 500 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="tab-pane" id="tab2">
                                        <legend>Factores de riesgo</legend>



                                        <table id="tblListaFactores" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre del factor</th>                                             
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_factores">
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre del factor</th>                                                    
                                                    <th>Acción</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <hr>
                                        <br>
                                        <input name="cantidad_factores" class="hide" id="cantidad_factores" type="text" >
                                        <button title="Agregar un factor de riesgo" type="button" id="boton-modal-crear" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-agregar-factor">
                                            <i class="fa fa-plus-circle"></i> &nbsp;agregar factor de riesgo
                                        </button>
                                        <br><br>
                                        <hr>






                                    </div>
                                    <div class="tab-pane" id="tab3">
                                        <legend>Medicamentos</legend>
                                        <table id="tblListaCaracteristicas" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nombre de la droga</th>
                                                    <th>Nombre comercial</th>                                                  
                                                    <th>Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_caracteristicas">
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Nombre de la droga</th>
                                                    <th>Nombre comercial</th>                                                    
                                                    <th>Acción</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <hr>
                                        <br>
                                        <input name="cantidad_caracteristicas" class="hide" id="cantidad_caracteristicas" type="text" >
                                        <button title="Agregar un medicamento" type="button" id="boton-modal-crear" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-agregar-medicamento">
                                            <i class="fa fa-plus-circle"></i> &nbsp;agregar medicamento
                                        </button>
                                        <br><br>
                                        <hr>
                                    </div>
                                    <div class="tab-pane" id="tab4">
                                        <legend>Estudios complementarios</legend>
                                        <div class="row">                                        
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Ecografía</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="ecografia" name="ecografia"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>                                           
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Eco doppler</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="eco_doppler" name="eco_doppler" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Rayos x</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="rayos_x" name="rayos_x"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>     
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Arteriografía</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="arteriografia" name="arteriografia" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Se trajo copia del estudio de arteriografía</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="adjunto_arteriografia" name="adjunto_arteriografia" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Resonancia magnética</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%"  id="resonancia_magnetica" name="resonancia_magnetica"  placeholder="campo requerido" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>    
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Centellograma</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="centellograma" name="centellograma" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Cultivo antibiograma</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="cultivo_antibiograma" name="cultivo_antibiograma" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="col-md-4">
                                                <div class="control-group">
                                                    <label>Biopsia</label>
                                                    <div class="controls">
                                                        <select  style="width: 100%" id="biopsia" name="biopsia" placeholder="campo opcional" class="js-example-placeholder-single22 form-control">
                                                            <option value="1">Si</option>         
                                                            <option value="0">No</option>   
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
                                                        <textarea name="observaciones_estudios" id="observaciones_factores" class="form-control" rows="3" maxlength="500" placeholder="campo opcional (máximo 500 caracteres)"></textarea>   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
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



    @include('pacientes.formulario.elemento_seleccionado')
    @include('pacientes.formulario.modal_medicamentos')
    @include('pacientes.formulario.modal_factores')


</div>


@endsection
@section('script') 
<script src="{{ asset('js/historia_nueva.js') }}"></script>
@endsection
