@extends('layout.main')
@section('content')

<article class="content responsive-tables-page">
    <div class="title-block">
        <h1 class="title"> Categorias </h1>
        <p class="title-description"> Lista de categorias </p>
    </div>
    @if(session('mensaje'))
	    <div class="alert alert-dismissible alert-success">
	        <button type="button" class="close" data-dismiss="alert">×</button>
	        {{ session('mensaje') }}
	    </div>
    @endif
    <section class="section">
        <div class="card card-block sameheight-item">
            <div class="title-block">
                <h3 class="title"> Ingrese los datos de la nueva categoria </h3>
            </div>
            <form method="POST" role="form" action="{{url('categorias')}}" >
                {{ csrf_field() }} 
                <div class="form-group has-error">
                    <label class="control-label">Nombre</label>
                    <input type="text" class="form-control" name="nombreCategoria" value="{{ old('nombreCategoria')}}">
                    @if( $errors->has('nombreCategoria') )
                        <span class="has-error">
                        {{ $errors->first('nombreCategoria') }}
                        </span>							
                    @endif             
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary"> Crear</button>
     
                    </div>
                </div>
            </form>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title"> Tabla de categorias</h3>
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
                                                    <div class="item-col fixed item-col-actions-dropdown">
                                                            <div class="item-actions-dropdown">
                                                                <a class="item-actions-toggle-btn">
                                                                    <span class="inactive">
                                                                        <i class="fa fa-cog"></i>
                                                                    </span>
                                                                    <span class="active">
                                                                        <i class="fa fa-chevron-circle-right"></i>
                                                                    </span>
                                                                </a>
                                                                <div class="item-actions-block">
                                                                    <ul class="item-actions-list">
                                                                        <li>
                                                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal">
                                                                                <i class="fa fa-trash-o "></i>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a class="edit" href="#">
                                                                                <i class="fa fa-pencil"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</article>
@endsection