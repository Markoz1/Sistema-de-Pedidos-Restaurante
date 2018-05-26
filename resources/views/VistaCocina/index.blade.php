@extends('layout.main-menu') 
@section('content')
<article class="content cards-page">
    <div class="title-block">
        <h3 class="title"> Cards </h3>
        <p class="title-description"> Cards can contain almost any kind of element inside </p>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-default">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Default card </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="card-footer"> Card Footer </div>
                </div>
            </div>
            <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Primary card </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="card-footer"> Card Footer </div>
                </div>
            </div>
            <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card card-success">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Success card </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="card-footer"> Card Footer </div>
                </div>
            </div>
            <!-- /.col-xl-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Info card </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="card-footer"> Card Footer </div>
                </div>
            </div>
            <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card card-warning">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Warning card </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="card-footer"> Card Footer </div>
                </div>
            </div>
            <!-- /.col-xl-4 -->
            <div class="col-xl-4">
                <div class="card card-danger">
                    <div class="card-header">
                        <div class="header-block">
                            <p class="title"> Danger card </p>
                        </div>
                    </div>
                    <div class="card-block">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue.</p>
                    </div>
                    <div class="card-footer"> Card Footer </div>
                </div>
            </div>
            <!-- /.col-xl-4 -->
        </div>
        <!-- /.row -->
    </section>
    <section class="section">
        <div class="row sameheight-container">
            <div class="col-xl-6">
                <div class="card sameheight-item" style="height: 450px;">
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
                                <h4>Home Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <h4>Profile Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <h4>Messages Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <h4>Settings Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-block -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-xl-6 -->
            <div class="col-xl-6">
                <div class="card sameheight-item" style="height: 450px;">
                    <div class="card-block">
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
                                <h4>Home Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="profile-pills">
                                <h4>Profile Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="messages-pills">
                                <h4>Messages Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="tab-pane fade" id="settings-pills">
                                <h4>Settings Tab</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-block -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-xl-6 -->
        </div>
    </section>
</article>
@endsection
