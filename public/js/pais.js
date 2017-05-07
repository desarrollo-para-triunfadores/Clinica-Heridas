$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-paises").addClass("active");


function completar_campos(pais) {
    $('#nombre').val(pais.nombre);
    $('#form-update').attr('action', '/paises/' + pais.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/paises/' + id);
    $('#boton-modal-borrar').click();
}