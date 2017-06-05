$("#side-profesionales").addClass("active");
$("#side-elem-enfermeros").addClass("active");

$('#select_filtro').on('change', function (evt) {
    $(".li_item").addClass("hide");
    if ($("#select_filtro").val() !== null) {
        $("#select_filtro").val().forEach(function (div) {
            $("#" + div).removeClass("hide");
        });
    } else {
        $(".li_item").removeClass("hide");
    }
});


function cambiar_vista(vista) { //true: tabular; false: resumida   
    $("#vista_tabular").addClass("hide");
    $("#vista_resumida").addClass("hide");
    if (vista) {
        $("#vista_resumida").removeClass("hide");
    } else {
        $("#vista_tabular").removeClass("hide");
    }
}


function completar_campos(enfermero) {
    console.log(enfermero);
    $('#apellido').val(enfermero.persona.apellido);
    $('#dni').val(enfermero.persona.dni);
    $('#sexo').val(enfermero.persona.sexo);
    $('#fecha_nac').val(enfermero.persona.fecha_nac);
    $('#telefono').val(enfermero.persona.telefono);
    $('#matricula').val(enfermero.matricula);
    $('#telefono_contacto').val(enfermero.persona.telefono_contacto);
    $('#email').val(enfermero.persona.email);
    $('#localidad_id').val(enfermero.persona.localidad_id).trigger("change");
    $('#direccion').val(enfermero.persona.direccion);
    $('#nombre').val(enfermero.persona.nombre);
    $('#pais_id').val(enfermero.persona.pais_id).trigger("change");
    $('#form-update').attr('action', '/enfermeros/' + enfermero.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/enfermeros/' + id);
    $('#boton-modal-borrar').click();
}


//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    language: {// setteo al lenguaje español
        url: "/js/spanish.json"
    },
    "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.
        null,
        {"visible": false},
        null,
        {"visible": false},
        {"visible": false},
        {"visible": false},
        null,
        {"visible": false},
        null,
        {"visible": false},
        null,
        {"visible": false},
        null
    ]
});


//Datatables - filtro individuales - instanciación de los filtros
$('#example tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
table.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});

//Datatables - ocultar/visualizar columnas dinámicamente
$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
});

//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#example tbody').on('mouseenter', 'td', function () {
    var colIdx = table.cell(this).index().column;
    $(table.cells().nodes()).removeClass('highlight');
    $(table.column(colIdx).nodes()).addClass('highlight');
});