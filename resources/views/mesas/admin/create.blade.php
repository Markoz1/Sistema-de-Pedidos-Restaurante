<div class="collapse mb-4" id="create_mesa">
    <div class="subtitle-block">
        <h3 class="subtitle"> Nueva Mesa </h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                        </div>
                        <div class="container">
                            @if (!isset($mesa_edit))
                            {!! Form::open(['route' => 'mesas.store']) !!}
                                @include('mesas.admin.form')
                            <div class="form-group row mt-4">
                                <div class="col-sm-10 col-sm-offset-2">
                                    <button type="submit" class="btn btn-primary" name="crear"> Crear </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        @endif
                        </div>
                    </div>
                </div>
            </div>
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
    </section>
</div>