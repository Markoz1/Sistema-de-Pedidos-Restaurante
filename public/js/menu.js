function modaldatos(producto) {
    $('#nombre').text(producto.nombre);
    $('#precio').text(producto.precio);
    $('#descripcion').text(producto.descripcion);
    $('#agregar').attr('value', producto.producto_id)
};
(function ($) {
"use strict";

// manual carousel controls
$('.next').click(function(){ $('.carousel').carousel('next');return false; });
$('.prev').click(function(){ $('.carousel').carousel('prev');return false; });

})(jQuery);  
function mostrar_informacion_producto(ruta_producto) {
    $('#modal_informacion').modal('show');
    console.log(ruta_producto);
    $.get(ruta_producto,
        function (producto) {
            $('#nombre').text(producto.nombre);
            $('#precio').text(producto.precio);
            $('#descripcion').text(producto.descripcion)
        },
        "json"
    );

};