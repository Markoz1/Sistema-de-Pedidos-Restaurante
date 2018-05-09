var productosAgregados = 0;
var total = 0.00;
$(document).ready(function () {
    
    // $('#pedido').hide();
    // $('button#agregar').click(function (e) {        
    //     e.preventDefault();
    //     var padre = $($(this).parents().get(3));
    //     var id = padre.attr('id');
        
    //     console.log(id);
    // });
    // $('#ordenar').click(function (e) { 
    //     e.preventDefault();
    // });
    
});
function agregar(boton) {
    $('#myModal').modal('hide');
    console.log('producto_id: '+boton.value);
    var numProducto = productosAgregados+1;
    var nombre = $('#nombre').text();
    var cantidad = $('#cantidad').val();
    var subtotal = parseFloat($('#precio').text() * cantidad).toFixed(2);
    var datos = [nombre,cantidad,subtotal];
    var $tablaPedidoActual = $('#producto' + numProducto).children('td');
    console.log($tablaPedidoActual);
    $tablaPedidoActual.each(function (index, element) {
        if(index < $tablaPedidoActual.length-1){
            $(element).text(datos[index]);
            //console.log($(element).text()+' -> '+datos[index])
        }
        else{
            $(element).show();
        }
    });    
    productosAgregados++;
    total = (parseFloat(total) + parseFloat(subtotal)).toFixed(2);
    $('#total').text(total);
    if(productosAgregados==4){        
        $(boton).prop('disabled', true);
    }
};
function eliminar(producto){
    $tablaPedidoActual = $(producto).children('td');
    $tablaPedidoActual.each(function (index, element) {
        if (index < $tablaPedidoActual.length - 1) {
            if (index == 2) {
                var subtotal = $(element).text();
                total = (parseFloat(total) - parseFloat(subtotal)).toFixed(2);
                $('#total').text(total);
            }
            $(element).text("");            
        }
        else {
            $(element).hide();
        }
    });
    productosAgregados--; 
    $('#agregar').prop('disabled', false);
}