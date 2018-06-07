<div class="card card-primary">
    <div class="card-header d-flex justify-content-center">
        <div class="header-block">
            <p class="title" id="numero_mesa"> mesa 1 </p>
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
                    <tr height="85" id="producto1">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(producto1)">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr height="85" id="producto2">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(producto2)">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    </tr>
                    <tr height="85" id="producto3">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(producto3)">
                                                    <i class="fa fa-trash-o"></i>
                                                </a>
                        </td>
                    </tr>
                    <tr height="85" id="producto4">
                        <td class="align-middle"></td>
                        <td class="align-middle"></td>
                        <td class="align-middle text-center" id="subtotal"></td>
                        <td class="align-middle" style="display:none;">
                            <a class="btn btn-oval btn-danger-outline btn-lg border-0" href="#" role="button" onclick="eliminar(producto4)">
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
    {!! Form::open(['route' => 'pedidos.store', 'method' => 'post']) !!}
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <input type="hidden" name="_mesa_ruta" id="ruta" value="{{ url('cuentas') }}">
    <input type="hidden" name="_pedido_existe" id="_pedido_existe" value="{{ route('pedidos.existe',['mesa' => 'mesa 1']) }}">
    <div class="card-footer">        
        <div class="form-group row my-0 d-flex justify-content-around">
            {{-- <button type="" class="btn btn-primary btn-lg" id="ordenar" onclick="ordenar(this)"> Ordenar </button> --}}
            <a href="#" class="btn btn-primary btn-lg" id="ordenar" onclick="ordenar('mesa 1')" >Ordenar</a><!-- tendria que entrar la mesa a cual pertenece -->
        </div>
    </div>
    {!! Form::close() !!}
    <!-- Button trigger modal -->
    @include('pedidos.modal-mensaje')    
@section('script')
    <script src="{{ asset('js/menu.js') }}"></script>
    <script src="{{ asset('js/pedido-create.js') }}"></script>
@endsection