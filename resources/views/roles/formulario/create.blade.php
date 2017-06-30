<div class="modal fade" id="modal-crear-rol">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar rol</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/roles" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <input type="checkbox" data-toggle="toggle"  id="rol-usuarios_roles" name="usuarios_roles" data-on="Si" data-off="No">
                                Usuarios y Roles
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <input type="checkbox" data-toggle="toggle"  id="rol-obras_sociales" name="obras_sociales" data-on="Si" data-off="No">
                                Obras Sociales
                            </div>
                        </div>
                        <br>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <input type="checkbox" data-toggle="toggle"  id="rol-pacientes" name="pacientes" data-on="Si" data-off="No">
                                Gestión de Pacientes
                            </div>
                        </div><br>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <input type="checkbox" data-toggle="toggle"  id="rol-turnos" name="turnos" data-on="Si" data-off="No">
                                Gestión de Turnos
                            </div>
                        </div><br><br>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <input type="checkbox" data-toggle="toggle"  id="rol-enfermeros"  name="enfermeros" data-on="Si" data-off="No">
                                Gestión de Enfermeros
                            </div>
                        </div><br><br>
                        <div class="col-sm-9 controls">
                            <div class="row">
                                <input type="checkbox" data-toggle="toggle"  id="rol-medicos"  name="medicos" data-on="Si" data-off="No">
                                Gestión de Médicos
                            </div>
                        </div><br><br>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">Registrar Rol</button>
            </div>
        </div>          
    </div>
</div>