<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                {{-- <h4 class="modal-title">Registrar Cronograma</h4> --}}
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/feriados" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hora de Inicio:</label>
                                <input name="hora_inicio"  type="date" maxlength="10" class="form-control" placeholder="campo requerido" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Hora de Fin:</label>
                                <input name="hora_fin" type="date" maxlength="10" class="form-control" placeholder="campo requerido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Turno:</label>
                                <select style="width: 100%"  name="turno"  placeholder="campo requerido"  class="select2 form-control">
                                    <option value="manana">Mañana</option>
                                    <option value="tarde">Tarde</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Cantidad de Turnos diarios (max):</label>
                                <input name="turnos_dia" type="text" class="form-control" placeholder="no requerido" ></input>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-9 controls">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="input-icon right">
                                    <i class="fa fa-pencil"></i>
                                    <input class="form-control" type="text" name="nombre" id="nombre_rol" required>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  id="rol-usuarios_roles" data-on="Si" data-off="No">
                            Lunes
                        </div>
                        <br>
                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  id="rol-parametros" data-on="Si" data-off="No">
                            Martes
                        </div><br>
                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  id="rol-insumos-compras" data-on="Si" data-off="No">
                            Miercoles
                        </div><br>
                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  data-on="Si" data-off="No" id="rol-articulos">
                            Jueves
                        </div><br>
                        <div class="row">
                            <input type="checkbox" data-toggle="toggle" data-on="Si" data-off="No" id="rol-proveedores">
                            Viernes
                        </div><br>
                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  data-on="Si" data-off="No" id="rol-clientes">
                            Sabado
                        </div><br>

                        <div class="row">
                            <input type="checkbox" data-toggle="toggle"  data-on="Si" data-off="No" id="rol-ventas">
                            Domingo
                        </div><br>
                        <br>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar Feriado o dia de Asueto</button>
            </div>
        </div>          
    </div>
</div>