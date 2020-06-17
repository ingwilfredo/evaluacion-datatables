var id_eliminar = '';
function eliminar(id, nombre) {
  id_eliminar = id;
  $("#lb-menu").html(nombre);
  $("#modalEliminar").modal('show');
}

function confirmaEliminar() {
  $(location).attr('href', '?m=menu&a=Eliminar&id='+id_eliminar);
}
