<div class="collapse mb-4" id="create_categoria">
    <div class="subtitle-block">
        <h3 class="subtitle"> Nueva Mesa </h3>
    </div>
    <section class="section">
        <div class="card card-block sameheight-item">
            <div class="container">
                <div class="title-block">
                    <h3 class="title"> Ingrese los datos de la nueva categoria </h3>
                </div>
                <form method="POST" role="form" action="{{url('categorias')}}" >
                    {{ csrf_field() }} 
                    <div class="form-group has-error">
                        <label class="control-label required">Nombre</label><span> *</span>
                        <input type="text" class="form-control" name="nombreCategoria" value="{{ old('nombreCategoria')}}">
                        @if( $errors->has('nombreCategoria') )
                            <span class="has-error">
                            {{ $errors->first('nombreCategoria') }}
                            </span>							
                        @endif             
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-md-4 form-control-label text-xs-right">Estado</label>
                        <div class="col-md-8">
                            <label>
                                <input class="radio squared estado1" checked="checked" name="estado" type="radio" value="1" id="estado">
                                <span>Activo</span>
                            </label>
                            <label>
                                <input class="radio squared estado0" name="estado" type="radio" value="0" id="estado">
                                <span>Inactivo</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row mt-4">
                        <div class="col-sm-10 col-sm-offset-2">
                            <button type="submit" class="btn btn-primary"> Crear</button>
                        </div>
                    </div>
                    <small class="required">Campo obligatorio</small>
                </form>
            </div>
        </div>
    </section>
</div>