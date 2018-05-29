/**
function abrirModal(pedido_id){
    console.log('me abri modal');
    obtenerDatosDB(pedido_id);
    $('#abrir-modal').modal('show');
};
function obtenerDatosDB(pedido_id){
    var id=pedido_id;
    var ruta=$('#ruta').attr('name')+id;
    console.log(ruta);
    $.ajax({
        type: "GET",
        url: ruta,
        data: {id:pedido_id },
        dataType: "json",
        success: function ($response) {
            console.log($response);
            
        }
    }); 
};
 */
function mostrarProductos(productos, datos_pivot) {   
    console.log('jsjsjsjsjs');
    var tabla_datos = $('#datos');
    var checkbox = "<div><label><input class='checkbox' type='checkbox'><span></span></label></div>"
    $(productos).each(function (index, dato_producto) {
        tabla_datos.append("<tr><td>"+dato_producto.nombre+"</td>"+"<td>"+datos_pivot[index].cantidad+"</td>"+"<td>"+checkbox+"</td>"+"</tr>");       
    });
    $('#modal-productos').modal('show');            
}

$('#modal-productos').on('hidden.bs.modal', function (e) {
    $('#datos').children('tr').remove();
});