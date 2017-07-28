<div class="modal fade" id="modal-agregar-factor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar factor de riesgo</h4>
            </div>
            <div class="modal-body">
                <h3>Detalles del registro</h3>
                <br>
                <div class="form-group">
                    <label>Factor de riesgo:</label>
                    <select style="width: 100%" id="combo_factores" class="select2 form-control" multiple>
                        @foreach($factores as $factor)
                        <option value="{{$factor}}">{{$factor->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" id="boton_cerrar_crear_factor" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="agregar_factor()">Agregar factor/s</button>
            </div>
        </div>
    </div>
</div>