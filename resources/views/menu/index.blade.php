@extends('layout.main-menu')
@section('content')
<article class="content">
  <section class="section">
    <div class="">
      <div class="card-block">
        <div class="row">
          <div class="col-xl-8">
            <div class="card-title-block">
              <h3 class="title">
                Menú
              </h3>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-pills mt-4">
            	@foreach($categorias as $categoria)
            	  <li class="nav-item">
            	    <a aria-controls="{{$categoria->nombre}}-pills" class="nav-link {{ $loop->first ? 'active' : '' }}" data-target="#{{$categoria->nombre}}-pills" data-toggle="tab" href="" role="tab">
            	      {{$categoria->nombre}}
            	    </a>
            	  </li>
              @endforeach
            </ul>
            <!-- Tab panes -->
            <div class="tab-content mt-4">
              @foreach($categorias as $categoria)

              	<div class="tab-pane {{ $loop->first ? 'active' : '' }}" id="{{$categoria->nombre}}-pills">
              	  <div class="card-deck mt-4">
              	    {{-- falta poner un efecto hover --}}
              	    @foreach($productos as $producto)
              	    	@if($producto->categoria_id == $categoria->categoria_id)
              	        <div class="col-md-4">
              	          <div class="card border-primary mb-3 click-menu" data-target="#modal" data-toggle="modal" onclick="modaldatos({{$producto}})" value="{{$producto->producto_id}}">
              	            <img alt="{{$producto->nombre}}" class="card-img-top" height="180" src="{{ asset($producto->foto) }}" with="360">
              	              <div class="card-body">
              	                <h5 class="card-title">
              	                  {{$producto->nombre}}
              	                </h5>
              	                <p class="card-text">
              	                  {{$producto->precio}}
              	                </p>
              	              </div>
              	            </img>
              	          </div>
              	        </div>
              	      @endif
              	    @endforeach
              	  </div>
              	</div>
              @endforeach
            </div>
            </div>
            <div class="col-xl-4">
              <div class="card card-primary">
                <div class="card-header">
                  <div class="header-block">
                    <p class="title">
                      Mesa #
                    </p>
                  </div>
                </div>
                <div class="card-block">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices
                                        accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.
                  </p>
                </div>
                <div class="card-footer">
                  Card Footer
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-block -->
      </div>
    </div>
  </section>
  <!-- Button trigger modal -->
  @include('menu.modal')
</article>
@endsection

@section('script')
<script>
  // $(function () {
        //     /**
        //      * Load Menu Modal
        //      * @type {any}
        //      */
        //     var $modal = $('#modal-menu');
        //     $('.click-menu').on('click', function (e) {
        //         e.preventDefault();
        //         $modal.load($(this).attr("data-url"), function () {
        //             $modal.modal({show: true});
        //         });
        //     });
        // });
        // $(function mostrarModal(e) {
        // 	// body...
        // })

        function modaldatos(producto) {
        	$('#nombre').text(producto.nombre);
        	$('#precio').text(producto.precio);
        	$('#descripcion').text(producto.descripcion);
        };
</script>
@endsection
