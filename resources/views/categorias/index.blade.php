@extends('layout.main')
@section('content')

<article class="content items-list-page">   
    <div class="title-search-block">
        <div class="title-block">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title"> Categorias
                        <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm rounded-s"> Nueva categoria </a>
                    </h3>
                    <p class="title-description"> Lista de Categorias</p>
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
    <div class="card-block">
        <div class="card-title-block">
            <h3 class="title"> Lista de categorias </h3>
        </div>
        <section class="example">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                        	<th># Id</th>
                            <th>Nombre de la caategoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($categorias as $categoria)
                    		<tr>
                    			<td>{{$categoria->categoria_id}}</td>
	                            <td>{{$categoria->nombre}}</td>
                                <th>
                                    <a href="{{ route('categorias.edit',[$categoria->categoria_id]) }}"> Editar </a>
                                </th>
                                
                            </tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</article>
@endsection