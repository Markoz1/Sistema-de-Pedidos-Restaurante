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
                        {!! Form::open() !!}
                            @include('mesas.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>