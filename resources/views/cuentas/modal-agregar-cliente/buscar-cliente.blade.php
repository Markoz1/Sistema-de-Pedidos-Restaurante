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