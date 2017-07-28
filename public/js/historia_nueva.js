$(document).ready(function () {

    $(".js-example-placeholder-single22").select2({
        placeholder: "Select a state",
        tags: true
    });

    $("#diabetes").change(function () {
        if ($("#diabetes").val() === "1") {
            $("#tipo_diabetes").prop("disabled", false);
            $("#medicacion_dbt2").prop("disabled", false);
            $("#tiempo_dbt").prop("disabled", false);
        } else {
            $("#tipo_diabetes").prop("disabled", true);
            $("#medicacion_dbt2").prop("disabled", true);
            $("#tiempo_dbt").prop("disabled", true);
        }
    });

    $("#acv").change(function () {
        if ($("#acv").val() === "1") {
            $("#tiempo_acv").prop("disabled", false);
        } else {
            $("#tiempo_acv").prop("disabled", true);
        }
    });

    $("#hipertension").change(function () {
        if ($("#hipertension").val() === "1") {
            $("#tratamiento_hipertension").prop("disabled", false);
        } else {
            $("#tratamiento_hipertension").prop("disabled", true);
        }
    });


    $("#insuficiencia_renal").change(function () {
        if ($("#insuficiencia_renal").val() === "1") {
            $("#hemodialisis").prop("disabled", false);
            $("#tiempo_hemodialisis").prop("disabled", false);
        } else {
            $("#hemodialisis").prop("disabled", true);
            $("#tiempo_hemodialisis").prop("disabled", true);
        }
    });

    $("#insuficiencia_venosa").change(function () {
        if ($("#insuficiencia_venosa").val() === "1") {
            $("#tratamiento_insuficiencia_venosa").prop("disabled", false);
            if ($("#tratamiento_insuficiencia_venosa").val() === "1") {
                $("#tipo_tratamiento_insuficiencia_venosa").prop("disabled", false);
            } else {
                $("#tipo_tratamiento_insuficiencia_venosa").prop("disabled", true);
            }
        } else {
            $("#tratamiento_insuficiencia_venosa").prop("disabled", true);
            $("#tipo_tratamiento_insuficiencia_venosa").prop("disabled", true);
        }
    });


    $("#tratamiento_insuficiencia_venosa").change(function () {
        if ($("#tratamiento_insuficiencia_venosa").val() === "1") {
            $("#tipo_tratamiento_insuficiencia_venosa").prop("disabled", false);
        } else {
            $("#tipo_tratamiento_insuficiencia_venosa").prop("disabled", true);
        }
    });


    $("#arteriopatia_periferica").change(function () {
        if ($("#arteriopatia_periferica").val() === "1") {
            $("#tratamiento_arteriopatía_periferica").prop("disabled", false);
            if ($("#tratamiento_arteriopatía_periferica").val() === "1") {
                $("#tipo_tratamiento_arteriopatía_periferica").prop("disabled", false);
            } else {
                $("#tipo_tratamiento_arteriopatía_periferica").prop("disabled", true);
            }
        } else {
            $("#tratamiento_arteriopatía_periferica").prop("disabled", true);
            $("#tipo_tratamiento_arteriopatía_periferica").prop("disabled", true);
        }
    });

    $("#tratamiento_arteriopatía_periferica").change(function () {
        if ($("#tratamiento_arteriopatía_periferica").val() === "1") {
            $("#tipo_tratamiento_arteriopatía_periferica").prop("disabled", false);
        } else {
            $("#tipo_tratamiento_arteriopatía_periferica").prop("disabled", true);
        }
    });

    $("#tvp").change(function () {
        if ($("#tvp").val() === "1") {
            $("#tiempo_tvp").prop("disabled", false);
        } else {
            $("#tiempo_tvp").prop("disabled", true);
        }
    });

    $("#arteriografia").change(function () {
        if ($("#arteriografia").val() === "1") {
            $("#adjunto_arteriografia").prop("disabled", false);
        } else {
            $("#adjunto_arteriografia").prop("disabled", true);
        }
    });


    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "Por favor, escribe el mismo valor de nuevo.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });

    var $validator = $("#commentForm").validate({
        rules: {
            emailfield: {
                required: true,
                email: true,
                minlength: 3
            },
            namefield: {
                required: true,
                minlength: 3
            },
            urlfield: {
                required: true,
                minlength: 3,
                url: true
            }
        }
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
});




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
    cell1.innerHTML = caracteristica.nombre_droga;
    cell2.innerHTML = caracteristica.nombre_comercial;
    cell3.innerHTML = '<input type="button" class="borrar" value="Eliminar" />';
    cell4.innerHTML = '<input type="text" name="medicamento' + num_fila + '" class="hide" value="' + caracteristica.id + '" />';
}





var factores_seleccionados = [];
var factores_id = [];


function agregar_factor() {
    var cambio_factor = false;
    $("#combo_factores option:selected").each(function () {
        var factor = JSON.parse($(this).attr('value'));
        if (!factores_id.includes(factor.id)) {
            factores_seleccionados.push(factor);
            factores_id.push(factor.id);
            $('#cantidad_factores').val(factores_seleccionados.length);
            cambio_factor = true;
        } else {
            $("#boton-modal-elemento-seleccionado").click();
        }
        $("#combo_factores").val(null).trigger("change");
        $("#boton_cerrar_crear_factor").click();
    });

    if (cambio_factor) {
        $("#tabla_factores").html("");
        var num_fila_factor = 1;
        factores_seleccionados.forEach(function (factor) {
            agregar_a_tabla_factor(factor, num_fila_factor);
            num_fila_factor++;
        });
    }
}

$(document).on('click', '.borrar_factor', function (event) {
    event.preventDefault();
    var factor = $($(this).closest('tr')["0"].lastElementChild).find("input")["0"].value;
    var posicion_objeto = 0;
    var i = 0;

    factores_seleccionados.forEach(function (elemento) {
        if (elemento.id === parseInt(factor)) {          
            posicion_objeto = i;
        }
        i++;
    });

    factores_id.splice(factores_id.indexOf(parseInt(factor)), 1);
    factores_seleccionados.splice(posicion_objeto, 1);
    $(this).closest('tr').remove();
});


function agregar_a_tabla_factor(factor, num_fila) {
    console.log(factor);
    var tabla = document.getElementById("tabla_factores");
    var row = tabla.insertRow(0);
    //var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);  
    //cell0.innerHTML = factor.id;
    cell1.innerHTML = factor.nombre;
    cell2.innerHTML = '<input type="button" class="borrar_factor" value="Eliminar" />';
    cell3.innerHTML = '<input type="text" name="factor' + num_fila + '" class="hide" value="' + factor.id + '" />';
}

