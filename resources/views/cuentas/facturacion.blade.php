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
        <section class="section">
            <div class="card card-block">
                <div class="row">
                    <div class="col-md-6 px-5">
                        {!! Form::Model($cuenta, ['route' => ['mesas.update', $cuenta->id],'method' => 'put']) !!}
                        <div class="title-block">
                            <h3 class="title">Cliente 
                                <a href="#" class="btn-sm" data-toggle="modal" data-target="#modal-agregar-cliente"><i class="fa fa-plus"></i> Agregar Cliente</a>
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
        $(document).ready(function () {
            $('#cliente-encontrado').hide();
        });
        function agregar(producto_id) {
            $('#modal_informacion').modal('hide');
        };
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
                    console.log(cliente);
                    $('#nit-buscar').attr('class','form-control boxed rounded-s');
                    $('#mensaje-success-text').text('Se encontró el cliente');
                    $('#mensaje-success').fadeIn();
                    $('#cliente-encontrado').show();
                    $('td#nombre').html(cliente.nombre);
                    $('td#nit').html(cliente.nit);
                    $('td#telefono').html(cliente.telefono);
                    $('td#direccion').html(cliente.direccion);
                },
                error: function(mensaje){
                    console.log('error');
                    $('#mensaje-success').fadeOut();
                    $('#cliente-encontrado').hide();
                    $('#nit-buscar').attr('class','form-control boxed rounded-s is-invalid');
                    $('#error-nit-buscar').html(mensaje.responseJSON.errors.nit);
                }
            });
        };
    </script>
@endsection