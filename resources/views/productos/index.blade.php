@extends('layout.main')
@section('content')
    <article class="content items-list-page">   
        <div class="title-search-block">
            <div class="title-block">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="title"> Productos
                            <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm rounded-s"> Nuevo Producto </a>
                        </h3>
                        <p class="title-description"> Lista de Productos</p><br>
                    </div>
                </div>
            </div>
            <div class="items-search">
                    <form action="{{ route('productos.index') }}" method="get" enctype="multipart/form-data">
                        <table class="table-borderless">
                                <thead>
                                  <tr>
                                   <th>
                                            <input type="text" class="form-control boxed" placeholder="Criterio de Busqueda" name="busqueda" value="{{ $anterior->get("busqueda")}}" autocomplete="off">
                                    </th>
                                    <th>
                                            <button class="btn btn-dark" type="submit"><b>Buscar</b></button>
                                    </th>                                          
                                  </tr>
                                </thead>
                        </table> <br>
                        
                        <a  data-toggle="collapse" data-target="#collapseExample" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Criterios de Busqueda
                        </a>
                        <div class="collapse dropdown-menu" id="collapseExample">
                                    <table class="table table-secondary">
                                            <thead>
                                              <tr>
                                                <th><span style="text-align:center;" class="input-group-text" id="inputGroup-sizing-sm">Estado :</span></th>
                                                <th>
                                                        <select class="form-control boxed" name="estado" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                <option value="0" {{ $anterior->get("estado")==0?"selected":"" }}>Todos</option>
                                                                <option value="1" {{ $anterior->get("estado")==1?"selected":"" }}>Activo</option>
                                                                <option value="2" {{ $anterior->get("estado")==2?"selected":"" }}>Inactivo</option>
                                                        </select>                                            
                                                </th>                                           
                                              </tr>
                                            </thead>
                                            <thead>
                                                <tr>
                                                 <th><span  style="text-align:center;" class="input-group-text" id="inputGroup-sizing-sm">Categoria :</span></th>
                                                 <th>
                                                        <select class="form-control boxed" name="categoria" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                                                <option value="0" {{ $anterior->get("categoria")==0?" selected":"" }}>Todos</option>
                                                                @forelse($categorias as $cat)                                                    
                                                                @if($anterior->get("categoria") == $cat->categoria_id)
                                                                <option value={{ $cat->categoria_id}} selected>{{ $cat->nombre }}</option>
                                                                @else 
                                                                <option value={{ $cat->categoria_id}}>{{ $cat->nombre }}</option>
                                                                @endif
                                                                @empty
                                                                    <p>Ningun item registrado</p>
                                                                @endforelse                                               
                                                        </select>                                                 
                                                 </th>
                                                </tr>
                                            </thead>
                                    </table>
                            </div>
                    </form>               
            </div>
        </div>
        @if(session('mensaje'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>{{ session('mensaje') }}
        </div>
        @endif
        <div class="card items">
            <ul class="item-list striped">
                <li class="item item-list-header">
                    <div class="item-row">
                        <div class="item-col item-col-header fixed item-col-img md">
                            <div>
                                <span>Foto</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-title pl-3">
                            <div>
                                <span>Nombre</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-sales text-center">
                            <div>
                                <span>Precio</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-category text-center">
                            <div class="no-overflow">
                                <span>Estado</span>
                            </div>
                        </div>
                        <div class="item-col item-col-header item-col-category text-center">
                                <div class="no-overflow">
                                    <span>Categoria</span>
                                </div>
                            </div>
                        <div class="item-col item-col-header fixed item-col-actions-dropdown"> </div>
                    </div>
                </li>                
                @forelse ($productos as $producto)               
                <li class="item">
                    <div class="item-row">
                        <div class="item-col fixed item-col-img md">
                            <div class="item-img rounded" style="background-image: url({{ asset($producto->foto) }})"></div>
                        </div>
                        <div class="item-col fixed pull-left item-col-title pl-3">
                            <div class="item-heading">Nombre</div>
                            <div>{{ $producto->nombre }}</div>
                        </div>
                        <div class="item-col item-col-sales text-center">
                            <div class="item-heading">Precio</div>
                            <div>{{ $producto->precio }} BOB</div>
                        </div>
                        <div class="item-col item-col-category no-overflow text-center">
                                <div class="item-heading">Estado</div>
                                <div class="no-overflow">
                                    @php 
                                    if ($producto->estado_id == 1){
                                        $color="blue";
                                        $valor="Activo";
                                    }else{
                                        dd($producto->estado_id);
                                        $color="red";
                                        $valor="Inactivo";
                                    }
                                    //dd($producto->estado_id);
                                    @endphp
                                    <font color={{$color}}>{{ $valor }}</font>
                                </div>
                            </div>
                        <div class="item-col item-col-category no-overflow text-center">
                            <div class="item-heading">Categoria</div>
                            <div class="no-overflow">
                                <a>{{ $producto->categoria->nombre }}</a>
                            </div>
                        </div>
                        <div class="item-col fixed item-col-actions-dropdown">
                            <div class="item-actions-dropdown">
                                <a class="item-actions-toggle-btn">
                                    <span class="inactive">
                                        <i class="fa fa-cog"></i>
                                    </span>
                                    <span class="active">
                                        <i class="fa fa-chevron-circle-right"></i>
                                    </span>
                                </a>
                                <div class="item-actions-block">
                                    <ul class="item-actions-list">
                                        <li>
                                            <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal">
                                                <i class="fa fa-trash-o "></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="edit" href="#">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @empty
                <br>
                    <p align="center"><b>No Existen Resultados Coincidentes</b></p>
                <br>
                @endforelse
            </ul>
        </div>
        
        {!! $productos->appends($_GET)->links('pagination') !!}
        <!--
            $productos->links('pagination')
        <nav class="text-right">
                {{ $productos->links() }}
                <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href=""> Prev </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href=""> 1 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> 2 </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href=""> Next </a>
                        </li>
                    </ul>
        </nav>
        -->
    </article>
@endsection