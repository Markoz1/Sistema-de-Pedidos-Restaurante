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
function mostrarProductos(id,productos,datos_pivot) {   
    var tabla_datos = $('#datos');

    var i=1;
    $(productos).each(function (index, dato_producto) {
        $('#terminarPedido').attr('onclick',"cambiarEstadoPedido("+id+")");
        var checkbox = "<div><label><input class='checkbox' type='checkbox' id=check"+i+"><span></span></label></div>"
        tabla_datos.append("<tr><td>"+dato_producto.nombre+"</td>"+"<td>"+datos_pivot[index].cantidad+"</td></tr>");
        i = i+1;       
    });
    console.log(productos);
    $('#modal-productos').modal('show');            
}
function cambiarEstadoAtencion(id_pedido){
    var etiquetaFila ='#fila' + id_pedido;
    var boton ='#boton'+id_pedido;    
    $(boton).attr("disabled","true");
    $(etiquetaFila).attr("class","bg-warning");
    console.log(boton);
    //des habilitar el boton
    //cambiar color de fondo
}
function cambiarEstadoPedido(id){
    var accionFormulario = $('#formulario').attr('action');
    var ruta = accionFormulario+'/'+id;
    $.ajax({
        type: "POST",
        url: ruta,
        data: { "_token": $('#token').val(),"_method":$('#met').val() },
        dataType: "json",
        success: function (response) {
            console.log(response.mensaje1);
            console.log(response.mensaje2);
        }});
    $('#example').load(' #example');
    
}
$('#modal-productos').on('hidden.bs.modal', function (e) {
    $('#datos').children('tr').remove();
});