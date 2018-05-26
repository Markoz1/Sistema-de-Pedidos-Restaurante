@extends('layout.main')
@section('content')
<article class="content">
	<section class="section">
		<div class="card card-block sameheight-item" style="height: 733px;">
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
                <div class="form-group">
                    <label class="control-label">Seleccione el estado de la categoria</label>
                    <select class="form-control boxed" id="estado" name="estado" >
                        <option value="1">Categoria activada</option>
                        <option value="0">Categoria inactiva</option>
                    </select>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                        <a type="button" class="btn btn-primary" href="{{ route('categorias.index') }}">Regresar</a>
                    </div>
                </div>
            </form>
        </div>
	</section>
  </article>
@endsection
