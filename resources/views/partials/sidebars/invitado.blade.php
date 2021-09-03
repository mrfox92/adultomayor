<!-- Start Sidemenu Area -->
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img class="rounded-circle" width="70" height="70" src="{{ asset('img/municipalidad.jpg') }}" alt="image">
            <span>INVITADO</span>
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>

            <li class="nav-item-title">
                OFICINA ADULTO MAYOR
            </li>

            {{-- Adulto mayor --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-carousel'></i></span>
                    <span class="menu-title">Adulto mayor</span>
                    <span class="badge">1</span>
                </a>
            </li>

            {{-- Oficina discapacidad --}}

            <li class="nav-item-title">
                OFICINA DISCAPACIDAD
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-carousel'></i></span>
                    <span class="menu-title">PSD</span>
                    <span class="badge">1</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->