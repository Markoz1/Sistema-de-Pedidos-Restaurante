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
    realizarPedido(pedido);
    /**
     * exite pedido()
     *  SI: update pedido(mesa) aumentar productos
     *  NO: Create pedido
     */
    //crearPedido(pedido);
    //buscarCuentaActiva();
    
}

function realizarPedido(pedido){
    mesa = $('#numero_mesa').text();
    ruta = $('#_pedido_existe').val();
    $.ajax({
        type:"GET",
        url:ruta, 
        dataType: "json",
        success: function (response) {//ya esta comprobado que llegan los datos
            console.log(response); ////////////esta fallando aqui en detectar 
            if(response.exito==true){
                //falta actualizar los productos nuevos actualizamos
                console.log(response);
                console.log('ya existe el pedido');
            }else{
                console.log('creamos el pedido');
                crearPedido(pedido);
            }
        }
    });
}

function crearPedido(pedido){
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
            console.log('ya se creo');
            buscarCuentaActiva(response.pedido_id,response.monto_total);
        },
        error: function(e){
            console.log('falla no pudo entrar');
        }
    });
}


function buscarCuentaActiva(id,monto_total){//busca una cuenta si esta pagada o no
    console.log(id);
    console.log(monto_total);
    var ruta = $('#ruta').val();
    $.ajax({
        type: "POST",
        url: ruta,
        data: { 'pedido_id': id, 'monto_total':monto_total, "_token": $('#token').val() },
        dataType: "json",
        success: function (response) {
            //pedido.cuenta_id = response['cuenta_id'];
            console.log('hhshshhshshshsh');
            console.log(pedido);
            
            //crearPedido(pedido);
            
            //actualizarValoresDeCuenta(cuentaRes,50);
        }
    });
}
/*
function actualizarValoresDeCuenta(cuenta, totalMotoPedido){
    //crear peticion ajax
    $.ajax({
        type: "POST",
        url: ruta,
        data: { "_token": $('#token').val(),"_method":$('#met').val() },
        dataType: "json",
        success: function (response) {
            console.log(response.mensaje1);
            console.log(response.mensaje2);
        }});
    //enviar toda la cuenta por ajax
    //crear el put
    //crear el token 
}
*/
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