<!-- Top Navbar Area -->
<nav class="navbar top-navbar navbar-expand">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
        
        <ul class="navbar-nav left-nav align-items-center">
            
        </ul>

        <div class="nav-search-form d-none ml-auto d-md-block">
            {{-- <label><i class='bx bx-search'></i></label>
            <input type="text" class="form-control" placeholder="Search here..."> --}}
        </div>

        <ul class="navbar-nav right-nav align-items-center">

            <li class="nav-item dropdown profile-nav-item">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="menu-profile">
                        <span class="name">Hola {{ auth()->user()->name }}</span>
                        <img src="{{ asset('img/user1.jpg') }}" class="rounded-circle" alt="image">
                    </div>
                </a>

                <div class="dropdown-menu">
                    <div class="dropdown-header d-flex flex-column align-items-center">
                        <div class="figure mb-3">
                            <img src="{{ asset('img/municipalidad.jpg') }}" class="rounded-circle" alt="image">
                        </div>

                        <div class="info text-center">
                            <span class="name">{{ auth()->user()->name }}</span>
                            <p class="mb-3 email">{{ auth()->user()->email }}</p>
                        </div>
                    </div>

                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class='bx bx-user'></i> <span>Perfil</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                {{-- <a href="#" class="nav-link">
                                    <i class='bx bx-exit'></i> <span>Cerrar Sesión</span>
                                </a> --}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class='bx bx-exit'></i> {{ __("Cerrar sesión") }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-footer">
                        <ul class="profile-nav">
                            <li class="nav-item">
                                {{-- @include('partials.logout_form') --}}
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- End Top Navbar Area -->