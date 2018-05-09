<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="http://placeimg.com/300/180/nature" class="img-fluid rounded mx-auto d-block" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 id="nombre">Pizza</h5>
                            </div>
                            <div class="col-md-6">
                                <h5 id="precio">34.45</h5>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="form-group row">
                    {!! Form::label('cantidad', 'Cantidad', ['class' => 'col-md-2 form-control-label text-xs-right']) !!}
                    <div class="input-group col-md-10">
                        {!! Form::number('cantidad', 1, ['class' => 'form-control boxed', 'min' => '1', 'max' => '10'] ) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" value="1" onclick="agregar(this)" id="agregar">Agregar</button>
            </div>
        </div>
    </div>
</div>