<ul class="nav-profile">
    {{--
    <li class="notifications new">
        <a href="" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <sup>
                        <span class="counter">8</span>
                    </sup>
                </a>
        <div class="dropdown-menu notifications-dropdown-menu">
            <ul class="notifications-container">
                <li>
                    <a href="" class="notification-item">
                        <div class="img-col">
                            <div class="img" style="background-image: url('assets/faces/3.jpg')"></div>
                        </div>
                        <div class="body-col">
                            <p>
                                <span class="accent">Zack Alien</span> pushed new commit:
                                <span class="accent">Fix page load performance issue</span>. </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="notification-item">
                        <div class="img-col">
                            <div class="img" style="background-image: url('assets/faces/5.jpg')"></div>
                        </div>
                        <div class="body-col">
                            <p>
                                <span class="accent">Amaya Hatsumi</span> started new task:
                                <span class="accent">Dashboard UI design.</span>. </p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="" class="notification-item">
                        <div class="img-col">
                            <div class="img" style="background-image: url('assets/faces/8.jpg')"></div>
                        </div>
                        <div class="body-col">
                            <p>
                                <span class="accent">Andy Nouman</span> deployed new version of
                                <span class="accent">NodeJS REST Api V3</span>
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
            <footer>
                <ul>
                    <li>
                        <a href=""> View All </a>
                    </li>
                </ul>
            </footer>
        </div>
    </li> --}}
    <li class="profile dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="img" style="background-image: url({{ asset(Auth::user()->foto) }})"> </div>
            <span class="name"> {{ Auth::user()->nombre }} </span>
        </a>
        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
            <a class="dropdown-item" href="#">
                        <i class="fa fa-user icon"></i> Perfil </a>
            {{-- <a class="dropdown-item" href="#">
                        <i class="fa fa-bell icon"></i> Notifications </a>
            <a class="dropdown-item" href="#">
                        <i class="fa fa-gear icon"></i> Settings </a> --}}
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout')}}">
                <i class="fa fa-power-off icon"></i> Cerrar sesión </a>
        </div>
    </li>
</ul>