<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal" role="dialog" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          Descripción
        </h5>
        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
          <span aria-hidden="true">
            ×
          </span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img alt="" src="">
            </img>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <h5 id="nombre">
                  Nombre
                </h5>
              </div>
              <div class="col-md-6">
                <h5 id="precio">
                  Precio
                </h5>
              </div>
            </div>
            <div class="row mt-3">
              <p id="descripcion">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui, quidem. Dicta alias inventore, voluptate suscipit ex cumque quasi incidunt tempora ratione harum possimus dolores, minima modi. Repellat cupiditate eveniet amet.
              </p>
            </div>
          </div>
        </div>
        <hr>
          <div class="form-group row">
            <div class="form-group row">
                {!! Form::label('precio', 'Cantidad', ['class' => 'col-sm-2 form-control-label text-xs-right']) !!}
                <div class="input-group col-sm-10">                        
                    {!! Form::number('precio', null, ['class' => 'form-control boxed '.($errors->has('precio')?'is-invalid':''), 'min' => '0', 'step' => '0.01']) !!}
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="precio">BOB</span>
                    </div>
                    <div class="invalid-feedback">{{ $errors->first('precio') }}</div>
                </div>
            </div>
          </div>
        </hr>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal" type="button">
          Cerrar
        </button>
        {{--
        <button class="btn btn-primary" type="button">
          Save changes
        </button>
        --}}
      </div>
    </div>
  </div>
</div>