@extends('layout.main')
@section('content')
<article class="content">
    <div class="title-block">
        <h3 class="title"> Mesas 
            <a href="#nueva_mesa" class="btn btn-primary btn-sm rounded-s" onclick="crear_mesa()"> Nueva Mesa </a>
        </h3>
    </div>
    @include('mesas.create')
    @include('mesas.edit')
    <div class="subtitle-block">
        <h3 class="subtitle"> Listado de mesas </h3>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        @if(session('mensaje'))
                        <div class="alert alert-dismissible alert-success">
                            <button type="button" class="close" data-dismiss="alert">×</button> {{ session('mensaje') }}
                        </div>
                        @endif
                        <section class="example">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Nombre</th>
                                        <th class="text-center">Nombre de usuario</th>
                                        <th class="text-center">Estado</th>                                                                               
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($mesas as $mesa)
                                    <tr>
                                        <th scope="row">{{ $mesa->id }}</th>
                                        <td>{{ $mesa->nombre }}</td>
                                        <td class="text-center">{{ $mesa->username }}</td>                                        
                                        <td class="text-center">
                                            @if ($mesa->estado)
                                                <span class="badge badge-success">Activo</span>
                                            @else
                                                <span class="badge badge-danger">Inactivo</span>
                                            @endif
                                        </td>                                        
                                        <td class="text-center">
                                            <div class="item-actions-block">
                                                <a class="edit" href="{{ route('mesas.edit', ['id' => $mesa->id]) }}" onclick="editar_mesa()">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr> 
                                @endforeach                                                                      
                                </tbody>
                            </table>                            
                        </section>
                        {!! $mesas->appends($_GET)->links('pagination') !!}
                    </div>                    
                </div>
            </div>
        </div>
    </section>
</article>
@endsection
@section('script')
    @if($errors->has('numero'))
    <script>
        $('#create_mesa').collapse('show');
    </script>        
    @endif
    <script>
        $(document).ready(function(){
        });
        function crear_mesa() {
            $('#create_mesa').collapse('toggle');
            $('#edit_mesa').collapse('hide');
        };
        function editar_mesa() {
            $('#edit_mesa').collapse('toggle');//talvez show
            $('#create_mesa').collapse('hide');
        };
        
    </script>
@endsection