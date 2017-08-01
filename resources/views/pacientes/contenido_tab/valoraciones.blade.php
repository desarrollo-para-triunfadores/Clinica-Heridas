
<br>     
<table id="tabla_valoraciones" class="row-border responsive hover order-column" cellspacing="0" width="100%">
    <thead>
        <tr>                                  
            <th class="text-center">Fecha</th>
            <th class="text-center">Diagnóstico</th>
            <th class="text-center">Complicación</th>
            <th class="text-center">Cantidad de seguimientos</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($paciente->valoraciones as $valoracion)
        <tr>
            <td class="text-center text-bold">{{$valoracion->fecha}}</td>   
            <td class="text-center text-bold">{{$valoracion->diagnostico}}</td> 
            <td class="text-center text-bold">{{$valoracion->complicacion->nombre}}</td>   
            <td class="text-center text-bold">{{$valoracion->seguimientos->count()}}</td>    
            <td class="text-center">                                                  
                <a onclick="abrir_modal_borrar({{$valoracion->id}})" title="Eliminar este registro" class="btn btn-social-icon btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                <a href="{{ route('valoraciones.show', $valoracion->id) }}" title="Visualizar el detalle de este registro" class="btn btn-social-icon btn-sm btn-info"><i class="fa fa-list"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>                                  
            <th class="text-center">Fecha</th>
            <th class="text-center">Diagnóstico</th>
            <th class="text-center">Complicación</th>
            <th class="text-center">Cantidad de seguimientos</th>
            <th class="text-center">Acciones</th>
        </tr>
    </tfoot>
</table> 
<br>

