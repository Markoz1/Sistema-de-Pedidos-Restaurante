<div class="modal fade" id="modal-productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Entregado</th>
                        </tr>
                    </thead>
                    <tbody id="datos">
                    </tbody>
                </table>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="terminarPedido" onclick="cambiarEstadoPedido({{ $pedido->pedido_id }})">Terminar pedido</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>