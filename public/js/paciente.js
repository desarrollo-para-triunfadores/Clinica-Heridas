$("#side-pacientes").addClass("active");
$("#side-elem-pacientes-pacientes").addClass("active");

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

function completar_campos(paciente) {
    console.log(paciente);
    $('#apellido').val(paciente.persona.apellido);
    $('#dni').val(paciente.persona.dni);
    $('#sexo').val(paciente.persona.sexo);
    $('#fecha_nac').val(paciente.persona.fecha_nac);
    $('#telefono').val(paciente.persona.telefono);
    $('#telefono_contacto').val(paciente.persona.telefono_contacto);
    $('#email').val(paciente.persona.email);
    $('#localidad_id').val(paciente.persona.localidad_id).trigger("change");
    $('#direccion').val(paciente.persona.direccion);
    $('#nombre').val(paciente.persona.nombre);
    $('#pais_id').val(paciente.persona.pais_id).trigger("change");
    $('#form-update').attr('action', '/pacientes/' + paciente.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/pacientes/' + id);
    $('#boton-modal-borrar').click();
}

//Datatable - instaciación del plugin
var table = $('#example').DataTable({
    "language": tabla_traducida, // esta variable esta instanciada donde están declarados todos los js.
    "columns": [//defino propiedades para la columnas, en este caso indico cuales quiero que se inicien ocultas.
        null,
        {"visible": false},
        null,
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

//Datatables | ocultar/visualizar columnas dinámicamente
$('a.toggle-vis').on('click', function (e) {
    e.preventDefault();
    // Get the column API object
    var column = table.column($(this).attr('data-column'));
    // Toggle the visibility
    column.visible(!column.visible());
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
    orientation: "bottom auto",
    format: "dd/mm/yyyy",
    language: "es"
});

//Croppie.js | create
//se instancia el plugin
var basic_nuevo = $('#main-cropper_nuevo').croppie({
    enableExif: true,
    viewport: {
        width: 275,
        height: 275,
        type: 'circle'
    },
    boundary: {
        width: 275,
        height: 275
    }
});

//carga imagen al plugin
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#main-cropper_nuevo').croppie('bind', {
                url: e.target.result
            });
        };
        reader.readAsDataURL(input.files[0]);
    }
}

//evento sobre el botón subir
$('.actionUpload-nuevo input').on('change', function () {
    $('#main-cropper_nuevo').removeClass('hide');
    if (MediaStream_nuevo !== "") {
        MediaStream_nuevo.stop();
    }
    $("#video_nuevo").addClass("hide");
    $("#capture_nuevo").addClass("hide");
    $("#start_nuevo").removeClass("hide");
    $("#contenido_foto_nuevo").addClass("hide");
    readFile(this);
});


//Croppie.js | update
//se instancia el plugin
var basic_update = $('#main-cropper_update').croppie({
    enableExif: true,
    viewport: {
        width: 275,
        height: 275,
        type: 'circle'
    },
    boundary: {
        width: 275,
        height: 275
    }
});
//carga imagen al plugin
function readFile2(input) {
    if (input.files && input.files[0]) {
        var reader2 = new FileReader();
        reader2.onload = function (e) {
            $('#main-cropper_update').croppie('bind', {
                url: e.target.result
            });
        };
        reader2.readAsDataURL(input.files[0]);
    }
}
//evento sobre el botón subir
$('.actionUpload-update input').on('change', function () {
    $('#main-cropper_update').removeClass('hide');
    if (MediaStream_update !== "") {
        MediaStream_update.stop();
    }
    $("#video_update").addClass("hide");
    $("#capture_update").addClass("hide");
    $("#start_update").removeClass("hide");
    $("#contenido_foto_update").addClass("hide");
    readFile2(this);
});



