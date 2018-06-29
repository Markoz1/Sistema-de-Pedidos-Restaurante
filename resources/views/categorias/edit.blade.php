@isset($categoria_edit)
    <div class="collapse mb-4" id="edit_categoria">
        <div class="subtitle-block">
            <h3 class="subtitle"> Editar Categoria </h3>
        </div>
        <section class="section">
            <div class="card card-block sameheight-item">
                <div class="container">
                    <div class="title-block">
                        <h3 class="title"> Editar categoria categoria </h3>
                    </div>     
                    <form method="POST" role="form" action="{{ url("categorias/{$categoria_edit->categoria_id}") }}" >
                        {{ method_field('PUT') }}
                        {{ csrf_field() }} 
                        <div class="form-group has-error">
                            <label class="control-label">Nombre Categoria</label>
                            <input type="text" class="form-control" name="nombreCategoria" value="{{ old('nombreCategoria', $categoria_edit->nombre)}}">
                            @if( $errors->has('nombreCategoria') )
                                <span class="has-error">
                                {{ $errors->first('nombreCategoria') }}
                                </span>							
                            @endif 
                        </div>
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 form-control-label text-xs-right">Estado</label>
                            <div class="col-md-8">
                                @if($categoria_edit->estado == true)
                                    <label>
                                        <input class="radio squared estado1" checked="checked" name="estado" type="radio" value="1" id="estado">
                                        <span>Activo</span>
                                    </label>
                                    <label>
                                        <input class="radio squared estado0"  name="estado" type="radio" value="0" id="estado">
                                        <span>Inactivo</span>
                                    </label>
                                @else
                                    <label>
                                        <input class="radio squared estado1"  name="estado" type="radio" value="1" id="estado">
                                        <span>Activo</span>
                                    </label>
                                    <label>
                                        <input class="radio squared estado0" checked="checked" name="estado" type="radio" value="0" id="estado">
                                        <span>Inactivo</span>
                                    </label>
                                @endif
                            </div>
                        </div>
                        @include('categorias.formulario')
                        <div class="form-group row mt-4">
                            <div class="col-sm-10 col-sm-offset-2">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a type="button" id="cerrar" class="btn btn-primary" href="{{ route('categorias.index') }}">cerrar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endisset