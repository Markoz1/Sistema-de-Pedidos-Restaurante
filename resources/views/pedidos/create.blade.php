<div class="card card-primary">
    <div class="card-header d-flex justify-content-center">
        <div class="header-block">
            <p class="title" id="mesa" value="{{ Auth::user()->id }}"> {{ Auth::user()->nombre }} </p>
            {!! Form::hidden('ruta', route('mesas.show', ['id' => Auth::user()->id]), ['id' => 'ruta_estado_mesa']) !!}
            {!! Form::hidden('estado', 'Mesa', ['id' => 'estado_mesa']) !!}
            <p id="prueba_id"></p>
        </div>
    </div>
    <div class="card-block">
        <div class="card-title-block py-2">
            <h3 class="title"> Pedido Actual </h3>
        </div>
        <section class="example">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cant.</th>
                        <th class="text-center">Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="pedido">
                    <tr height="85" id="producto0">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(0)">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr height="85" id="producto1">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(1)">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr height="85" id="producto2">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(2)">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                        </td>
                    </tr>
                    <tr height="85" id="producto3">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(3)">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">TOTAL (Bs)</td>
                        <td class="text-center" id="total"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    {!! Form::open(['route' => 'pedidos.store', 'method' => 'post', 'id' => 'form_pedido']) !!}
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="_mesa_ruta" id="ruta" value="{{ url('cuentas') }}">
    <input type="hidden" name="_pedido_existe" id="_pedido_existe" value="{{ route('pedidos.existe',['mesa' => 'mesa 1']) }}">
    <div class="card-footer">        
        <div class="form-group row my-0 d-flex justify-content-around">
            <a href="#" class="btn btn-primary btn-lg" id="ordenar" onclick="ordenar_pedido()">Ordenar</a>
        </div>
    </div>
    {!! Form::close() !!}
    <!-- Button trigger modal -->
    @include('pedidos.modal-mensaje')    
@section('script')
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/pedido-create.js') }}"></script>
@endsection