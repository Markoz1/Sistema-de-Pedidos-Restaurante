<div class="modal-body">
    <div id="mensaje-success" class="alert alert-dismissible alert-success" style="display:none">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p id="mensaje-success-text">Se encontró el cliente</p>
    </div>
    {!! Form::open(['route' => 'clientes.buscar']) !!}
    <div class="form-row align-items-center">
        <div class="input-group px-5">
            {!! Form::text('nit', null, ['class' => 'form-control boxed rounded-s', 'placeholder' => 'Ingrese un NIT y presione buscar', 'id' => 'nit-buscar'])!!}
            <span class="input-group-btn">
                    <button class="btn btn-secondary rounded-s" type="button" onclick="buscar_nit(this)">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            <div class="invalid-feedback" id="error-nit-buscar"></div>
        </div>
    </div>
    {!! Form::close() !!}
    <div id="cliente-encontrado" style="display:none">
        @include('cuentas.modal-agregar-cliente.cliente-encontrado')
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary" onclick="agregar_cliente()" id="boton-agregar" disabled>Agregar</button>
    <button type="button" class="btn btn-primary" onclick="registrar_cliente()" id="boton-registrar" style="display:none">Registrar</button>
</div>
