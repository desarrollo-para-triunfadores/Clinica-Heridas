<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Registrar Localidad</h4>
            </div>
            <div class="modal-body">
                @include('partes.msj_lista_errores')
                <form action="/localidades" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">                                                           
                    <h3>Detalles del registro</h3>
                    <br>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input name="nombre" type="text" maxlength="50" class="form-control" placeholder="campo requerido" required>
                        <br>
                        <label>Provincia</label>
                        <select name="provincia_id" type="select" maxlength="50" class="form-control" placeholder="campo requerido" required>
                            @foreach($provincias as $provincia)
                                <option value="{{$provincia->id}}" selected="selected">{{$provincia->nombre}}</option>
                            @endforeach
                        </select>
                        <label>Cod Postal:</label>
                        <input name="cod_postal" type="text" maxlength="5" class="form-control" value="-" placeholder="campo requerido">
                    </div>
                    <br>

                    <button id="boton_submit_crear" type="submit" class="btn btn-primary hide"></button>
                </form>
                <br>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="$('#boton_submit_crear').click()">registrar localidad</button>
            </div>
        </div>          
    </div>
</div>