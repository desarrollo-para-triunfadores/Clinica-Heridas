<div class="modal fade" id="modal-agregar-tratamiento">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar tratamiento</h4>
            </div>
            <div class="modal-body">
                <h3>Detalles del registro</h3>
                <br>
                <div class="form-group">
                    <label>Medicamentos:</label>
                    <select style="width: 100%" id="combo" class="select2 form-control" multiple>
                        @foreach($tratamientos as $tratamiento)
                        <option value="{{$tratamiento}}">{{$tratamiento->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" id="boton_cerrar_crear" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="agregar_característica()">Agregar tratamiento/s</button>
            </div>
        </div>
    </div>
</div>