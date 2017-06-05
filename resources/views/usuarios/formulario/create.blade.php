<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar usuario</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form id="form-create" name="form-create" action="/usuarios" method="POST" enctype="multipart/form-data">
                    <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Detalles de la Cuenta</h3>
                    <br>
                    <div class="form-group">
                        <label>Correo electrónico:</label>
                        <input name="email" type="email" maxlength="50" class="form-control" aria-describedby="emailHelp" placeholder="campo requerido" required>                            
                    </div>
                    <div class="form-group">
                        <label>Password:</label>
                        <input name="password"  type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <div class="form-group">
                        <label>Confirmar password:</label>
                        <input name="password_confirmation" type="password" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>
                    <br>
                    <hr/>  
                    <br>                                         
                    <h3>Detalles del perfil</h3>
                    <br>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre completo:</label>
                        <input  name="name" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                    </div>                        
                    <div class="form-group">
                        <label for="exampleInputFile">Imagen de perfil:</label>
                        <div id="main-cropper" class="hide"></div>
                        <a class="button actionUpload">                   
                            <input type="file" id="upload" value="Escoja una imagen" accept="image/*">
                        </a>                       
                        <small class="form-text text-muted"><strong>Información:</strong> si no escoge una imagen nueva se utilizará una imagen prestablecida.</small>
                    </div>
                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="mandar();">registrar usuario</button>
            </div>
        </div>          
    </div>
</div>