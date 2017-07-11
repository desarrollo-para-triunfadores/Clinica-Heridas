@extends('partes.index')

@section('title')
    Registrar entrada Paciente
@endsection

@section('content')

    <div class="content-wrapper" id="creacion-recepcion" style="min-height: 916px;" xmlns="http://www.w3.org/1999/html">
        <section class="content-header">
            <h1>
                Recepcion / Mesa de Entrada
                <small>registros almacenados</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-suitcase"></i> Generales</a></li>
                <li>Inmuebles</li>
                <li class="active">Mesa de  Entrada</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-15">
                    <br>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-mobile" aria-hidden="true"></i>
                            <h3 class="box-title"> Registros</h3>
                        </div>
                        <div class="box-body ">
<!--

                            <CENTER>
                                <TABLE BORDER>

                                    <TR>
                                        <TD>Nombre:</TD>
                                        <TD> <INPUT TYPE="text" NAME="nombre" SIZE=18 MAXLENGTH=18> F.Nac.:
                                            <INPUT TYPE="text" NAME="edad" SIZE=8 MAXLENGTH=8> DNI:
                                            <INPUT TYPE="text" NAME="dni" SIZE=8 MAXLENGTH=8></TD>

                                    <TR>
                                        <TD>Apellidos:</TD>
                                        <TD> <INPUT TYPE="text" NAME="apellidos" SIZE=48 MAXLENGTH=48></TD>

                                    <TR>
                                        <TD>Calle y número:</TD>
                                        <TD> <INPUT TYPE="text" NAME="domicilio" SIZE=48 MAXLENGTH=48></TD>

                                    <TR>
                                        <TD>Código Postal:</TD>
                                        <TD> <INPUT TYPE="text" NAME="postal" SIZE=5 MAXLENGTH=5>Ciudad:
                                            <INPUT TYPE="text" NAME="localidad" SIZE=36 MAXLENGTH=36></TD>

                                    <TR>
                                        <TD>Provincia: </TD>
                                        <TD> <INPUT TYPE="text" NAME="provincia" SIZE=20 MAXLENGTH=20>                Teléfono:
                                            <INPUT TYPE="text" NAME="telefono" SIZE=19 MAXLENGTH=19></TD>

                                    <TR>
                                        <TD>Opción:</TD>
                                        <TD> <SELECT NAME="OPCION">
                                                <OPTION>OPCION 1
                                                <OPTION>OPCION 2
                                                <OPTION>OPCION 3
                                                <OPTION>OPCION 4
                                                <OPTION>OPCION 5

                                            </SELECT>Escoja una opción</TD>

                                    <TR>
                                        <TD>Comentarios<BR> personales:</TD>
                                        <TD> <TEXTAREA NAME="coment" ROWS=2 COLS=48></TEXTAREA></TD>

                                    <TR>
                                        <TD><B>Pulse aquí:</B></TD>
                                        <TD ALIGN=CENTER>
                                            <INPUT TYPE="submit" VALUE="Enviar datos ">
                                            <INPUT TYPE="reset" VALUE="Borrar los datos"></TD>

                                </TABLE>
                            </CENTER>
