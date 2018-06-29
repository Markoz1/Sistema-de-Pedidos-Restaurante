@extends('layout.main')
@section('content')
    <article class="content">
        <div class="title-block">
            <h3 class="title"> Facturación
            </h3>
        </div>
        {{-- <div class="subtitle-block">
            <h3 class="subtitle"> Listado de mesas </h3>
        </div> --}}
        <div id="mensaje-success-facturacion" class="alert alert-dismissible alert-success" style="display:none">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>Se agregó el cliente</p>
        </div>
        <section class="section">
            <div class="card card-block">
                <div class="row">
                    <div class="col-md-6 px-5">
                        {!! Form::Model($cuenta, ['route' => ['mesas.update', $cuenta->id],'method' => 'put']) !!}
                        <div class="title-block">
                            <h3 class="title">Cliente 
                                <a href="#" class="btn-sm" onclick="open_modal_agregar_cliente()"><i class="fa fa-plus"></i> Agregar Cliente</a>
                            </h3>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
                            {!! Form::text('nombre', $cuenta->cliente->nombre, ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':''),'readonly'])!!}
                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('nit', 'Nit', ['class' => 'control-label']) !!} 
                            {!! Form::text('nit', $cuenta->cliente->nit,['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':''),'readonly'])!!}
                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                        </div>
                        <div class="title-block">
                            <h3 class="title">Información Factura</h3>
                        </div>
                        <div class="form-group">
                            {!! Form::label('fecha', 'Fecha', ['class' => 'control-label']) !!}
                            {!! Form::date('fecha', $cuenta->created_at, ['class' => 'form-control boxed '.($errors->has('fecha')?'is-invalid':''),'readonly'])!!}
                            <div class="invalid-feedback">{{ $errors->first('fecha') }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('total', 'Total (Bs.)', ['class' => 'control-label']) !!}
                            {!! Form::number('total', null, ['class' => 'form-control boxed '.($errors->has('total')?'is-invalid':''),'readonly'])!!}
                            <div class="invalid-feedback">{{ $errors->first('total') }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('recibido', 'Recibido (Bs.)', ['class' => 'control-label']) !!}
                            {!! Form::number('recibido', null, ['class' => 'form-control boxed '.($errors->has('recibido')?'is-invalid':'')])!!}
                            <div class="invalid-feedback">{{ $errors->first('recibido') }}</div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('cambio', 'Cambio (Bs.)', ['class' => 'control-label']) !!}
                            {!! Form::number('cambio', null, ['class' => 'form-control boxed '.($errors->has('cambio')?'is-invalid':''),'readonly'])!!}
                            <div class="invalid-feedback">{{ $errors->first('cambio') }}</div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary"> Crear </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="col-md-6 px-4">
                        <div class="title-block">
                            <h3 class="title">Productos</h3>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cantidad</th>
                                    <th>Nombre</th>
                                    <th class="text-center">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>Pique</td>
                                    <td class="text-center">14.56</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </article>
    @include('cuentas.modal-agregar-cliente.modal')
