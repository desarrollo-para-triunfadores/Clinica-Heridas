
<!DOCTYPE html>
<html>
    <head>
        @include('partes.estilos')  
    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <a class="navbar-brand"><b>  {{$configuracion->nombre}} | <small>{{$configuracion->descripcion}}</small>   </b></a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>



                        <div id="seccion_reloj" class="navbar-custom-menu">


                            @include('turnera.partes.reloj')


                        </div>
                        <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>
            <!-- Full Width Column -->
            <div id="seccion_contenido" class="content-wrapper">


                @include('turnera.partes.tablas')


                <!-- /.container -->
            </div>
            <!-- /.content-wrapper -->
            @include('partes.pie')
        </div>
        @include('partes.scripts')


        <script src="{{ asset('js/turnera.js') }}"></script>


<!--<script>setTimeout('document.location.reload()',3000); </script>-->
    </body>
</html>