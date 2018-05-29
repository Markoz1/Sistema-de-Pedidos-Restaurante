@extends('layout.main-menu') 
@section('content')


<section class="section">
<article class="content cards-page">
    <div class="card-block">
        <div class="title-block">
            <h3 class="title"> Pedidos por entregar </h3>
        </div>
        <section class="section">
            <div class="row">
                @foreach($pedidos as $pedido)

                        <div class="col-xl-3 abrir-modal" data-toggle="modal" data-target="#modal-media" onclick="abrirModal({{ $pedido->pedido_id }})">
                            <div class="card card-danger">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title text-light"> {{'Atender '.$pedido->mesa }} </p>
                                    </div>
                                </div>
                                <div class="card-block" name="{{ route('vistaCocina.index') }}" id=ruta>
                                    <h4>
                                        <p class="text-center texto1">Sin asignar</p>
                                    </h4>
                                    
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
            <!-- /.row -->
        </section>
        @include('vistaCocina.modal-productos')
    </div>
</article>
</section>
<script src="{{ asset('js/listado-pedido.js') }}"></script>
@endsection
