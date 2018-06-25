@extends('layout.main')
@section('content')
    <article class="content item-editor-page">
        <form method="POST" role="form" action="{{ url("productos/{$producto->producto_id}") }}" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }} 
            <div class="card card-block">
                <div class="form-group row">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('nombre',$producto->nombre, ['class' => 'form-control boxed '.($errors->has('nombre')?'is-invalid':'')]) !!}
                        <input type="hidden" name="estado_id" value="1">
                        <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('precio', 'Precio', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                    <div class="input-group col-sm-10">                        
                        {!! Form::number('precio', $producto->precio, ['class' => 'form-control boxed '.($errors->has('precio')?'is-invalid':''), 'min' => '0', 'step' => '0.01']) !!}
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="precio">BOB</span>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('precio') }}</div>
                    </div>
                </div>
                <div class="form-group has-error row">
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
                            @if( $errors->has('categoria_id') )
                            <span class="has-error">
                            {{ $errors->first('categoria_id') }}
                            </span>							
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('descripcion', 'Descripción', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('descripcion', $producto->descripcion, 
                            ['class' => 'form-control boxed '.($errors->has('descripcion')?'is-invalid':''), 'placeholder' => 'Escribe una breve descripción...', 'rows' => '3']) !!}
                            <div class="invalid-feedback">{{ $errors->first('descripcion') }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('foto', 'Foto', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                        <div class="col-sm-10">
                            {!! Form::file('foto', ['class' => 'form-control boxed '.($errors->has('foto')?'is-invalid':''), 'accept' => 'image/*']) !!}
                            <div class="invalid-feedback">{{ $errors->first('foto') }}</div>
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
