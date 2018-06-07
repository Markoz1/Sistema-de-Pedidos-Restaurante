@extends('layout.main')
@section('content')

<article class="content items-list-page">   
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Clientes
                        <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm rounded-s"> Nuevo Cliente </a>
                    </h3>
                    <p class="title-description"> Lista de Clientes</p>
                </div>
            </div>
        </div>
    </div>
    @if(session('mensaje'))
	    <div class="alert alert-dismissible alert-success">
	        <button type="button" class="close" data-dismiss="alert">×</button>
	        {{ session('mensaje') }}
	    </div>
    @endif

    <section class="section">
        <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre o Razon Social</th>
                                        <th>Nit</th>
                                        <th>Telefono</th>
                                        <th>Direccion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tbody>
                                                @foreach($clientes as $cliente)
                                                    <tr>
                                                        <td>{{$cliente->cliente_id}}</td>
                                                        <td>{{$cliente->nombre}}</td>
                                                        <td>{{$cliente->nit}}</td>
                                                        <td>{{$cliente->telefono}}</td>
                                                        <td>{{$cliente->direccion}}</td>
                                                        <th><a href="{{ route('clientes.edit',[$cliente->cliente_id]) }}"><i class="fa fa-pencil"></i></a></th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                </table>
                    </div>
                </div>
            </div>
    </section>
    {!! $clientes->appends($_GET)->links('pagination') !!}
</article>
@endsection