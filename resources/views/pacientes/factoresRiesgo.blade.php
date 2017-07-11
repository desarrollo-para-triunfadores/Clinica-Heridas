<div class="modal fade" id="modal-crear-friesgo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Agregar Factores de Riesgo</h4>
            </div>
            <div class="modal-body">
                <h3>Detalles del registro</h3>
                <br>
                <div class="form-group">
                    <label>Factores de Riesgo:</label>
                    <select style="width: 100%" id="combo" placeholder="campo requerido"  class="select2 form-control" multiple>

                        <!--
                        <option value="Tabaquismo">Tabaquismo</option>
                        <option value="Sedentarismo">Sedentarismo</option>
                        <option value="Obesidad">Obesidad</option>
                        <option value="Edad Avanzada">Edad Avanzada</option>
                        <option value="Hipertensión">Hipertensión</option>
                        <option value="Alcoholismo">Alcoholismo</option>
                        -->


                            @foreach($factores_riesgo as $factor)
                                    <option value="{{$factor}}">{{$factor->nombre}}</option>
                            @endforeach
                    </select>
                </div>
                <br>
            </div>
            <div class="modal-footer">
                <button type="button" id="boton_cerrar_crear" class="btn btn-default pull-left" data-dismiss="modal">volver</button>
                <button type="button" class="btn btn-primary" onclick="agregar_factor()">Añadir Factor</button>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script src="{{ asset('js/paciente.js') }}"></script>
@endsection