@endsection
@section('script')
    <script>
        var cliente_encontrado;
        function open_modal_agregar_cliente() {
            $('#mensaje-success-facturacion').fadeOut();
            $('#modal-agregar-cliente').modal('show');
        };
        //busqueda cuando se presiona "enter"
        $("#nit-buscar" ).keypress(function( event ) {
            if ( event.which == 13 ) {
                event.preventDefault();
                buscar_nit(this);
            }
        });
        function buscar_nit(btn) {
            var form = $(btn).parents('form');
            var ruta = form.attr('action');
            var nit = $('#nit').val(); 

            $.ajax({
                type: "POST",
                url: ruta,
                data: form.serialize(),
                dataType: "json",
                success: function (cliente) {
                    $('#nit-buscar').attr('class','form-control boxed rounded-s');
                    $('#mensaje-success').fadeIn();
                    $('#cliente-encontrado').show();
                    $('td#nombre').html(cliente.nombre);
                    $('td#nit').html(cliente.nit);
                    $('td#telefono').html(cliente.telefono);
                    $('td#direccion').html(cliente.direccion);
                    cliente_encontrado = cliente;
                    $('#boton-agregar').prop('disabled', false);
                    $('#boton-registrar').hide();
                    $('#boton-agregar').show();
                },
                error: function(mensaje){
                    $('#mensaje-success').fadeOut();
                    $('#cliente-encontrado').hide();
                    $('#nit-buscar').attr('class','form-control boxed rounded-s is-invalid');
                    $('#error-nit-buscar').html(mensaje.responseJSON.errors.nit);
                    if(mensaje.responseJSON.errors.nit[0] === "El Nit ingresado no existe, puede registrar un nuevo cliente presionado el boton Registrar."){
                        $('#boton-registrar').show();
                        $('#boton-agregar').hide();
                    }
                }
            });
        };
        function agregar_cliente() {
            console.log('agregar');
            $('#modal-agregar-cliente').modal('hide');
            $('input#nombre').val(cliente_encontrado.nombre);
            $('input#nit').val(cliente_encontrado.nit);
            $('#mensaje-success-facturacion').fadeIn();
            limpiar_modal();
            limpiar_form_nuevo_cliente();
        };
        function registrar_cliente() {
            var nit_buscar = $('#nit-buscar').val();
            $('#form-crear-cliente').find('input#nit').val(nit_buscar);
            $('#buscar-cliente').hide();
            $('#nuevo-cliente').show();
        };
        function crear_cliente() {
            var form = $('#form-crear-cliente');
            var ruta = form.attr('action');
            $.ajax({
                type: "POST",
                url: ruta,
                data: form.serialize(),
                dataType: "json",
                success: function (cliente) {
                    cliente_encontrado = cliente;
                    agregar_cliente();
                },
                error: function(mensaje){
                    console.log(mensaje.responseJSON.errors.nit);
                    if(mensaje.responseJSON.errors.nombre){
                        form.find('input#nombre').attr('class','form-control boxed is-invalid');
                        form.find('#error-nombre').html(mensaje.responseJSON.errors.nombre);
                    }
                    if(mensaje.responseJSON.errors.nit){
                        form.find('input#nit').attr('class','form-control boxeds is-invalid');
                        form.find('#error-nit').html(mensaje.responseJSON.errors.nit);
                    }
                    if(mensaje.responseJSON.errors.telefono){
                        form.find('input#telefono').attr('class','form-control boxed is-invalid');
                        form.find('#error-telefono').html(mensaje.responseJSON.errors.telefono);
                    }
                    if(mensaje.responseJSON.errors.direccion){
                        form.find('textarea#direccion').attr('class','form-control boxed is-invalid');
                        form.find('#error-direccion').html(mensaje.responseJSON.errors.direccion);
                    }                  
                }
            });
        };
        function limpiar_modal(){
            $('#nit-buscar').val("");
            $('#nit-buscar').attr('class','form-control boxed rounded-s');
            $('#mensaje-success').fadeOut();
            $('#boton-agregar').prop('disabled', true);
            $('#boton-registrar').hide();
            $('#boton-agregar').show();
            $('#cliente-encontrado').hide();
            $('#buscar-cliente').show();
            $('#nuevo-cliente').hide();
        };
        function limpiar_form_nuevo_cliente(){
            var form = $('#form-crear-cliente');
            form.find('input#nombre').val("");
            form.find('input#nombre').attr('class','form-control boxed');
            form.find('input#nit').val("");
            form.find('input#nit').attr('class','form-control boxed');
            form.find('input#telefono').val("");
            form.find('input#telefono').attr('class','form-control boxed');
            form.find('textarea#direccion').val("");
            form.find('textarea#direccion').attr('class','form-control boxed');
        };
    </script>
@endsection