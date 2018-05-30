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
                        {{-- {!! Form::Model() !!} --}}
                            @include('mesas.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>