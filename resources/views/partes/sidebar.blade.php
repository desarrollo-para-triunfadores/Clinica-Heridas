<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header" align="center">menú principal</li>
            <li id="side-pacientes" class="treeview">
                <a href="#">
                    <i class="fa fa-user-o" aria-hidden="true"></i> <span>Pacientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-elem-pacientes-pacientes"><a href="{{ route('pacientes.index') }}"><i class="fa fa-circle-o"></i> Pacientes</a></li>                    
                </ul>
            </li>
            <li id="side-profesionales" class="treeview">
                <a href="#">
                    <i class="fa fa-stethoscope" aria-hidden="true"></i>
                    <span>Profesionales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-elem-enfermeros"><a href="{{ route('enfermeros.index') }}"><i class="fa fa-user-md"></i> Enfermeros</a></li>
                    <li id="side-ele-medicos"><a href="{{ route('medicos.index') }}"><i class="fa fa-user-md"></i> Médicos</a></li>
                </ul>
            </li>   
            <li id="side-general-li" class="treeview">
                <a href="#">
                    <i class="fa fa-gears" aria-hidden="true"></i>
                    <span>Parámetros generales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-ele-usuarios"><a href="{{ route('usuarios.index') }}"><i class="fa fa-user-circle"></i> Usuarios</a></li>
                    <li id="side-ele-lugares-li">
                        <a href="#" data-toggle="tooltip" title="Secciñon para añadir localidades y provincias que podrian servir para asociar con lugar de procedencia de pacientes, enfermeros, medicos, etc."><i class="fa fa-map-o"></i> Lugares
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul id="side-ele-lugares-ul" class="treeview-menu">
                            <li id="side-ele-lugares-paises"><a href="{{ route('paises.index') }}"><i class="fa fa-map-maker"></i> Paises</a></li>
                            <li id="side-ele-lugares-provincias"><a href="{{ route('provincias.index') }}"><i class="fa fa-map-maker"></i> Provincias</a></li>
                            <li id="side-ele-lugares-localidades"><a href="{{ route('localidades.index') }}"><i class="fa fa-map-maker"></i> Localidades</a></li>
                        </ul>
                    </li>
                    <li id="side-ele-obras_sociales"><a href="{{ route('obras_sociales.index') }}"><i class="fa fa-credit-card-alt"></i> Obras sociales</a></li>

                    <li id="side-ele-tratamientos"><a href="{{ route('tratamientos.index') }}"><i class="fa fa-plus-square"></i> Tratamientos</a></li>
                    <li id="side-ele-complicaciones"><a href="{{ route('complicaciones.index') }}"><i class="fa fa-plus-square"></i> Complicaciones</a></li>


                    <li id="side-ele-medicamentos"><a href="{{ route('medicamentos.index') }}"><i class="fa fa-plus-square"></i> Medicamentos</a></li>
                    <li id="side-ele-factores"><a href="{{ route('factores.index') }}"><i class="fa fa-plus-square"></i> Factores de riesgo</a></li>
                    <li id="side-ele-consultorios"><a href="{{ route('consultorios.index') }}"><i class="fa fa-hospital-o"></i> Consultorios</a></li>
                    <li id="side-ele-atencion-li">
                        <a href="#"><i class="fa fa-circle-o"></i> Horarios y días de atención
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul id="side-ele-atencion-ul" class="treeview-menu">
                            <li id="side-ele-feriados"><a href="{{ route('feriados.index') }}"><i class="fa fa-circle-o"></i> Días no laborales</a></li>
                            <li id="side-ele-horarios-atencion"><a href="{{ route('horarios.index') }}"><i class="fa fa-circle-o"></i> Horarios de atención</a></li>                            
                        </ul>
                    </li>
                </ul>
            </li>

            <li id="side-turnos-li" class="treeview">
                <a href="#">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <span>Turnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-ele-obtener-turno"><a href="{{ route('turnos.index') }}"><i class="fa fa-ticket"></i> Obtener turno</a></li>
                    <li id="side-ele-agenda"><a href="{{ route('agenda') }}"><i class="fa fa-calendar"></i> Agenda</a></li>
                    <li id="side-ele-turnera"><a href="{{ route('turnera') }}"><i class="fa fa-list-ol"></i> Turnera</a></li>
                </ul>
            </li>
        </ul>
    </section>
</aside>