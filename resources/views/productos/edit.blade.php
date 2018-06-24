@extends('layout.main')
@section('content')
    <article class="content item-editor-page">
        <form method="POST" role="form" action="{{ url("productos/{$producto->producto_id}") }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }} 
            <div class="card card-block">
                <div class="form-group row">
                    <label for="nombre" class="col-sm-2 form-control-label text-xs-right">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" id="nombre" value="{{$producto->nombre}}">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="precio" class="col-sm-2 form-control-label text-xs-right">Precio</label>
                    <div class="input-group col-sm-10">                        
                        <input class="form-control boxed " min="0" step="0.01" name="precio" type="number" id="precio" value="{{ $producto->precio }}">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="precio">BOB</span>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group row">
                        <label for="categoria_id" class="col-sm-2 form-control-label text-xs-right">Categoría</label>
                        <div class="col-sm-10">
                            <select class="form-control boxed " id="categoria_id" name="categoria_id">
                                <option selected="selected">Selecciona una Categoria</option>
                                @foreach ($categorias as $categoria)
                                    @if ($categoria->categoria_id == $producto->categoria_id)
                                        <option value="{{ $categoria->categoria_id }}" selected>{{ $categoria->nombre }}</option>    
                                    @else
                                        <option value="{{ $categoria->categoria_id }}">{{ $categoria->nombre }}</option>
                                    @endif
                                @endforeach()
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                <div class="form-group row">
                    <label for="descripcion" class="col-sm-2 form-control-label text-xs-right">Descripción</label>
                    <div class="col-sm-10">
                        <textarea class="form-control boxed " placeholder="Escribe una breve descripción..." rows="3" name="descripcion" cols="50" id="descripcion">{{$producto->descripcion}}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 form-control-label text-xs-right">Foto</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="foto" type="file" id="foto">
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col-sm-10 col-sm-offset-2">
                        <button type="submit" class="btn btn-primary"> Atualizar </button>
                       
                    </div>
                </div>
            </div>
        </form>
    </article>
@endsection
