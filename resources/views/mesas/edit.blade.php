<div class="collapse mb-4" id="edit_mesa">
    <div class="subtitle-block">
        <h3 class="subtitle"> Editar Mesa </h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                        </div>
                        <div class="container">
                            @isset($mesa_edit)
                            {!! Form::Model($mesa_edit, ['route' => ['mesas.update', $mesa_edit->id],'method' => 'put']) !!}
                            {{ Form::hidden('mesa_id', $mesa_edit->id) }}
                            @endisset
                                @include('mesas.form')                            
                            <div class="form-group row">
                                {!! Form::label('username', 'Nombre de usuario', ['class' => 'col-sm-4 form-control-label text-xs-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::text('username', null, ['class' => 'form-control boxed '.($errors->has('username')?'is-invalid':'')]) !!}
                                    <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('password', 'Contraseña nueva', ['class' => 'col-sm-4 form-control-label text-xs-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::password('password', ['class' => 'form-control boxed '.($errors->has('password')?'is-invalid':'')]) !!}
                                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('password_confirmation', 'Confirmar contraseña nueva', ['class' => 'col-sm-4 form-control-label text-xs-right']) !!}
                                <div class="col-sm-6">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control boxed '.($errors->has('password_confirmation')?'is-invalid':'')]) !!}
                                    <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="button" class="btn btn-secondary" id="cerrar"> Cerrar </button>
                                    <button type="submit" class="btn btn-primary" name="actualizar"> Actualizar </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>