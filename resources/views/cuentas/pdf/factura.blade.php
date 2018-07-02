<!DOCTYPE>
<html>
<head>
    
</head>
<body>
    <div style="text-align: center">
    
        <p>Restaurante Panda</p>
        <p>Av. alcachofas 339</p>
        <h4>FACTURA</h4>
        <span>----------------------------------------------------------------------</span>
        <table style="margin: auto">
            <tr>
                <td>NIT:</td>
                <td>12345678900</td>
            </tr>
            <tr>
                <td>FACTURA No.</td>
                <td>{{$cuenta->id}}</td>
            </tr>
        </table>
        <span>----------------------------------------------------------------------</span>
        <p>Venta de variedad de platos que se brindan en restaurantes</p>
        <table style="margin: auto">
                <tr>
                    <td>fecha emisión de factura:</td>
                    <td>{{ $fecha }}</td>
                </tr>
                <tr>
                    <td>SR.(es):</td>
                    <td> {{ $cuenta->cliente->nombre }}</td>
                </tr>
                <tr>
                    <td>NIT/CI:</td>
                    <td>{{ $cuenta->cliente->nit }}</td>
                </tr>
            </table>
            <h3>PRODUCTOS CONSUMIDOS</h3>
            <section class="section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-block">
                                <section class="example">
                                    <table style="margin: auto">
                                        
                                        <thead>
                                            <tr>
                                                <th>Cantidad</th>
                                                <th>Producto</th>
                                                <th>Precio unidad</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ( $cuenta->pedidos as $pedido )
                                                @foreach ($pedido->productos as $producto )
                                                    <tr>
                                                        <td> {{ $producto->pivot->cantidad }}</td>
                                                        <td>{{ $producto->nombre }}</td>
                                                        <td>{{ $producto->precio }}</td>
                                                        <td>{{ $producto->pivot->subtotal }}</td>
                                                    </tr>
                            
                                                @endforeach
                                            @endforeach
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td>Total a pagar</td>
                                                <td>{{ $cuenta->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>    
        </section>
    </div>
</body>
</html>

