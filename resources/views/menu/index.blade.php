@extends('layout.main-menu') 
@section('content')
<article class="content">
  <section class="section">
    <div class="">
      <div class="card-block">
        <div class="row">
          <div class="col-xl-8">
            <div class="card-title-block">
              <h3 class="title">Menú</h3>
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
                  <section class="carousel slide" data-ride="carousel-{{ $categoria->nombre }}" id="carousel" data-interval="false">
                    <div class="container-fluid">
                      <div class="row">
                        <ol class="carousel-indicators">
                          @foreach ($categoria->productos as $producto)
                            @php
                              $div = intdiv($loop->count-1,6);
                              $mod = ($loop->count-1)%6;
                              if($mod > 0){
                                $count = $div + 1;
                              }
                              else{
                                $count = $div;
                              }
                            @endphp
                            @break
                          @endforeach
                          @for ($i = 0; $i < $count; $i++)
                            <li data-target="#carousel-{{ $categoria->nombre }}" data-slide-to="{{$i}}" class="{{ $i===0 ? 'active' : '' }}"></li>
                          @endfor                        
                        </ol>
                        <div class="col-md-1 lead d-flex align-items-center justify-content-start">
                          <a class="btn btn-primary-outline prev" href="#carousel-{{ $categoria->nombre }}" title="go back" data-slide="prev"><i class="fa fa-lg fa-chevron-left"></i></a>
                        </div>
                        <div class="col-md-10 px-0">
                          <div class="carousel-inner">
                          @php
                            $count_cards = 1;
                          @endphp
                          @foreach ($categoria->productos as $producto)                      
                            @if ($count_cards > 6)
                              @php
                                $count_cards = 1;
                              @endphp
                            @endif
                            @if ($count_cards === 1)
                              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            @endif 
                              @if ($count_cards < 4)
                                @if ($count_cards === 1)
                                  <div class="card-deck">
                                @endif
                                    <div class="card border-primary mb-3" onclick="mostrar_informacion_producto('{{ route('productos.show', ['id' => $producto->producto_id]) }}')">
                                      <img class="card-img-top" src="{{ asset($producto->foto) }}" alt="{{$producto->nombre}}" >
                                      <div class="card-body d-flex align-items-center">
                                        <div>
                                          <h5 class="card-title">{{$producto->nombre}}</h5>
                                          <p class="card-text"><B>{{$producto->precio}} (Bs.)</B></p>
                                        </div>
                                      </div>
                                    </div>
                                  @if ($loop->last)
                                    @for ($i = 0; $i < 3 - $count_cards; $i++)
                                      <div class="card border-primary mb-3">
                                      </div>
                                    @endfor
                                  @endif
                                @if ($count_cards === 3 || $loop->last)
                                  </div> {{-- card-deck fin --}}
                                @endif
                              @endif
                              @if ($count_cards > 3)
                                @if ($count_cards === 4)
                                  <div class="card-deck">
                                @endif
                                    <div class="card border-primary mb-3" onclick="mostrar_informacion_producto('{{ route('productos.show', ['id' => $producto->producto_id]) }}')">
                                      <img class="card-img-top" src="{{ asset($producto->foto) }}" alt="{{$producto->nombre}}">
                                      <div class="card-body d-flex align-items-center">
                                        <div>
                                          <h5 class="card-title">{{$producto->nombre}}</h5>
                                          <p class="card-text"><B>{{$producto->precio}} (Bs.)</B></p>
                                        </div>
                                      </div>
                                    </div>
                                  @if ($loop->last)
                                    @for ($i = 0; $i < 6 - $count_cards; $i++)
                                      <div class="card border-primary mb-3">
                                      </div>
                                    @endfor
                                  @endif
                                @if ($count_cards === 6 || $loop->last)
                                  </div>{{-- card-deck fin --}}
                                @endif
                              @endif                              
                              @if ($count_cards === 6 || $loop->last)
                                </div>{{-- carousel-item fin --}}                            
                              @endif
                              @php
                                $count_cards++;
                              @endphp                
                          @endforeach
                          </div>{{-- carousel-inner fin --}}                        
                        </div>{{-- col-10 px-0 fin --}}
                        <div class="col-md-1 lead d-flex align-items-center justify-content-end">
                          <a class="btn btn-primary-outline next" href="#carousel-{{ $categoria->nombre }}" title="more" data-slide="next"><i class="fa fa-lg fa-chevron-right"></i></a>
                        </div>
                      </div>{{-- row fin --}}
                    </div>{{-- container fin --}}
                  </section>
                </div>{{-- tab-pane fin --}}
              @endforeach
            </div>{{-- tab-content fin --}}            
          </div>{{-- col-xl-8 --}}
          <div class="col-xl-4">
            @include('pedidos.create')
          </div>
        </div>{{-- row --}}
      </div><!-- /.card-block -->
    </div>
  </section>
  <!-- Button trigger modal -->
  @include('menu.modal')
</article>
@endsection
{{-- Codigo Javascript importado en la vista pedidos.create --}}
