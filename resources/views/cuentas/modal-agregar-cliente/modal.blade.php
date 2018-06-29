<div class="modal fade" id="modal-agregar-cliente" tabindex="-1" role="dialog" aria-labelledby="modal-agregar-cliente" aria-hidden="true">
    <div class="modal-dialog modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="buscar-cliente">
                @include('cuentas.modal-agregar-cliente.buscar-cliente')
            </div>
            <div id="nuevo-cliente" style="display:none">
                @include('cuentas.modal-agregar-cliente.nuevo-cliente')
            </div>
        </div>
    </div>
</div>