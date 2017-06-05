$("#side-general-li").addClass("active");
$("#side-ele-obras_sociales").addClass("active");


function completar_campos(obra_social) {
    $('#nombre').val(obra_social.nombre);
    $('#form-update').attr('action', '/obras_sociales/' + obra_social.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/obras_sociales/' + id);
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