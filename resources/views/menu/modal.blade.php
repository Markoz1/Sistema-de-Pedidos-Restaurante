<!-- Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="modal_informacion" role="dialog" tabindex="-1">
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
            <img class="img-fluid" alt="" src="" id="foto" inicio="{{ route('inicio') }}">
            </img>
          </div>
          <div class="col-md-6">
            <div class="row">
              <div class="col">
                <h4 id="nombre">
                </h4>
              </div>
            </div>
            <div class="row">
              <div class="col d-flex justify-content-end">
                <h5>
                  <B id="precio"></B>
                  <B>(Bs.)</B>
                </h5>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-md-12">
                <p id="descripcion">
                </p>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <h5>Cantidad</h5>
          <div class="form-group row mb-0 d-flex justify-content-center">
              <div class="input-group col-sm-4">
                <div class="row">
                  <div class="col-md-4">
                    <a class="btn btn-primary btn-menu-cantidad d-flex align-items-center justify-content-center" href="#" onclick="reducir_cantidad()">
                        <i class="fa fa-minus"></i>
                    </a>
                  </div>
                  <div class="col-md-4">
                    {!! Form::number('cantidad', 1, ['class' => 'form-control boxed text-center input-menu-cantidad px-1', 'min' => '1', 'max' => '10']) !!}
                  </div>
                  <div class="col-md-4">
                    <a class="btn btn-primary btn-menu-cantidad d-flex align-items-center justify-content-center" href="#" onclick="aumentar_cantidad()">
                        <i class="fa fa-plus"></i>
                    </a>
                  </div>
                </div>
              </div>              
          </div>
        </hr>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-dismiss="modal" type="button">
          Cerrar
        </button>
        <button type="button" class="btn btn-primary" id="agregar" value="" onclick="agregar(this.value)">Agregar</button>
      </div>
    </div>
  </div>
</div>