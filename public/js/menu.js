function modaldatos(producto) {
    //console.log('presionandos');
    $('#nombre').text(producto.nombre);
    $('#precio').text(producto.precio);
    $('#descripcion').text(producto.descripcion);
    $('#agregar').attr('value', producto.producto_id)
    $('button#agregar').one('click', function () {
        agregar(producto);
    });
};