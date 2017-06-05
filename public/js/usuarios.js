$("#side-general-li").addClass("active");
$("#side-ele-usuarios").addClass("active");

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

function completar_campos(usuario) {
    $('#name').val(usuario.name);
    $('#email').val(usuario.email);
    $('#form-update').attr('action', '/usuarios/' + usuario.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/usuarios/' + id);
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


//Croppie.js | update

//se instancia el plugin
var basic_update = $('#main-cropper-update').croppie({
    enableExif: true,
    viewport: {
        width: 100,
        height: 100,
        type: 'circle'
    },
    boundary: {
        width: 400,
        height: 400
    }
});

//carga imagen al plugin
function readFile2(input) {
    if (input.files && input.files[0]) {
        var reader2 = new FileReader();
        reader2.onload = function (e) {
            $('#main-cropper-update').croppie('bind', {
                url: e.target.result
            });
        };
        reader2.readAsDataURL(input.files[0]);
    }
}

//evento sobre el botón subir
$('.actionUpload input').on('change', function () {
    $('#main-cropper-update').removeClass('hide');    
    $("#contenido_foto").addClass("hide");    
    readFile2(this);
});










var basic = $('#main-cropper').croppie({
    enableExif: true,
    viewport: {
        width: 100,
        height: 100,
        type: 'circle'
    },
    boundary: {
        width: 400,
        height: 400
    }
});

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#main-cropper').croppie('bind', {
                url: e.target.result
            });
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$('.actionUpload input').on('change', function () {
    $('#main-cropper').removeClass('hide');
    readFile(this);
});














function mandar() {

//    var formData = new FormData($("#form-create"));
//   
//
//
//    formData.append('username', 'Chris');
//    formData.append('croppedImage', '1231');
//    
//     console.log(formData);
//    
// 
//
//// Display the key/value pairs
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]); 
//}


////
    var form = $("#form-create");
    var url = form.attr("action");
//    var data = form.serialize();
    var token = $("#token").val();
//
//
//
//
//






    var formData = new FormData(document.getElementById("form-create"));



    basic.croppie('result', 'blob').then(function (html) {
        //    formData.append("myfile", myBlob, "filename.txt");
        formData.append('imagen2', html);
        // console.log(html);
        // console.log($('#caca').attr('src'));
        // html is div (overflow hidden)
        // with img positioned inside.


        $.ajax(url, {
            headers: {"X-CSRF-TOKEN": token},
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (data) {
                var data2 = JSON.parse(data);
                console.log(data2);
            },
            error: function () {
                console.log('Upload error');
            }
        });


    });


    //Display the key/value pairs
//    for (var pair of formData.entries())
//            {
//                console.log(pair[0] + ', ' + pair[1]);
//            }

//
//



// Display the key/value pairs
//for (var pair of formData.entries())
//{
// console.log(pair[0]+ ', '+ pair[1]); 
//}

//
//    $.ajax(url, {
//        headers: {"X-CSRF-TOKEN": token},
//        method: "POST",
//        data: formData,
//        processData: false,
//        contentType: false,
//        success: function (data) {
//            var data2 = JSON.parse(data);
//            console.log(data2);
//        },
//        error: function () {
//            console.log('Upload error');
//        }
//    });


//   data: {
//            name: $("#token").val(),
//            email: $('#email').val(),
//            password: $('#password').val(),
//            password_confirmation: $('#password_confirmation').val(),
//            imagen: $('#imagen').val()
//        },









//    $.post(url, data, false, false,  function (result) {
//        console.log(result);
//    });

    // console.log(data);


}
