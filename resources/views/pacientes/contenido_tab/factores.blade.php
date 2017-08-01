<br>
<table id="tabla_factores" class="row-border responsive hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Nombre</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paciente->factores_paciente as $factor_paciente)
        <tr>
            <td class="text-center text-bold">{{$factor_paciente->factor->nombre}}</td>         
            <td class="text-center">                                                  
                <a onclick="abrir_modal_borrar({{$factor_paciente->factor->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Nombre</th>
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>

