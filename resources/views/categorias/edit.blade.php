@extends('layout.main')
@section('content')
<article class="content">
	<section class="section">
		<div class="card card-block sameheight-item">
            <div class="container">
                <div class="title-block">
                    <h3 class="title"> Editar categoria categoria </h3>
                </div>
                <form method="POST" role="form" action="{{ url("categorias/{$categoria->categoria_id}") }}" >
                    {{ method_field('PUT') }}
                    {{ csrf_field() }} 
                    <div class="form-group has-error">
                        <label class="control-label">Nombre Categoria</label>
                        <input type="text" class="form-control" name="nombreCategoria" value="{{ old('nombreCategoria', $categoria->nombre)}}">
                        @if( $errors->has('nombreCategoria') )
                            <span class="has-error">
                            {{ $errors->first('nombreCategoria') }}
                            </span>							
                        @endif 
                    </div>
                    @include('categorias.formulario')
                    <div class="form-group row mt-4">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a type="button" class="btn btn-primary" href="{{ route('categorias.index') }}">Regresar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</section>
  </article>
@endsection
