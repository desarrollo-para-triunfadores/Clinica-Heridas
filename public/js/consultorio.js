$("#side-general-li").addClass("active");
$("#side-ele-consultorios").addClass("active");



function completar_campos(consultorio) {
    $('#nombre').val(consultorio.nombre);
    $('#form-update').attr('action', '/consultorios/' + consultorio.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/consultorios/' + id);
    $('#boton-modal-borrar').click();
}


//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.    
});


//Datatables | filtro individuales - instanciación de los filtros
$('#example tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables | filtro individuales - búsqueda 
table.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables | asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});
