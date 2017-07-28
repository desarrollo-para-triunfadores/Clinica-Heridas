$("#side-general-li").addClass("active");
$("#side-ele-medicamentos").addClass("active");


function completar_campos(medicamento) {
    $('#nombre_droga').val(medicamento.nombre_droga);
     $('#nombre_comercial').val(medicamento.nombre_comercial);
    $('#form-update').attr('action', '/medicamentos/' + medicamento.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/medicamentos/' + id);
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