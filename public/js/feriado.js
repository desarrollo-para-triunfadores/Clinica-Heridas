
$("#side-ele-feriados").addClass("active");


function completar_campos(feriado) {
    $('#nombre').val(feriado.fecha);
    $('#motivo').val(feriado.motivo);
    $('#form-update').attr('action', '/feriados/' + feriado.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/feriados/' + id);
    $('#boton-modal-borrar').click();
}

//Datatable
var table = $('#example').DataTable({
    language: {
        url: "/js/spanish.json"
    }
});

$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
});

$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;

    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});

/**Seter de Calendario*/

// Setter
/*
$("#calendario").datepicker( "option", "monthNamesShort", ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'] );
$("#calendario").datepicker( "option", "monthNames", ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);
$("#calendario").datepicker( "option", "dayNames", ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado']);
$("#calendario").datepicker( "option", "dayNamesMin", ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb']);
$("#calendario").datepicker( "option", "minDate", 0);
$("#calendario").datepicker( "option", "dateFormat", 'dd/mm/yy');
$("#calendario").datepicker( "option", "theme", 'customTheme');
$("#calendario").datepicker({
});
    */