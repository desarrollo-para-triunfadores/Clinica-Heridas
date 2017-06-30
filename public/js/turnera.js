// $(document).ready(function(){
//   setInterval(alert('CASA'), 3000);
// });

setInterval( "cargar_reloj();", 1000 );

setInterval( "cargar_contenido();", 1000 );

function cargar_contenido() {
    $.ajax({
        url: '/contenido_turnera',
        type: 'GET',
        success: function (data) {
            $('#seccion_contenido').html(data);
        }
    });
}

function cargar_reloj() {
    $.ajax({
        url: '/reloj',
        type: 'GET',
        success: function (data) {
            $('#seccion_reloj').html(data);
        }
    });
}