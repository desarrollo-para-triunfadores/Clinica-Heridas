$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-paises").addClass("active");




$(document).ready(function () {

  

    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'onNext': function (tab, navigation, index) {
            var $valid = $("#commentForm").valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('#rootwizard .progress-bar').css({width: $percent + '%'});
        },
        onFinish: function () {
            $('#boton_submit_crear').click();
        }
    });
});










function completar_campos(pais) {
    $('#nombre').val(pais.nombre);
    $('#form-update').attr('action', '/paises/' + pais.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/paises/' + id);
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




    $('#rootwizard').bootstrapWizard({
        'tabClass': 'nav nav-pills',
        'onNext': function (tab, navigation, index) {
            var $valid = $("#commentForm").valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
        },
        onTabShow: function (tab, navigation, index) {
            var $total = navigation.find('li').length;
            var $current = index + 1;
            var $percent = ($current / $total) * 100;
            $('#rootwizard .progress-bar').css({width: $percent + '%'});
        },
        onFinish: function () {
            $('#boton_submit_crear').click();
        }
    });




var caracteristicas_seleccionadas = [];
var caracteristicas_id = [];


function agregar_característica() {
    var cambio = false;
    $("#combo option:selected").each(function () {
        var caracteristica = JSON.parse($(this).attr('value'));
        if (!caracteristicas_id.includes(caracteristica.id)) {
            caracteristicas_seleccionadas.push(caracteristica);
            caracteristicas_id.push(caracteristica.id);
            $('#cantidad_caracteristicas').val(caracteristicas_seleccionadas.length);
            cambio = true;
        } else {
            $("#boton-modal-elemento-seleccionado").click();
        }
        $("#combo").val(null).trigger("change");
        $("#boton_cerrar_crear").click();
    });

    if (cambio) {
        $("#tabla_caracteristicas").html("");
        var num_fila = 1;
        caracteristicas_seleccionadas.forEach(function (caracteristica) {
            agregar_a_tabla(caracteristica, num_fila);
            num_fila++;
        });
    }
}

$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    var caracteristica = $($(this).closest('tr')["0"].lastElementChild).find("input")["0"].value;
    var posicion_objeto = 0;
    var i = 0;

    caracteristicas_seleccionadas.forEach(function (elemento) {
        if (elemento.id === parseInt(caracteristica)) {          
            posicion_objeto = i;
        }
        i++;
    });

    caracteristicas_id.splice(caracteristicas_id.indexOf(parseInt(caracteristica)), 1);
    caracteristicas_seleccionadas.splice(posicion_objeto, 1);
    $(this).closest('tr').remove();
});


function agregar_a_tabla(caracteristica, num_fila) {
    console.log(caracteristica);
    var tabla = document.getElementById("tabla_caracteristicas");
    var row = tabla.insertRow(0);
    //var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);

    //cell0.innerHTML = caracteristica.id;
    cell1.innerHTML = caracteristica.nombre;
    cell2.innerHTML = caracteristica.descripcion;
    cell3.innerHTML = '<input type="button" class="borrar" value="Eliminar" />';
    cell4.innerHTML = '<input type="text" name="tratamiento' + num_fila + '" class="hide" value="' + caracteristica.id + '" />';
}



//Date picker
$('.datepicker').datepicker({
    autoclose: true,
    startDate: "-80y",
    endDate: "0y",
    todayHighlight: true,
    orientation: "bottom auto",
    format: "dd/mm/yyyy",
    language: "es"
});




















