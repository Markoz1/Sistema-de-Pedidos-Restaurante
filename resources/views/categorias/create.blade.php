@extends('layout.main')
@section('content')

<article class="content">
	<section class="section">
		<div class="card card-block sameheight-item" style="height: 733px;">
            <div class="title-block">
                <h3 class="title"> Ingrese los datos de la categoria </h3>
            </div>
            <form method="POST" role="form" action="{{url('categorias')}}" >
            	{{ csrf_field() }} 
                <div class="form-group has-error">
                    <label class="control-label">Nombre Categoria</label>
                    <input type="text" class="form-control" name="nombreCategoria" value="{{ old('nombreCategoria')}}">
                    	
                    	@if( $errors->has('nombreCategoria') )
		  					<span class="has-error">
		  						{{ $errors->first('nombreCategoria') }}
		  					</span>							
					 	@endif
                 
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary"> Crear Categoria </button>
                    </div>
                </div>
            </form>
        </div>
	</section>
  </article>
@endsection
