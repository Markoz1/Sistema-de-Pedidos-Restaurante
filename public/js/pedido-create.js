var productosAgregados = 0;
var total = 0.00;
var pedido = { "mesa_id": 0, "total": 0 };
var pedido_lleno = false;
var array_productos = [{ "id": "", "nombre": "", "cantidad": "", "subtotal": "" },
                       { "id": "", "nombre": "", "cantidad": "", "subtotal": "" },
                       { "id": "", "nombre": "", "cantidad": "", "subtotal": "" },
                       { "id": "", "nombre": "", "cantidad": "", "subtotal": "" }];
$(document).ready(function () {
    pedido.mesa_id = $('#mesa').attr('value');            
});
function agregar(producto_id) {
    $('#modal_informacion').modal('hide');
    agregar_a_array_productos(producto_id);
    actualizar_vista_pedido_actual();
    actualizar_total();
    verificar_pedido_lleno();
};
function eliminar(index) {
    eliminar_de_array_productos(index);
    actualizar_vista_pedido_actual();
    actualizar_total();
    verificar_pedido_lleno();
};
function ordenar_pedido() {
    if (!array_productos_is_empty()){
        agregar_array_productos_a_pedido();
        enviar_con_ajax();
    }
};
// funciones adicionales
function agregar_a_array_productos(producto_id) {
    $.each(array_productos, function (indexInArray, valueOfElement) {//recorriendo array_productos
        if (valueOfElement.id == "") {//si hay espacio en array_productos, agrego un producto
            valueOfElement.id = producto_id;
            valueOfElement.nombre = $('#nombre').text();;
            valueOfElement.cantidad = $('#cantidad').val();
            valueOfElement.subtotal = parseFloat($('#precio').text()* valueOfElement.cantidad).toFixed(2);
            return false;
        }
    });
};
function eliminar_de_array_productos(index) {
    array_productos[index].id = "";
    array_productos[index].nombre = "";
    array_productos[index].cantidad = "";
    array_productos[index].subtotal = "";
};
function actualizar_vista_pedido_actual() {
    var $nuevo_producto;
    $.each(array_productos, function (indexInArray, producto) {//recorriendo array_productos, donde producto es un elemento de array_productos
        $nuevo_producto = $('#producto' + indexInArray);
        $nuevo_producto.attr('value', indexInArray);
        var $datos_nuevo_producto = $nuevo_producto.children('td');
        if (producto.id != "") {// si existe un producto en array_productos
            $datos_nuevo_producto.each(function (index, element) {// llenando un producto en pedido actual
                if(index == 0){
                    $(element).text(producto.nombre);
                }
                if (index == 1) {
                    $(element).text(producto.cantidad);
                }
                if (index == 2) {
                    $(element).text(producto.subtotal);
                }
                if (index == 3) {
                    $(element).show();
                }
            });
        }
        else{
            $datos_nuevo_producto.each(function (index, element) {
                if (index < $datos_nuevo_producto.length - 1) {
                    $(element).text("");
                }
                else {
                    $(element).hide();
                }
            });    
        }
    });
};
function actualizar_total() {
    var total_temp = 0.0;
    $.each(array_productos, function (indexInArray, producto) {
        if (producto.id != "") {
            total_temp = (parseFloat(total_temp) + parseFloat(producto.subtotal)).toFixed(2);
        }
        
    });
    total = total_temp;
    $('td#total').text(total);
};
function verificar_pedido_lleno() {    
    $.each(array_productos, function (indexInArray, valueOfElement) {
        if (valueOfElement.id == "") {
            $('button#agregar').prop('disabled', false);
            pedido_lleno = false;
            return false;
        }
        else{
            $('button#agregar').prop('disabled', true);
            pedido_lleno = true;
        }
    });
};
function array_productos_is_empty() {
    var termino = false;
    var res = true;
    $.each(array_productos, function (indexInArray, producto) {
        if (producto.id != "" && !termino) {
            termino = true;
            res = false;
        }
    });
    return res;
};
function agregar_array_productos_a_pedido() {
    if(pedido_lleno){
        pedido.productos = array_productos;
    }
    else{
        var indice_productos = 0;
        pedido.productos = [];
        $.each(array_productos, function (indexInArray, producto) {
            if (producto.id != "") {
                pedido.productos[indice_productos] = producto;
                indice_productos++;
            }
        });
    }
    pedido.total = total;
};
function enviar_con_ajax() {
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
};
function eliminarProductos() {
    location.reload();
};
function cerraModal() {
    $('#modal-mensaje').modal('hide');
    eliminarProductos();
};