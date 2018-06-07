@extends('layout.main') 
@section('content')
<article class="content items-list-page">
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Pedidos
                    </h3>
                    <p class="title-description"> Lista de Pedidos</p>
                </div>
            </div>
        </div>
        <div class="items-search">
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control boxed rounded-s" placeholder="Search for...">
                    <span class="input-group-btn">
                            <button class="btn btn-secondary rounded-s" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                </div>
            </form>
        </div>
    </div>
 
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                        </div>
                        <section class="example" id="example">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Mesa</th>
                                        <th>Estado pedido</th>
                                        <th>(Cant.) Productos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        @if ($pedido->estado_pedido == -1)
                                            <tr id="fila{{ $pedido->pedido_id }}">
                                                <th scope="row" id="pedido{{ $pedido->pedido_id }}"></th>
                                                <td>{{ $pedido->mesa }}</td>
                                                <td>
                                                    <form method="POST" role="form" id="formulario1" action="{{ url("pedidos/") }}">
                                                        <input type="hidden" name="_method" id="met1" value="PUT">
                                                        <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">        
                                                        <button id="boton{{ $pedido->pedido_id }}" type="button" class="btn btn-warning" onclick="cambiarEstadoAtencion({{ $pedido->pedido_id }})">Sin Atender</button></td>
                                                    </form>
                                                <td id="botonProductos">
                                                    <a href="#" onclick="mostrarProductos({{ $pedido->pedido_id }},{{$pedido->productos}},{{$datos_pivot}}[{{$pedido->pedido_id}}])">({{ count($pedido->productos) }}) Productos</a>
                                                </td>
                                            </tr>
                                        @else
                                            @if($pedido->estado_pedido == 0)
                                                <tr id="fila{{ $pedido->pedido_id }}" class="bg-warning">
                                                    <th scope="row" id="pedido{{ $pedido->pedido_id }}"></th>
                                                    <td>{{ $pedido->mesa }}</td>
                                                    <td><button id="boton{{ $pedido->pedido_id }}" type="button" class="btn btn-warning" onclick="cambiarEstadoAtencion({{ $pedido->pedido_id }})" disabled="true">Preparando</button></td>
                                                    <td>
                                                        <a href="#" onclick="mostrarProductos({{ $pedido->pedido_id }},{{$pedido->productos}},{{$datos_pivot}}[{{$pedido->pedido_id}}])">({{ count($pedido->productos) }}) Productos</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endif
                                    @endforeach                                    
                                </tbody>
                            </table>
                        </section>
                        @include('pedidos.modal-productos')
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
@endsection
@section('script')
    <script src="{{ asset('js/listado-pedido.js') }}"></script>
@endsection