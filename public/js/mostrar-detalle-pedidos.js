$(document).ready(function () {
  var habilitar = $('#habilitar_boton_cerrar_cuenta').val();
  if (habilitar){
    $('#boton_cerrar_cuenta').attr('class', 'btn btn-primary');
    $('#boton_cerrar_cuenta').attr('aria-disabled', 'false');
  }
});
$('.modal-footer').on('click', '.detalle-producto-modal', function () {
  $.ajax({
    type: 'get',
    url: '/detalleProductos',
    data: {
      // '_token': $('input[name=_token]').val(),
      'id': $("#producto_id").val(),
      // 'name': $('#n').val()
    },
    success: function (data) {
      $('#datos' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td><button class='edit-modal btn btn-info' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-name='" + data.name + "' ><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
    }
  });
});

