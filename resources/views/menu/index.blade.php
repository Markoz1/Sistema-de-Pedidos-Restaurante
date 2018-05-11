@extends('layout.main-menu')
@section('content')
    <article class="content">
        <section class="section">
            <div class="card-block">
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card-title-block">
                            <h3 class="title"> Pill Tabs </h3>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills mt-4">
                            <li class="nav-item">
                                <a href="" class="nav-link active" data-target="#home-pills" aria-controls="home-pills" data-toggle="tab" role="tab">Home</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-target="#profile-pills" aria-controls="profile-pills" data-toggle="tab" role="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-target="#messages-pills" aria-controls="messages-pills" data-toggle="tab" role="tab">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link" data-target="#settings-pills" aria-controls="settings-pills" data-toggle="tab" role="tab">Settings</a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content mt-4">
                            <div class="tab-pane fade in active" id="home-pills">
                                <div class="card-deck mt-4">
                                    {{-- falta poner un efecto hover --}}
                                    <div class="card border-primary mb-3" data-toggle="modal" data-target="#modal">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3" data-toggle="modal" data-target="#modal">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-deck">
                                    <div class="card border-primary mb-3">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                    <div class="card border-primary mb-3">
                                        <img class="card-img-top" src="http://placeimg.com/300/180/nature" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre Plato</h5>
                                            <p class="card-text">34.12 BOB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile-pills">
                                contenido
                            </div>
                            <div class="tab-pane fade" id="messages-pills">
                                contenido
                            </div>
                            <div class="tab-pane fade" id="settings-pills">
                                contenido
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        @include('pedidos.create')
                    </div>
                </div>
            </div>
            <!-- /.card-block -->
        </section>
        <!-- Button trigger modal -->
    @include('menu.modal')
        
    </article>
@endsection