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
                        <div class="card-title-block">
                        </div>
                        <section class="example">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Nombre</th>
                                        <th>Nombre de usuario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($mesas as $mesa)
                                    <tr>
                                        <th scope="row">{{ $mesa->id }}</th>
                                        <td>{{ $mesa->nombre }}</td>
                                        <td>{{ $mesa->username }}</td>
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
    <script>
        function crear_mesa() {
            $('#create_mesa').collapse('toggle');
        }
        function editar_mesa() {
            $('#edit_mesa').collapse('toggle');
        }
    </script>
@endsection