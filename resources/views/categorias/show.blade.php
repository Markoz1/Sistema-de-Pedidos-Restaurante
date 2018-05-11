@extends('layout.main')
@section('content')

<article class="content items-list-page">   
    <div class="title-search-block">
        <h3>Detalles de categoria</h3>
        <span>ID categoria:<span><p>{{$categoria->categoria_id}}</p>
        <span>Nombre categoria:<span><p>{{$categoria->nombre}}</p>
    </div>
    <a type="button" class="btn btn-primary" href="{{ route('categorias.index') }}">Regresar</a>
  
    
</article>
@endsection