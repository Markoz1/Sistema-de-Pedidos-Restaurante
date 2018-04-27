@extends('layout.main')
@section('content')
    <article class="content">
        <section class="section">
                {{-- <div class="col-xl-12">
                    <div class="card sameheight-item">
                        <div class="card-block">
                            <!-- Nav tabs -->
                            <div class="card-title-block">
                                <h3 class="title"> Basic Tabs </h3>
                            </div>
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <a href="#home" class="nav-link active" data-target="#home" data-toggle="tab" aria-controls="home" role="tab">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#profile" class="nav-link" data-target="#profile" aria-controls="profile" data-toggle="tab" role="tab">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" data-target="#messages" aria-controls="messages" data-toggle="tab" role="tab">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link" data-target="#settings" aria-controls="settings" data-toggle="tab" role="tab">Settings</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content tabs-bordered">
                                <div class="tab-pane fade in active" id="home">
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="card">
                                                <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title">Card title</h5>
                                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little
                                                        bit longer.</p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <div class="header-block">
                                                        <p class="title"> Primary card </p>
                                                    </div>
                                                </div>
                                                <div class="card-block">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam
                                                        ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                </div>
                                                <div class="card-footer"> Card Footer </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <div class="header-block">
                                                        <p class="title"> Primary card </p>
                                                    </div>
                                                </div>
                                                <div class="card-block">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam
                                                        ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                                </div>
                                                <div class="card-footer"> Card Footer </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                        laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-block -->
                    </div>
                    <!-- /.card -->
                </div> --}}
            <div class="">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Nombre Restaurante</p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card-title-block">
                                <h3 class="title"> Pill Tabs </h3>
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
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
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <div class="card-deck mt-4">
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="{{ asset('storage/fotos/iWfMjTKnkZJGB8iLQ84sqvOc2svmDbo1SGhpberm.jpeg') }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-deck">
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ordenar </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <div class="card-deck mt-4">
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="{{ asset('storage/fotos/iWfMjTKnkZJGB8iLQ84sqvOc2svmDbo1SGhpberm.jpeg') }}" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-deck">
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                        <div class="card border-primary mb-3">
                                            <img class="card-img-top" src="http://lorempixel.com/360/180/food/" alt="Card image cap">
                                            <div class="card-body">
                                                <h5 class="card-title">Nombre Plato</h5>
                                                <p class="card-text">34.12 BOB</p>                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                        sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                        et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                        ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                                        sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <div class="header-block">
                                        <p class="title"> Primary card </p>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices
                                        accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                                </div>
                                <div class="card-footer"> Card Footer </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-block -->
            </div>
        </section>
        <!-- Button trigger modal -->
        
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </article>
@endsection