@extends('layout.main')
@section('content')
    
<article class="content static-tables-page">
        <div class="title-block">
            <h1 class="title"> {{$cuenta->mesa->nombre}} </h1>
            <p class="title-description"> Pedidos por cancelar </p>
        </div>        
        <section class="section">
            <div class="row">                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-title-block">
                                <h3 class="title"> Lista de pedidos </h3>
                            </div>
                            <section class="example">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Estado</th>
                                            <th>Total</th>
                                            <th>Producto(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $habilitar_boton_cerrar_cuenta = 1;
                                        @endphp
                                        @foreach ($pedidos as $pedido)
                                            <tr>
                                                <th >{{$pedido->pedido_id}}</th>
                                                @if($pedido->estado_pedido === -1)
                                                    @php
                                                        $habilitar_boton_cerrar_cuenta = 0;
                                                    @endphp
                                                    <td><span class="badge badge-danger">Sin preparar</span></td>
                                                @elseif($pedido->estado_pedido === 0)
                                                    @php
                                                        $habilitar_boton_cerrar_cuenta = 0;
                                                    @endphp
                                                    <td><span class="badge badge-warning">Preparando</span></td>
                                                @elseif($pedido->estado_pedido === 1)
                                                    <td><span class="badge badge-success">Entregado</span></td>
                                                @endif
                                                <td>{{$pedido->total}}</td>
                                                <td>
                                                    {{ $pedido->productos->count() }}
                                                    {{-- <a href="#" class="detalle-producto-modal btn btn-secondary" id="botonDetalleProductos" data-toggle="modal" data-target="#modal-detalle-productos">Detalle</a> --}}
                                                </td>
                                            </tr>    
                                        @endforeach
                                        {!! Form::hidden('habilitar',$habilitar_boton_cerrar_cuenta , ['id' => 'habilitar_boton_cerrar_cuenta']) !!}
                                    </tbody>
                                </table>
                            </section>
                            <a href="{{ route('cuentas.edit', ['id' => $cuenta->id ]) }}" class="btn btn-primary disabled" id="boton_cerrar_cuenta" aria-disabled="true">Cerrar Cuenta</a>
                            {{-- @include('cuentas.modal-detalle-productos') --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    </article>    
@endsection
@section('script')
    <script src="{{ asset('js/mostrar-detalle-pedidos.js') }}"></script>
@endsection