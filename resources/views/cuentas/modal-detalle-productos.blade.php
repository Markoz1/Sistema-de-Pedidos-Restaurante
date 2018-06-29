<div class="modal fade" id="modal-detalle-productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Nombre</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="datos">
                         @foreach($productos as $item)
                        <tr class="item{{$item->id}}">
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td><button class="edit-modal btn btn-info" data-id="{{$item->id}}"
                                    data-name="{{$item->name}}">
                                    <span class="glyphicon glyphicon-edit"></span> Edit
                                </button>
                                <button class="delete-modal btn btn-danger" data-id="{{$item->id}}"
                                    data-name="{{$item->name}}">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            <div class="modal-footer"> 
                <form method="POST" role="form" id="formulario" action="{{ url("pedidos/") }}">
                    {{-- <input type="hidden" name="_method" id="met" value="PUT"> --}}
                    <input type="hidden" name="producto_id" id="producto_id" value="{{ $producto->producto_id }}">        
                    {{-- <button type="button" class="btn btn-primary" id="terminarPedido" onclick="cambiarEstadoPedido()" data-dismiss="modal">Terminar pedido</button> --}}
                </form>
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>