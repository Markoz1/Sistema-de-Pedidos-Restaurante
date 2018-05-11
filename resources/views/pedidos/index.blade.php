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
                        <section class="example">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Mesa</th>
                                        <th>Total (Bs)</th>
                                        <th>(Cant.) Productos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <th scope="row">{{ $pedido->pedido_id }}</th>
                                            <td>{{ $pedido->mesa }}</td>
                                            <td>{{ $pedido->total }}</td>
                                            <td>
                                                <a href="#" onclick="mostrarProductos({{$pedido->productos}}, {{$datos_pivot}}[{{$pedido->pedido_id}}])">({{ count($pedido->productos) }}) Productos</a>
                                            </td>
                                        </tr>
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
    <script>
        function mostrarProductos(productos, datos_pivot) {            
            var tabla_datos = $('#datos');
            $(productos).each(function (index, dato_producto) {
                tabla_datos.append("<tr><td>"+dato_producto.producto_id+"</td>"+"<td>"+dato_producto.nombre+"</td>"+"<td>"+dato_producto.precio+"</td>"+"<td>"+datos_pivot[index].cantidad+"</td>"+"</tr>");       
            });
            $('#modal-productos').modal('show');            
        }
        $('#modal-productos').on('hidden.bs.modal', function (e) {
            $('#datos').children('tr').remove();
        })
    </script>
@endsection