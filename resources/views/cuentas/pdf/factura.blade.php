<!DOCTYPE>
<html>
<head>
    
</head>
<body>
    <div style="text-align: center">
    
        <p>Nombre restaurante</p>
        <p>Direccion de la sucursal</p>
        <h4>FACTURA</h4>
        <span>----------------------------------------------------------------------</span>
        <table style="margin: auto">
            <tr>
                <td>NIT:</td>
                <td>valor</td>
            </tr>
            <tr>
                <td>FACTURA No.</td>
                <td>{{$cuenta->id}}</td>
            </tr>
            <tr>
                <td>AUTORIZACION No:</td>
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
                                            <tr>
                                                <th>3</th>
                                                <td>pique</td>
                                                <td>30</td>
                                                <td>90</td>
                                            </tr>
                                            <!-- aca entra el foreach de lps pedidos y productos para mostrar -->
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

