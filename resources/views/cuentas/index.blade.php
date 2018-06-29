@extends('layout.main') 
@section('content')
<article class="content static-tables-page">
    <div class="title-block">
        <h1 class="title"> Cuentas </h1>
        <p class="title-description"> Listado de cuentas cerradas </p>
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
                                        <th>Mesa</th>
                                        <th class="text-center">Total (Bs.)</th>
                                        <th class="text-center">Recibido (Bs.)</th>
                                        <th class="text-center">Cambio (Bs.)</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuentas as $cuenta)
                                    <tr>
                                        <th scope="row">{{ $cuenta->id }}</th>
                                        <td>{{ $cuenta->mesa->nombre }}</td>
                                        <td class="text-center">{{ $cuenta->total }}</td>
                                        <td class="text-center">{{ $cuenta->recibido }}</td>
                                        <td class="text-center">{{ $cuenta->cambio }}</td>
                                        <td class="text-center">
                                            <div class="item-actions-block">
                                                <a class="edit" href="{{ route('mesas.edit', ['id' => $cuenta->id]) }}">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                {!! $cuentas->appends($_GET)->links('pagination') !!}
            </div>
        </div>
    </section>
</article>
@endsection