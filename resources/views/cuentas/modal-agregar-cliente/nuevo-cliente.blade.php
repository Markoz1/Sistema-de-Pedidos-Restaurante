<div class="modal-body">
    <div id="mensaje-success" class="alert alert-dismissible alert-success" style="display:none">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <p id="mensaje-success-text"></p>
    </div>
    {!! Form::open(['route' => 'clientes.store', 'method' => 'post', 'id' => 'form-crear-cliente']) !!}
        <div class="card card-block">
            <div class="form-group">
                {!! Form::label('nombre', 'Nombre o Razon Social', ['class' => 'form-control-label text-xs-right']) !!}
                {!! Form::text('nombre', null, ['class' => 'form-control boxed']) !!}
                <div class="invalid-feedback" id="error-nombre"></div>
            </div>
            <div class="form-group">
                {!! Form::label('nit', 'NIT', ['class' => 'form-control-label text-xs-right required']) !!}                      
                {!! Form::number('nit', null, ['class' => 'form-control boxed', 'min' => '0']) !!}
                <div class="invalid-feedback" id="error-nit"></div>
            </div>
            <div class="form-group">
                {!! Form::label('telefono', 'Telefono/Celular', ['class' => 'form-control-label text-xs-right']) !!}                       
                {!! Form::number('telefono', null, ['class' => 'form-control boxed', 'min' => '0']) !!}
                <div class="invalid-feedback" id="error-telefono"></div>
            </div>               
            <div class="form-group">
                {!! Form::label('direccion', 'Direccion', ['class' => 'form-control-label text-xs-right']) !!}
                {!! Form::textarea('direccion', null, ['class' => 'form-control boxed', 'placeholder' => 'Ingresa la Direccion', 'rows' => '3']) !!}
                <div class="invalid-feedback" id="error-direccion"></div>
            </div>
            <small class="required">Campo obligatorio</small>
        </div>
    {!! Form::close() !!}
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary" onclick="crear_cliente(this)" id="boton-crear-agregar">Crear y agregar</button>
</div>