$(document).ready(function () {
    $('.next').click(function () { $('.carousel').carousel('next'); return false; });
    $('.prev').click(function () { $('.carousel').carousel('prev'); return false; });
    
});
function mostrar_informacion_producto(ruta_producto) {
    $('#modal_informacion').modal('show');
    var ruta_inicio = $('#foto').attr('inicio');
    $.get(ruta_producto,
        function (producto) {
            $('#nombre').text(producto.nombre);
            $('#precio').text(producto.precio);
            $('#descripcion').text(producto.descripcion)
            $('#foto').attr('src', ruta_inicio+'/'+producto.foto);
            $('button#agregar').val(producto.producto_id);
        },
        "json"
    );
};
$('#modal_informacion').on('show.bs.modal	', function (e) {
    $('.input-menu-cantidad').val('1');
});
function reducir_cantidad(){
    var cantidad = $('.input-menu-cantidad').val();
    if(cantidad > 1){
        cantidad--;
        $('.input-menu-cantidad').val(cantidad);
    }    
};
function aumentar_cantidad() {
    var cantidad = $('.input-menu-cantidad').val();
    if (cantidad < 10 ) {
        cantidad++;
        $('.input-menu-cantidad').val(cantidad);
    } 
};
function recuperar_estado_mesa() {
    var ruta = $('#ruta_estado_mesa').val();
    $.get(ruta,
        function (mesa) {
            $('#prueba_id').text(mesa.estado);
        },
        "json"
    );
};
