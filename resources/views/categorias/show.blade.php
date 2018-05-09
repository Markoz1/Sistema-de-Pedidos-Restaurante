@extends('layout.main')
@section('content')

<article class="content items-list-page">   
    <div class="title-search-block">
        <h1>{{$categoria->nombre}}</h1>
    </div>
    <a type="button" class="btn btn-primary" href="{{ route('categorias.index') }}">Regresar</a>
  
    
</article>
@endsection