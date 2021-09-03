<!-- Start Sidemenu Area -->
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            {{-- <img src="{{ asset('img/small-logo.png') }}" alt="image"> --}}
            <img class="rounded-circle" width="70" height="70" src="{{ asset('img/municipalidad.jpg') }}" alt="image">
            {{-- <span>Fiva</span> --}}
            <span>AM-PSD</span>
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
                Gestión usuarios
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-user'></i></span>
                    <span class="menu-title">Usuarios</span>
                    <span class="badge">1</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <li class="nav-item">
                        <a href="{{ route('usuarios.index') }}" class="nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-data'></i></span>
                            <span class="menu-title">Registro usuarios</span>
                        </a>
                    </li>

                </ul>
            </li>

            {{-- <li class="nav-item mm-active"> --}}

            <li class="nav-item-title">
                OFICINA ADULTO MAYOR
            </li>

            {{-- Adulto mayor --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-data'></i></span>
                    <span class="menu-title">Adultos Mayores</span>
                    <span class="badge">5</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <li class="nav-item">
                        <a href="{{ route('adultosmayores.index') }}" class="nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-box'></i></span>
                            <span class="menu-title">Ingresar Adulto Mayor</span>
                        </a>
                    </li>

                    <li class="nav-item{{ ( request()->is('nucleofamiliar') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('nucleofamiliar.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-user-detail'></i></span>
                            <span class="menu-title">Nucleos familiares</span>
                        </a>
                    </li>

                    <li class="nav-item{{ ( request()->is('ingresos') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('ingresos.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-dollar-circle'></i></span>
                            <span class="menu-title">Ingresos</span>
                        </a>
                    </li>

                    <li class="nav-item{{ ( request()->is('redes') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('redes.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-sitemap'></i></span>
                            <span class="menu-title">Redes</span>
                        </a>
                    </li>

                    <li class="nav-item{{ ( request()->is('tipoviviendas') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('tipoviviendas.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-home-heart'></i></span>
                            <span class="menu-title">Tipo vivienda</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Generales --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-badge'></i></span>
                    <span class="menu-title">Generales</span>
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('nacionalidad') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('nacionalidad.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-globe'></i></span>
                            <span class="menu-title">Nacionalidades</span>
                        </a>
                    </li>

                    <li class="nav-item{{ ( request()->is('etnia') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('etnia.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-badge-check'></i></span>
                            <span class="menu-title">Etnias</span>
                        </a>
                    </li>
                </ul>
            </li>


            {{-- Talleres --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-carousel'></i></span>
                    <span class="menu-title">Talleres</span>
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('tipotalleres') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('tipotalleres.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-task'></i></span>
                            <span class="menu-title">Tipo Taller</span>
                        </a>
                    </li>

                    <li class="nav-item{{ ( request()->is('talleres') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('talleres.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-select-multiple'></i></span>
                            <span class="menu-title">Talleres</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Salud --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-clinic'></i></span>
                    <span class="menu-title">Salud</span>
                    <span class="badge">1</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <li class="nav-item{{ ( request()->is('institucionsalud') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('institucionsalud.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-home-heart'></i></span>
                            <span class="menu-title">Institución salud</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Educacion --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-glasses'></i></span>
                    <span class="menu-title">Educación</span>
                    <span class="badge">1</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('alfabetizacion') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('alfabetizacion.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-book-bookmark'></i></span>
                            <span class="menu-title">Alfabetización</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Discapacidades --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-accessibility'></i></span>
                    <span class="menu-title">Discapacidades</span>
                    <span class="badge">1</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('tipodiscapacidades') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('tipodiscapacidades.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-tag'></i></span>
                            <span class="menu-title">Tipo Discapacidad</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Actividades --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-flag-checkered'></i></span>
                    <span class="menu-title">Actividades</span>
                    <span class="badge">1</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('actividades') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('actividades.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-collection'></i></span>
                            <span class="menu-title">Actividades</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- programas --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-calendar'></i></span>
                    <span class="menu-title">Programas</span>
                    <span class="badge">1</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('progrmas') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('programas.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-collection'></i></span>
                            <span class="menu-title">Programas</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Servicios --}}

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-cabinet'></i></span>
                    <span class="menu-title">Servicios</span>
                    <span class="badge">4</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('ayudastecnicas') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('ayudastecnicas.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-folder-plus'></i></span>
                            <span class="menu-title">Ayudas Técnicas</span>
                        </a>
                    </li>
                </ul>
                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('atenciones') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('atenciones.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-contact'></i></span>
                            <span class="menu-title">Atenciones</span>
                        </a>
                    </li>
                </ul>
                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('serviciosbasicos') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('serviciosbasicos.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-archive'></i></span>
                            <span class="menu-title">Servicios Básicos</span>
                        </a>
                    </li>
                </ul>
                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('trabajosbano') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('trabajosbano.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-wrench'></i></span>
                            <span class="menu-title">Trabajos Baño</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item-title">
                OFICINA DISCAPACIDAD
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bxs-data'></i></span>
                    <span class="menu-title">PSD</span>
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">

                    <li class="nav-item">
                        <a href="{{ route('psd.index') }}" class="nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-box'></i></span>
                            <span class="menu-title">Registro PSD</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('beneficios.index') }}" class="nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-box'></i></span>
                            <span class="menu-title">Beneficios Estatales</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->