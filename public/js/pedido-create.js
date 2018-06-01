var productosAgregados = 0;
var total = 0.00;
var pedido = { "mesa": "mesa 1", "total": 0 };
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
    $('#modal').modal('hide');
    var producto_id = boton.value;
    var numProducto = productosAgregados+1;
    var nombre = $('#nombre').text();
    var cantidad = $('#cantidad').val();
    var subtotal = parseFloat($('#precio').text() * cantidad).toFixed(2);
    var datos = [nombre,cantidad,subtotal];
    var $nuevo_producto = $('#producto' + numProducto);
    $nuevo_producto.attr('value', producto_id);
    var $datos_nuevo_producto = $nuevo_producto.children('td');
    $datos_nuevo_producto.each(function (index, element) {
        if(index < $datos_nuevo_producto.length-1){
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
    $datos_nuevo_producto = $(producto).children('td');
    $datos_nuevo_producto.each(function (index, element) {
        if (index < $datos_nuevo_producto.length - 1 && $(element).text() != "") {
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
function ordenar(numero_mesa) {
    crearCuenta(numero_mesa);
    var indice_productos = 0;
    var nuevos_productos = []; 
    var $datos_productos = $('#pedido').children('tr');
    $datos_productos.each(function (index, element) {
        if (index < $datos_productos.length - 1 && $(element).children('td#subtotal').text() != "") {
            var nuevo_producto = {};
            var datos_producto = $(element).children('td');
            datos_producto.each(function (index, dato_producto) {
                if(index == 0){
                    nuevo_producto.id = $(dato_producto).parent().attr('value');
                }
                if (index == 1) {
                    nuevo_producto.cantidad = $(dato_producto).text();
                }
                if (index == 2) {
                    nuevo_producto.subtotal = $(dato_producto).text();
                }               
            });
            nuevos_productos[indice_productos] = nuevo_producto;
            indice_productos++;           
        }
        else {
            if (index == 4){
                pedido.total = $(element).children('td#total').text();
            }
        }
    });
    pedido.productos = nuevos_productos;
    var ruta = $('form').attr('action');
    $.ajax({
        type: "POST",
        url: ruta,
        data: { pedido, "_token": $('#token').val() },
        dataType: "json",
        success: function (response) {
            $('#mensaje1').hide();
            $('#mensaje2').hide();
            $('#cerrar').hide();
            $('#mensaje1').text(response.mensaje1);
            $('#mensaje2').text(response.mensaje2);
            $('#modal-mensaje').modal('show');
            $('#mensaje1').delay(200).show(0);
            $('#mensaje1').delay(1800).hide(0);
            $('#mensaje2').delay(2100).show(0);
            $('#cerrar').delay(2100).show(0);
        }
    });
}
function crearCuenta(mesa){//no uso el parametro todavia
    var ruta = $('#ruta').val();
    console.log(mesa);
    $.ajax({
        type: "POST",
        url: ruta,
        data: { 'mesa': mesa, "_token": $('#token').val() },
        dataType: "json",
        success: function (response) {
            console.log(response.mensaje1);
        }
    });
    //optener mesas
    //buscar mesa con el valor del parametro
    //preguntar si esta activa
    //  SI=no creamos cuenta
    //      creamos los pedidos con los valores y damos la llave de la cuenta
    //  NO=creamos una cuenta nueva
    //      creamos el pedido
    //      calculamos el precio total de los pedidos
    //      enviamos por ajax
}
function eliminarProductos() { 
    // eliminar('#producto1');
    // eliminar('#producto2');
    // eliminar('#producto3');
    // eliminar('#producto4');
    location.reload();
 }
function cerraModal() {     
    $('#modal-mensaje').modal('hide');
    eliminarProductos();
  }