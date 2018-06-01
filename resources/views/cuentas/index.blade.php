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
                                            <th>Last Name</th>
                                            <th>Username</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">mesa 1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">mesa 1</th>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">mesa 1</th>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                        </tr>
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