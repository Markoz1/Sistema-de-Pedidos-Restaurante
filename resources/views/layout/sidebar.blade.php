<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header d-flex align-items-center" style="height: 70px;">
            <div class="brand">
                Nombre Restaurante
            </div>
        </div>
        <nav class="menu">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="{{ request()->routeIs('inicio')? 'active':'' }}">
                    <a href="{{ route('inicio') }}">
                        <i class="fa fa-home"></i> Inicio </a>
                </li>
                <li class="{{ request()->segment(1) == 'categorias'? 'active open':'' }}">
                    <a href="">
                        <i class="fa fa-cutlery"></i> Categorias
                        <i class="fa arrow"></i> 
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{ request()->routeIs('categorias.index')? 'active':'' }}">
                            <a href="{{ route('categorias.index') }}"> Listado </a>
                        </li>
                        <li class="{{ request()->routeIs('categorias.create')? 'active':'' }}">
                            <a href="{{ route('categorias.create') }}"> Nueva Categoria </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->segment(1) == 'productos'? 'active open':'' }}">
                    <a href="">
                        <i class="fa fa-cutlery"></i> Productos
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{ request()->routeIs('productos.index')? 'active':'' }}">
                            <a href="{{ route('productos.index') }}"> Listado </a>
                        </li>
                        <li class="{{ request()->routeIs('productos.create')? 'active':'' }}">
                            <a href="{{ route('productos.create') }}"> Nuevo Producto </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->segment(1) == 'clientes'? 'active open':'' }}">
                        <a href="">
                            <i class="fa fa-users"></i> Clientes
                            <i class="fa arrow"></i>
                        </a>
                        <ul class="sidebar-nav">
                            <li class="{{ request()->routeIs('clientes.index')? 'active':'' }}">
                                <a href="{{ route('clientes.index') }}"> Listado </a>
                            </li>
                            <li class="{{ request()->routeIs('clientes.create')? 'active':'' }}">
                                <a href="{{ route('clientes.create') }}"> Nuevo Cliente </a>
                            </li>
                        </ul>
                    </li>
                <li class="{{ request()->routeIs('pedidos.index')? 'active':'' }}">
                    <a href="{{ route('pedidos.index') }}"><i class="fa fa-shopping-cart"></i> Pedidos </a>
                </li>
                <li class="">
                    <a href="#"><i class="fa fa-user"></i> Usuarios </a>
                </li>
                <li class="{{ request()->segment(1) == 'mesas'? 'active open':'' }}">
                    <a href="{{ route('mesas.index') }}"><i class="fa fa-th-large"></i> Mesas </a>
                </li>
                <li class="">
                    <a href="#"><i class="fa fa-cog"></i> Configuración </a>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        {{-- <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-4"> </div>
                                <div class="col-4">
                                    <label class="title">fixed</label>
                                </div>
                                <div class="col-4">
                                    <label class="title">static</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Sidebar:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Header:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Footer:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="customize-item">
                            <ul class="customize-colors">
                                <li>
                                    <span class="color-item color-red" data-theme="red"></span>
                                </li>
                                <li>
                                    <span class="color-item color-orange" data-theme="orange"></span>
                                </li>
                                <li>
                                    <span class="color-item color-green active" data-theme=""></span>
                                </li>
                                <li>
                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                </li>
                                <li>
                                    <span class="color-item color-blue" data-theme="blue"></span>
                                </li>
                                <li>
                                    <span class="color-item color-purple" data-theme="purple"></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <a href="">
                    <i class="fa fa-cog"></i> Customize </a>
            </li>
        </ul> --}}
    </footer>
</aside>