<div class="modal fade" id="modal-agregar-cliente" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-cliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="mensaje-success" class="alert alert-dismissible alert-success" style="display:none">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p id="mensaje-success-text"></p>
                </div>
                <div id="buscar-cliente">
                    @include('cuentas.modal-agregar-cliente.buscar-cliente')
                </div>
                <div id = "cliente-encontrado">
                    @include('cuentas.modal-agregar-cliente.cliente-encontrado')
                </div>
                <div id = "nuevo-cliente">
                    @include('cuentas.modal-agregar-cliente.nuevo-cliente')
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" style="display:none">Crear</button>
                <button type="button" class="btn btn-primary" onclick="agregar_cliente()" id="boton-agregar"disabled>Agregar</button>
            </div>
        </div>
    </div>
</div>