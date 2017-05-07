$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-localidades").addClass("active");

function completar_campos(localidad) {
    $('#nombre').val(localidad.nombre);
    $('#form-update').attr('action', '/admin/localidades/' + localidad.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/localidades/' + id);
    $('#boton-modal-borrar').click();
}