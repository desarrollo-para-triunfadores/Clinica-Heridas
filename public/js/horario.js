$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-atencion-li").addClass("active");
$("#side-ele-atencion-ul").addClass("menu-open");
$("#side-ele-horarios-atencion").addClass("active");


function completar_campos(horario) {

    console.log(horario);
    $('#hora_inicio').val(horario.hora_inicio);
    $('#hora_fin').val(horario.hora_fin);
    $('#turno').val(horario.turno);
    $('#cupo_turnos').val(horario.cupo_turnos);

    $(".actualizar_check").prop("checked", false); //desactivamos todos los check para ir activar los que correspondan
    if (horario.lunes === 1) {
        $("#lunes").prop("checked", true);
    }
    if (horario.martes === 1) {
        $("#martes").prop("checked", true);
    }
    if (horario.miercoles === 1) {
        $("#miercoles").prop("checked", true);
    }
    if (horario.jueves === 1) {
        $("#jueves").prop("checked", true);
    }
    if (horario.viernes === 1) {
        $("#viernes").prop("checked", true);
    }
    if (horario.sabado === 1) {
        $("#sabado").prop("checked", true);
    }
    if (horario.domingo === 1) {
        $("#domingo").prop("checked", true);
    }
    $("textarea#turno").val(horario.turno);


    $('#form-update').attr('action', '/horarios/' + horario.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/horarios/' + id);
    $('#boton-modal-borrar').click();
}



//Datatable
var table = $('#example').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.    
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




