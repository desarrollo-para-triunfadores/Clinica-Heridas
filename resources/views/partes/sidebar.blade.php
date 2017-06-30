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
                    <li id="side-elem-enfermeros"><a href="{{ route('enfermeros.index') }}"><i class="fa fa-circle-o"></i> Enfermeros</a></li>
                    <li id="side-ele-medicos"><a href="{{ route('medicos.index') }}"><i class="fa fa-circle-o"></i> Médicos</a></li>
                </ul>
            </li>   
            <li id="side-general-li" class="treeview">
                <a href="#">
                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i>
                    <span>Parámetros generales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-ele-usuarios"><a href="{{ route('usuarios.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li id="side-ele-lugares-li">
                        <a href="#"><i class="fa fa-circle-o"></i> Lugares
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul id="side-ele-lugares-ul" class="treeview-menu">
                            <li id="side-ele-lugares-paises"><a href="{{ route('paises.index') }}"><i class="fa fa-circle-o"></i> Paises</a></li>
                            <li id="side-ele-lugares-provincias"><a href="{{ route('provincias.index') }}"><i class="fa fa-circle-o"></i> Provincias</a></li>
                            <li id="side-ele-lugares-localidades"><a href="{{ route('localidades.index') }}"><i class="fa fa-circle-o"></i> Localidades</a></li>
                        </ul>
                    </li>
                    <li id="side-ele-obras_sociales"><a href="{{ route('obras_sociales.index') }}"><i class="fa fa-circle-o"></i> Obras sociales</a></li>                    
                </ul>
            </li>
            <li id="side-general-li" class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    <span>Calendario</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-ele-lugares-li">
                        <a href="{{ route('agendas.index') }}"><i class="fa fa-calendar"></i> Agenda
                            <span class="pull-right-container">

                            </span>
                        </a>
                        <a href="{{ route('feriados.index') }}"><i class="fa fa-calendar-plus-o"></i> Feriados
                            <span class="pull-right-container">

                            </span>
                        </a>
                    </li>

                </ul>
            </li>


            <li id="side-consultorios" class="">
                <a href="{{ route('consultorios.index') }}">
                    <i class="fa fa-hospital-o"></i> <span>Consultorios</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

            <li id="side-consultorios" class="">
                <a href="{{ route('turnos.index') }}">
                    <i class="fa fa-calendar"></i> <span>Obtener turno</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

     <li id="side-consultorios" class="">
                <a href="{{ route('turnos_dia') }}">
                    <i class="fa fa-calendar"></i> <span>Agenda de turnos</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>

                 <li id="side-consultorios" class="">
                <a href="{{ route('turnera') }}">
                    <i class="fa fa-calendar"></i> <span>Turnera</span>
                    <span class="pull-right-container">
                    </span>
                </a>
            </li>



        </ul>
    </section>
</aside>