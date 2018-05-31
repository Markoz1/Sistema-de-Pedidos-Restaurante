(function ($) {
"use strict";

// manual carousel controls
$('.next').click(function(){ $('.carousel').carousel('next');return false; });
$('.prev').click(function(){ $('.carousel').carousel('prev');return false; });

})(jQuery);  
function mostrar_informacion_producto(ruta_producto) {
    $('#modal_informacion').modal('show');
    var ruta_inicio = $('#foto').attr('inicio');
    $.get(ruta_producto,
        function (producto) {
            $('#nombre').text(producto.nombre);
            $('#precio').text(producto.precio);
            $('#descripcion').text(producto.descripcion)
            $('#foto').attr('src', ruta_inicio+'/'+producto.foto);
            $('button#agregar').one('click', function () {
                agregar(producto);
            });
        },
        "json"
    );
};