-->

                            <form action="/admin/recepcionpacientes" method="POST" id="form-inmueble" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div id="wizard-recepcion-paciente">
                                    <h2>Paciente</h2>
                                    <section>
                                        <legend>
                                            Seleccione el Paciente
                                        </legend>
                                        <div class="col-md-12 controls">
                                            <div class="row">
                                                <div class="col-xs-4">
                                                    <div class="form-group">
                                                        <label>Paciente:</label>
                                                        <select style="width: 100%"  name="persona_id" id="persona_id"  placeholder="campo requerido"  class="select3 form-control">
                                                            <option value="">-</option>
                                                            @foreach($pacientes as $paciente)
                                                                <option value="{{$paciente->id}}">{{$paciente->persona->nombre}} {{$paciente->persona->apellido}} - tel: {{$paciente->persona->telefono}} </option>
                                                            @endforeach
                                                        </select>
                                                        <input id="add-propietario_chk" onclick="mostrarFormPropietario()" type="checkbox">El Propietario no aparece en la lista</input>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br><br>

                                        <button title="Registrar un enfermero" type="button" id="boton-modal-crear" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-crear">
                                            <i class="fa fa-plus-circle"></i> &nbsp;Registrar nuevo paciente
                                        </button>
                                    </section>

                                    <h2>Antecedentes Mórbidos</h2>
                                    <section>
                                        <legend>Antecedentes Mórbidos</legend>

                                        <div class="col-md-8 controls">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Diabetes</label>
                                                    <select style="width: 90%" NAME="diabetes" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Tipo</label>
                                                        <input name="tipo_diabetes" type="number" id="valorAlquiler" min="0" maxlength="3" class="form-control" placeholder="campo requerido" >
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label>Fecha deteccion:</label>
                                                    <input name="fecha_diabetes" id="fecha_diabetes"  type="date" class="datepicker" placeholder="campo requerido" title="Seleccione la fecha (aprox) de deteccion de la diabetes)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 controls">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Insufic. Renal:</label>
                                                    <select style="width: 90%" NAME="irenal" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Insufic. Respiratoria:</label>
                                                    <select style="width: 90%" NAME="irespiratoria" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Insufic. Cardiaca:</label>
                                                    <select style="width: 90%" NAME="irenal" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Insufic. Venosa:</label>
                                                    <select style="width: 90%" NAME="irenal" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>ACV:</label>
                                                    <select style="width: 60%" name="" id=""  class="select3 form-control" placeholder="campo requerido" >
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                        <label>Fecha:</label>
                                                        <input name="fecha_acv" id="fecha_acv" type="date" class="datepicker" title="fecha aproximada del accidente cerebro-vascular" placeholder="campo requerido" >
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-9 controls">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label>Neuropatia:</label>
                                                    <select style="width: 90%" NAME="neuropatia" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>HTA:</label>
                                                    <select style="width: 60%" name="" id=""  class="select3 form-control" placeholder="campo requerido" >
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Tratamiento:</label>
                                                    <input name="tratamiento_hta" id="tratamiento_hta" type="text" class="" title="Tratamiento que tiene la HTA" placeholder="" >
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 controls">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Otros</label>
                                                        <input name="otros_antecedentes_morbidos" id="otros_antecedentes_morbidos" type="text" maxlength="500" class="form-control" placeholder="campo opcional." >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                        <TABLE class="table-responsive" width="90%" BORDER>
                                            <TR>
                                                <TD>Diabetes:
                                                    <select style="width: 20%" NAME="diabetes" MAXLENGTH=5 class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                    Tipo:<input style="width: 20%" class="form-control" id="tipo_diabetes" type="number" min="0" max="3">
                                                </TD>
                                                <TD>Fecha: <input id="fecha_diabetes" type="date" title="Fecha aprox de deteccion de la diabetes" class="datepicker" ></TD>
                                            </TR>
                                            <TR>
                                                <TD>Insuficiencia Cardíaca:
                                                    <select style="width: 20%"  name="insuficiencia_cardiaca" MAXLENGTH=5 id="insuficiencia_cardiaca" placeholder="campo requerido"  class="select3 form-control">
                                                            <option value=true>Si</option>
                                                            <option value=false>No</option>
                                                    </select>
                                                </TD>
                                                <TD>Insuficiencia Renal:
                                                    <select style="width: 20%"  name="insuficiencia_renal" MAXLENGTH=5 id="insuficiencia_renal" placeholder="campo requerido"  class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </TD>
                                                <TD>Insuficiencia Respiratoria:
                                                    <select style="width: 20%"  name="insuficiencia_respiratoria" MAXLENGTH=5 id="insuficiencia_respiratoria" placeholder="campo requerido"  class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </TD>
                                            </TR>
                                            <TR>
                                                <TD>ACV:
                                                <SELECT NAME="acv">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </SELECT>
                                                    Fecha ACV: <input style="width: 90%"  name="fecha_avc" id="fecha_acv" type="date" placeholder="campo requerido"  class="datepicker"></input>
                                                </TD>
                                                <TD>
                                                    <label>Colesterol Alto</label>
                                                    <select style="width: 20%"  name="colesterol_alto" id="colesterol_alto"  placeholder="campo requerido"  class="select3 form-control">
                                                        <option value=true>Si</option>
                                                        <option value=false>No</option>
                                                    </select>
                                                </TD>
                                            </TR>
                                            <TR>
                                                <TD>
                                                    Comentarios:
                                                    <TEXTAREA NAME="coment" ROWS=2 COLS=48></TEXTAREA>
                                                </TD>
                                        </TABLE>
                                        -->
                                    </section>
                                        {{-- FIN Antecedentes Morbidos --}}

                                        {{-- Tratamiento Medicamentoso--}}
                                    <h2>Tratamiento Medicamentoso</h2>
                                    <section>
                                        <legend>Tratamiento Medicamentoso</legend>
                                        <div class="col-md-8 controls">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Seleccione el tratamiento:</label>
                                                        <select style="width: 40%"  title="Seleccione el tratamiento que sigue el paciente de la lista desplegable" name="tratamiento_medicamentoso_id"  id="tratamiento_medicamentoso_id" placeholder="campo requerido"  class="select3 form-control">
                                                            <option value="1">Tratamiento "A"</option>
                                                            <option value="2">Tratamiento "B"</option>
                                                            <option value="3">Tratamiento "C"</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <button title="Registrar un nombre de tratamiento" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                                                    <i class="fa fa-plus-circle"></i> &nbsp;Registrar Tratamiento
                                                </button>
                                            </div>
                                        </div>
                                    </section>

                                        {{-- FACTORES DE RIESGO--}}
                                    <h2>Factores de Riesgo</h2>
                                    <section>
                                            <legend>Factores de Riesgo</legend>
                                            <table id="tblListaFactoresdeRiesgo" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Descripción</th>
                                                    <th>Acción</th>
                                                </tr>
                                                </thead>
                                                <tbody id="tabla_friesgo">

                                                </tbody>
                                                <tfoot>
                                                <tr>

                                                </tr>
                                                </tfoot>
                                            </table>
                                            <hr>
                                            <br>
                                            <input name="cantidad_friesgo" class="hide" id="cantidad_friesgo" type="text" >
                                            <button title="Agregar una Factor de Riesgo" type="button" id="boton-modal-crear" class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-crear-friesgo">
                                                <i class="fa fa-plus-circle"></i> &nbsp;Agregar Factores de Riesgo
                                            </button>
                                    </section>
                                    {{-- Estudios Complementarios--}}
                                    <h2>Estudios Complementarios</h2>
                                    <section>
                                            <legend>Estudios Complementarios</legend>
                                            <div class="col-md-8 controls">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Ecografia:</label>
                                                            <select style="width: 40%"  title="Seleccione el tratamiento que sigue el paciente de la lista desplegable" name="tratamiento_medicamentoso_id"  id="tratamiento_medicamentoso_id" placeholder="campo requerido"  class="select3 form-control">
                                                                <option value="1">Tratamiento "A"</option>
                                                                <option value="2">Tratamiento "B"</option>
                                                                <option value="3">Tratamiento "C"</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <button title="Registrar un nombre de tratamiento" type="button" id="boton-modal-crear" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear-friesgo">
                                                        <i class="fa fa-plus-circle"></i> &nbsp;Registrar Tratamiento
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 controls">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Otros</label>
                                                            <input name="expensaDescripcion" id="expensaDescripcion" type="text-area" maxlength="500" class="form-control" placeholder="campo opcional. Ej: las expensas incluyen..." >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </section>
                                </div>
                                <!-- Botones ocultos-->
                                <button type="button" id="boton-modal-crear" class="hide" data-toggle="modal" data-target="#modal-crear-friesgo"> </button>
                                <input type="submit" id="enviar_datos_inmueble" class="hide" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@include('pacientes.factoresRiesgo')

@endsection
@section('script')
    <script src="{{ asset('js/paciente.js') }}"></script>
@endsection
