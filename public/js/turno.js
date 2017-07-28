//Info SIDEBAR: los atributos para señalizar el objeto en el sidebar se encuentran en los mains que hacen uso de este JS

function completar_campos(id) {
    $('#agenda_id').val(id);
    $('#boton-crear-turno').click();
}

function completar_campos_reprogramar(turno) {
    $('#paciente').val(turno.paciente.id);
    $('#turno_id_reprogramar').val(turno.id);
    $('#boton-modal-reprogramar').click();
}

function completar_campos_cancelar(id) {
    $('#turno_id_cancelar').val(id);
    $('.form-actualizar-estado').attr('action', '/turnos/' + id);
    $('#boton-modal-cancelar').click();
}

function completar_campos_esperando(id) {
    $('#turno_id_esperando').val(id);
    $('.form-actualizar-estado').attr('action', '/turnos/' + id);
    $('#boton-modal-esperando').click();
}

function completar_campos_llamar(id) {
    $('.form-actualizar-estado').attr('action', '/turnos/' + id);
    $('#boton-modal-llamar').click();
}

function completar_campos_tomar_turno(id) {
    $('.form-actualizar-estado').attr('action', '/turnos/' + id);
    $('#boton-modal-tomar-turno').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/paises/' + id);
    $('#boton-modal-borrar').click();
}

//Date picker
$('.datepicker').datepicker({
    autoclose: true,    
    startDate: "-0d",
    todayHighlight: true,
    orientation: "bottom auto",
    //format: "dd/mm/yyyy",
    language: "es"
});




//---TABLA tabla_pendientes---------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_pendientes = $('#tabla_pendientes').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_pendientes tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_pendientes.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_pendientes tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_pendientes.cell(this).index().column;
    $(tabla_pendientes.cells().nodes()).removeClass('highlight');
    $(tabla_pendientes.column(colIdx).nodes()).addClass('highlight');
});



//--TABLA tabla_pendientes_dia----------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_pendientes_dia = $('#tabla_pendientes_dia').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_pendientes_dia tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_pendientes_dia.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_pendientes_dia tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_pendientes_dia.cell(this).index().column;
    $(tabla_pendientes_dia.cells().nodes()).removeClass('highlight');
    $(tabla_pendientes_dia.column(colIdx).nodes()).addClass('highlight');
});



//--TABLA tabla_espera----------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_espera = $('#tabla_espera').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_espera tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_espera.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_espera tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_espera.cell(this).index().column;
    $(tabla_espera.cells().nodes()).removeClass('highlight');
    $(tabla_espera.column(colIdx).nodes()).addClass('highlight');
});



//--TABLA tabla_espera----------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_en_atencion = $('#tabla_en_atencion').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_en_atencion tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_en_atencion.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_en_atencion tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_en_atencion.cell(this).index().column;
    $(tabla_en_atencion.cells().nodes()).removeClass('highlight');
    $(tabla_en_atencion.column(colIdx).nodes()).addClass('highlight');
});



// TABLA tabla_atendidos_hoy------------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_atendidos_hoy = $('#tabla_atendidos_hoy').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_atendidos_hoy tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_atendidos_hoy.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_atendidos_hoy tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_atendidos_hoy.cell(this).index().column;
    $(tabla_atendidos_hoy.cells().nodes()).removeClass('highlight');
    $(tabla_atendidos_hoy.column(colIdx).nodes()).addClass('highlight');
});



// TABLA tabla_atendidos------------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_atendidos = $('#tabla_atendidos').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_atendidos tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_atendidos.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_atendidos tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_atendidos.cell(this).index().column;
    $(tabla_atendidos.cells().nodes()).removeClass('highlight');
    $(tabla_atendidos.column(colIdx).nodes()).addClass('highlight');
});




//---TABLA tabla_disponibles---------------------------------------------------------------------------


//Datatable - instaciación del plugin
var tabla_disponibles = $('#tabla_disponibles').DataTable({
    "language": tabla_traducida // esta variable esta instanciada donde están declarados todos los js.

});


//Datatables - filtro individuales - instanciación de los filtros
$('#tabla_disponibles tfoot th').each(function () {
    var title = $(this).text();
    if (title !== 'Acciones') { //ignoramos la columna de los botones
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');
    }
});

//Datatables - filtro individuales - búsqueda 
tabla_disponibles.columns().every(function () {
    var that = this;
    $('input', this.footer()).on('keyup change', function () {
        if (that.search() !== this.value) {
            that.search(this.value).draw();
        }
    });
});


//Datatables - asocio el evento sobre el body de la tabla para que resalte fila y columna
$('#tabla_disponibles tbody').on('mouseenter', 'td', function () {
    var colIdx = tabla_disponibles.cell(this).index().column;
    $(tabla_disponibles.cells().nodes()).removeClass('highlight');
    $(tabla_disponibles.column(colIdx).nodes()).addClass('highlight');
});