// Enviar datos.
function mandar(tipo_form) { //tipo_form puede ser create o update
    var redireccion = "/pacientes";

//// Este método sirve para ver el contenido del formdata
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]); 
//}
    var form = $("#form-" + tipo_form);
    var url = form.attr("action");
    var token = $("#token-" + tipo_form).val();
    var formData = new FormData(document.getElementById("form-" + tipo_form));


    if (tipo_form === 'create') {
        if (basic_nuevo_cam === "") {
            if ($('#imagen-nuevo').val() === '') {
                $.ajax(url, {
                    headers: {"X-CSRF-TOKEN": token},
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        window.location.href = redireccion;
                    },
                    error: function () {
                        console.log('Upload error');
                    }
                });
            } else {
                basic_nuevo.croppie('result', 'blob').then(function (html) {
                    formData.append('imagen', html);
                    $.ajax(url, {
                        headers: {"X-CSRF-TOKEN": token},
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            window.location.href = redireccion;
                        },
                        error: function () {
                            console.log('Upload error: '+throwError);
                        }
                    });
                });
            }
        } else {
            basic_nuevo_cam.croppie('result', 'blob').then(function (html) {
                formData.append('imagen', html);
                $.ajax(url, {
                    headers: {"X-CSRF-TOKEN": token},
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        window.location.href = redireccion;
                    },
                    error: function () {
                        console.log('Upload error');
                    }
                });
            });
        }
    } else {
        if (basic_update_cam === "") {
            if ($('#imagen-update').val() === '') {
                $.ajax(url, {
                    headers: {"X-CSRF-TOKEN": token},
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        window.location.href = redireccion;
                    },
                    error: function () {
                        console.log('Upload error');
                    }
                });
            } else {
                basic_update.croppie('result', 'blob').then(function (html) {
                    formData.append('imagen', html);
                    $.ajax(url, {
                        headers: {"X-CSRF-TOKEN": token},
                        method: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            window.location.href = redireccion;
                        },
                        error: function () {
                            console.log('Upload error');
                        }
                    });
                });
            }
        } else {
            basic_update_cam.croppie('result', 'blob').then(function (html) {
                formData.append('imagen', html);
                $.ajax(url, {
                    headers: {"X-CSRF-TOKEN": token},
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        window.location.href = redireccion;
                    },
                    error: function () {
                        console.log('Upload error');
                    }
                });
            });
        }
    }
}

/** Wizard */
var handleBootstrapWizards = function () {
    "use strict";
    $("#wizard-recepcion-paciente").bwizard();
};

$(function (){
    $("#wizard-recepcion-paciente").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        onStepChanging: function (event, currentIndex, newIndex)
        {
            // Siempre permitir volver para atras
            if (currentIndex > newIndex)
            {
                return true;
            }
            /*Paso 1° :*/
            if((currentIndex === 0))
            {
                return true;
            }
            /*Paso 2° :*/
            if((currentIndex === 1)){
                return true;
            }
            /*Paso 3° */
            if((currentIndex===2)){
                return true;
            }
            /*Paso 4° */
            if((currentIndex===3)){
                return true;
            }
            /*Paso 5° */
            if((currentIndex===4)){
                return true;
            }

        },
        onStepChanged: function (event, currentIndex)
        {
            $(".select3").select2({
                placeholder: "seleccione una opción"
            });
        },
        onFinished: function (event, currentIndex)
        {
            $('#enviar_datos_inmueble').click();
            //crearInmueble();
        }
    });
});


$(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    var friesgo = $($(this).closest('tr')["0"].lastElementChild).find("input")["0"].value;
    friesgo_seleccionadas.splice(friesgo_seleccionadas.indexOf(friesgo), 1);
    $(this).closest('tr').remove();
});


/**Global*/
var friesgo_seleccionadas = [];
/******* */

function agregar_a_tabla(friesgo) {
    var tabla = document.getElementById("tabla_friesgo");
    var row = tabla.insertRow(0);
    //var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    //cell0.innerHTML = caracteristica.id;
    cell1.innerHTML = friesgo.nombre;
    cell2.innerHTML = friesgo.descripcion;
    cell3.innerHTML = '<input type="button" class="borrar" value="Eliminar" />';
    cell4.innerHTML = '<input type="text" name="friesgo' + friesgo.id + '" class="hide" value="' + friesgo.id + '" />';
    friesgo_seleccionadas.push(friesgo.id);
    $('#cantidad_friesgo').val(friesgo_seleccionadas.length);
}
function agregar_factor() {
    alert('se deberia agregar un factor');
    $("#combo option:selected").each(function () {
        var factor = JSON.parse($(this).attr('value'));
        if (!friesgo_seleccionadas.includes(factor.id)) {
            agregar_a_tabla(factor);
        } else {
            $("#boton-modal-elemento-seleccionado").click();
        }
        $("#combo").val(null).trigger("change");
        $("#boton_cerrar_crear").click();
    });
}