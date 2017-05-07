$("#side-general-li").addClass("active");
$("#side-general-ul").addClass("menu-open");
$("#side-ele-lugares-ul").addClass("menu-open");
$("#side-ele-lugares-li").addClass("active");
$("#side-ele-lugares-provincias").addClass("active");
    
    

function completar_campos(provincia) {
    $('#nombre').val(provincia.nombre);
    $('#pais_id').val(provincia.pais_id).trigger("change");
    $('#form-update').attr('action', '/admin/provincias/' + provincia.id);
    $('#boton-modal-update').click();
}

function abrir_modal_borrar(id) {
    $('#form-borrar').attr('action', '/admin/provincias/' + id);
    $('#boton-modal-borrar').click();
}