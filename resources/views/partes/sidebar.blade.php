<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header" align="center">menú principal</li>
            <li id="side-zonas" class="treeview">
                <a href="#">
                    <i class="fa fa-map-o" aria-hidden="true"></i> <span>Pacientes</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-elem-zonas-registradas"><a href="{{ route('pacientes.index') }}"><i class="fa fa-circle-o"></i> Pacientes</a></li>                    
                </ul>
            </li>
            <li id="side-recorridos" class="treeview">
                <a href="#">
                    <i class="fa fa-road" aria-hidden="true"></i>
                    <span>Empleados</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-elem-recorridos-dia"><a href="{{ route('enfermeros.index') }}"><i class="fa fa-circle-o"></i> Enfermeros</a></li>
                    <li id="side-elem-recorridos-historico"><a href="{{ route('recepcionistas.index') }}"><i class="fa fa-circle-o"></i> Recepcionistas</a></li>
                </ul>
            </li>   
            <li id="side-general" class="treeview">
                <a href="#">
                    <i class="fa fa-suitcase" aria-hidden="true"></i>
                    <span>Generales</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li id="side-ele-usuarios"><a href="{{ route('usuarios.index') }}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                    <li id="side-ele-celulares"><a href="{{ route('paises.index') }}"><i class="fa fa-circle-o"></i> Paises</a></li>
                    <li id="side-ele-preventistas"><a href="{{ route('provincias.index') }}"><i class="fa fa-circle-o"></i> Provincias</a></li>
                    <li id="side-ele-preventistas"><a href="{{ route('localidades.index') }}"><i class="fa fa-circle-o"></i> Localidades</a></li>
                </ul>
            </li>  
        </ul>
    </section>
</aside>