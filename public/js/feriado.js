$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-atencion-li").addClass("active");
$("#side-ele-atencion-ul").addClass("menu-open");
$("#side-ele-feriados").addClass("active");



function completar_campos(feriado) {
    $('#fecha').val(feriado.fecha);
    $('#motivo').val(feriado.motivo);
    $('#form-update').attr('action', '/feriados/' + feriado.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/feriados/' + id);
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



//Date picker
$('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    orientation: "bottom auto",
    format: "dd/mm/yyyy",
    language: "es"
});
