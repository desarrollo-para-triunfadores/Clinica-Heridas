<br>
<table id="tabla_medicamentos" class="row-border responsive hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Nombre comercial</th>
            <th class="text-center">Nombre droga</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paciente->MedicacionPaciente as $MedicacionPaciente)
        <tr>
            <td class="text-center text-bold">{{$MedicacionPaciente->medicamento->nombre_comercial}}</td>   
            <td class="text-center text-bold">{{$MedicacionPaciente->medicamento->nombre_droga}}</td>    
            <td class="text-center">                                                  
                <a onclick="abrir_modal_borrar({{$MedicacionPaciente->medicamento->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Nombre comercial</th>
            <th class="text-center">Nombre droga</th>
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table>   