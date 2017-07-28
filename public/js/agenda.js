$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-atencion-li").addClass("active");
$("#side-ele-atencion-ul").addClass("menu-open");
$("#side-ele-horarios-atencion").addClass("active");


function completar_campos(agenda) {
    $('#nombre').val(agenda.fecha);
    $('#motivo').val(agenda.motivo);
    $('#form-update').attr('action', '/agendas/' + agenda.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/agendas/' + id);
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
$("#calendario").datepicker( "option", "dayNames", ['Domingo', 'Lunes', 'Martes', 'Mi�rcoles', 'Jueves', 'Viernes', 'S�bado']);
$("#calendario").datepicker( "option", "dayNamesMin", ['Dom','Lun','Mar','Mi�','Juv','Vie','S�b']);
$("#calendario").datepicker( "option", "minDate", 0);
$("#calendario").datepicker( "option", "dateFormat", 'dd/mm/yy');
$("#calendario").datepicker( "option", "theme", 'customTheme');
$("#calendario").datepicker({
});
    */