@extends('layout.main')
@section('content')
    
<article class="content static-tables-page">
        <div class="title-block">
            <h1 class="title"> Cuentas </h1>
            <p class="title-description"> Cuentas por cancelar </p>
        </div>
        
        <section class="section">
            <div class="row">
                
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-title-block">
                                <h3 class="title"> Listado de cuentas de las mesas actuales </h3>
                            </div>
                            <section class="example">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Mesa</th>
                                            <th>Precio Total</th>
                                            <th>Detalle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuentas as $cuenta)
                                            <tr>
                                                <th scope="row">{{$cuenta->mesa->id}}</th>
                                                <td>{{$cuenta->total}}</td>
                                                <td>
                                                    <div class="item-actions-block">
                                                        <ul class="item-actions-list">
                                                            <a class="btn btn-primary" href="{{ route('cuentas.facturaPDF',[$cuenta->id]) }}" id="edit5" type="button">
                                                                <span> Imprimir factura </span>
                                                            </a>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>    
                                        @endforeach
                                    </tbody>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    </article>    
@endsection