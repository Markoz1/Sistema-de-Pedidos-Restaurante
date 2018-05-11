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
              <li class="nav-item">
                <a aria-controls="home-pills" class="nav-link active" data-target="#home-pills" data-toggle="tab" href="" role="tab">
                  Platos
                </a>
              </li>
              <li class="nav-item">
                <a aria-controls="profile-pills" class="nav-link" data-target="#profile-pills" data-toggle="tab" href="" role="tab">
                  Bebidas
                </a>
              </li>
              <li class="nav-item">
                <a aria-controls="messages-pills" class="nav-link" data-target="#messages-pills" data-toggle="tab" href="" role="tab">
                  Postres
                </a>
              </li>
              {{-- <li class="nav-item">
                <a aria-controls="settings-pills" class="nav-link" data-target="#settings-pills" data-toggle="tab" href="" role="tab">
                  Settings
                </a>
              </li> --}}
            </ul>
            <!-- Tab panes -->
            <div class="tab-content mt-4">
              {{--
              <button class="btn btn-sm btn-primary click-menu" data-url="{{url('modal-menu'). '?p_id=' . $producto->producto_id }}" type="button">
                Quick View
              </button>
              --}}
              <div class="tab-pane active" id="home-pills">
                <div class="card-deck mt-4">
                  {{-- falta poner un efecto hover --}}
                  @foreach($productos as $producto)
                  	@if($producto->categoria_id == 1)
                    {{--
                    <div class="card border-primary mb-3 click-menu" data-toggle="modal" data-url="{{url('modal-menu'). '?p_id=' . $producto->producto_id }}">
                      --}}
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
                <div class="tab-pane fade" id="profile-pills">
                  <div class="card-deck mt-4">
                    {{-- falta poner un efecto hover --}}
                    @foreach($productos as $producto)
                    	@if($producto->categoria_id == 3)
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
                <div class="tab-pane fade" id="messages-pills">
                  <div class="card-deck mt-4">
                    {{-- falta poner un efecto hover --}}
                    @foreach($productos as $producto)
                    	@if($producto->categoria_id == 2)
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
                {{-- <div class="tab-pane fade" id="settings-pills">
                  contenido 4
                </div> --}}
              </div>
            </div>
            <div class="col-xl-4">
              @include('pedidos.create')
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
