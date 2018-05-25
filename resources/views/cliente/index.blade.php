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
    @if(session('mensaje'))
	    <div class="alert alert-dismissible alert-success">
	        <button type="button" class="close" data-dismiss="alert">×</button>
	        {{ session('mensaje') }}
	    </div>
    @endif
    <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        	<th>N°</th>
                            <th>Nombre o Razon Social</th>
                            <th>Nit</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                    	@foreach($clientes as $cliente)
                    		<tr>
                                <td>{{$i}}</td>
                    			<td>{{$cliente->nombre}}</td>
                                <td>{{$cliente->nit}}</td>
                                <td>{{$cliente->telefono}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <th>
                                    <a href="{{ route('clientes.edit',[$cliente->cliente_id]) }}"> Editar </a>
                                </th>
                                @php $i=$i+1; @endphp
                            </tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>     
</article>
@endsection