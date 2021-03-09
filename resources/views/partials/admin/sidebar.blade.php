<!-- Start Sidemenu Area -->
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href="dashboard-analytics.html" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('img/small-logo.png') }}" alt="image">
            {{-- <span>Fiva</span> --}}
            <span>AM</span>
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
                PRINCIPAL
            </li>

            {{-- <li class="nav-item mm-active"> --}}
            <li class="nav-item">
                <a href="#" class="nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-archive-in'></i></span>
                    <span class="menu-title">Reportes</span>
                </a>
            </li>

            {{-- <li class="nav-item mm-active"> --}}

            <li class="nav-item-title">
                INTERNO
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
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('patologias') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('patologias.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-thermometer'></i></span>
                            <span class="menu-title">Patologías</span>
                        </a>
                    </li>

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
                    <span class="badge">2</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('tipodiscapacidades') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('tipodiscapacidades.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-tag'></i></span>
                            <span class="menu-title">Tipo Discapacidad</span>
                        </a>
                    </li>
                </ul>
                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item{{ ( request()->is('discapacidades') ) ? ' mm-active' : '' }}">
                        <a href="{{ route('discapacidades.index') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-list-check'></i></span>
                            <span class="menu-title">Discapacidad</span>
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

            <li class="nav-item">
                <a href="app-chat.html" class="nav-link">
                    <span class="icon"><i class='bx bx-message'></i></span>
                    <span class="menu-title">Chat</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="app-todo.html" class="nav-link">
                    <span class="icon"><i class='bx bx-badge-check'></i></span>
                    <span class="menu-title">Todo</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="app-calendar.html" class="nav-link">
                    <span class="icon"><i class='bx bx-calendar'></i></span>
                    <span class="menu-title">Calendar</span>
                </a>
            </li>

            <li class="nav-item-title">
                UI Elements
            </li>

            <li class="nav-item">
                <a href="grid.html" class="nav-link">
                    <span class="icon"><i class='bx bx-grid-alt'></i></span>
                    <span class="menu-title">Grid</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="colors.html" class="nav-link">
                    <span class="icon"><i class='bx bxs-color-fill'></i></span>
                    <span class="menu-title">Colors</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-brightness'></i></span>
                    <span class="menu-title">Icons</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="boxicons.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">BoxIcons</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="feathericons.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Feather Icons</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-card'></i></span>
                    <span class="menu-title">Card</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="basic-card.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Basic Card</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="colors-card.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Colors Card</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="statistics-card.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Statistics Card</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-chart'></i></span>
                    <span class="menu-title">Component</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="alerts.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Alert</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="badges.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Badge</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="borders.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Border</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="breadcrumb.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Breadcrumb</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="buttons.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Buttons</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="button-group.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Button Group</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="carousel.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Slider</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="collapse.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Collapse</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="display.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Display</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="dropdowns.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Dropdown</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="embed.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Embed</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="figures.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Figures</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="images.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Images</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="jumbotron.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Jumbotron</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="list-group.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">List Group</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="media-object.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Media Object</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="modal.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Modal</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="navs.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Navs</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="navbar.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Navbar</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="pagination.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Pagination</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="progress.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Progress</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="spinners.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Spinner</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="text.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Text</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="vertical-align.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Vertical Alignment</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="typography.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Typography</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="tooltips.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Tooltips</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="popovers.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Popovers</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item-title">
                Forms & Table
            </li>

            <li class="nav-item">
                <a href="forms.html" class="nav-link">
                    <span class="icon"><i class='bx bxs-layer'></i></span>
                    <span class="menu-title">Form Layout</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="input-group.html" class="nav-link">
                    <span class="icon"><i class='bx bx-file'></i></span>
                    <span class="menu-title">Form Input Group</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="tables.html" class="nav-link">
                    <span class="icon"><i class='bx bx-table'></i></span>
                    <span class="menu-title">Table</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="tables-dark.html" class="nav-link">
                    <span class="icon"><i class='bx bx-calendar'></i></span>
                    <span class="menu-title">Table Dark</span>
                </a>
            </li>

            <li class="nav-item-title">
                Pages
            </li>

            <li class="nav-item">
                <a href="profile.html" class="nav-link">
                    <span class="icon"><i class='bx bx-user-circle'></i></span>
                    <span class="menu-title">Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="faq.html" class="nav-link">
                    <span class="icon"><i class='bx bx-help-circle'></i></span>
                    <span class="menu-title">FAQ</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="invoice.html" class="nav-link">
                    <span class="icon"><i class='bx bx-receipt'></i></span>
                    <span class="menu-title">Invoice</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="gallery.html" class="nav-link">
                    <span class="icon"><i class='bx bx-images'></i></span>
                    <span class="menu-title">Gallery</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="timeline.html" class="nav-link">
                    <span class="icon"><i class='bx bx-align-justify'></i></span>
                    <span class="menu-title">Timeline</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="pricing.html" class="nav-link">
                    <span class="icon"><i class='bx bx-money'></i></span>
                    <span class="menu-title">Pricing</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="blank-page.html" class="nav-link">
                    <span class="icon"><i class='bx bx-file-blank'></i></span>
                    <span class="menu-title">Blank Page</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-lock-open'></i></span>
                    <span class="menu-title">Authentication</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="login.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-in'></i></span>
                            <span class="menu-title">Login v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="login-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-log-in'></i></span>
                            <span class="menu-title">Login v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="register.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-in-circle'></i></span>
                            <span class="menu-title">Register v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="register-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-log-in-circle'></i></span>
                            <span class="menu-title">Register v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="forgot-password.html" class="nav-link">
                            <span class="icon"><i class='bx bx-lock'></i></span>
                            <span class="menu-title">Forgot Password v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="forgot-password-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bx-lock-alt'></i></span>
                            <span class="menu-title">Forgot Password v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="reset-password.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-out'></i></span>
                            <span class="menu-title">Reset Password v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="reset-password-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-out-circle'></i></span>
                            <span class="menu-title">Reset Password v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="session-lock-screen.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-lock-open-alt'></i></span>
                            <span class="menu-title">Lock Screen v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="session-lock-screen-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-lock-open'></i></span>
                            <span class="menu-title">Lock Screen v2</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-share-alt'></i></span>
                    <span class="menu-title">Miscellaneous</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="not-authorized.html" class="nav-link">
                            <span class="icon"><i class='bx bx-traffic-cone'></i></span>
                            <span class="menu-title">Not Authorized v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="not-authorized-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-traffic-cone'></i></span>
                            <span class="menu-title">Not Authorized v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="maintenance.html" class="nav-link">
                            <span class="icon"><i class='bx bx-recycle'></i></span>
                            <span class="menu-title">Maintenance v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="maintenance-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bx-recycle bx-rotate-90'></i></span>
                            <span class="menu-title">Maintenance v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="coming-soon.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-up-arrow'></i></span>
                            <span class="menu-title">Coming Soon v1</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="coming-soon-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-right-arrow'></i></span>
                            <span class="menu-title">Coming Soon v2</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-share-alt'></i></span>
                            <span class="menu-title">Error</span>
                        </a>

                        <ul class="sidemenu-nav-third-level">
                            <li class="nav-item">
                                <a href="error-404.html" class="nav-link">
                                    <span class="icon"><i class='bx bx-error'></i></span>
                                    <span class="menu-title">404 v1</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="error-404-with-image.html" class="nav-link">
                                    <span class="icon"><i class='bx bxs-error'></i></span>
                                    <span class="menu-title">404 v2</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="error-500.html" class="nav-link">
                                    <span class="icon"><i class='bx bx-error-circle'></i></span>
                                    <span class="menu-title">500 v1</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="error-500-with-image.html" class="nav-link">
                                    <span class="icon"><i class='bx bxs-error-circle'></i></span>
                                    <span class="menu-title">500 v2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="nav-item-title">
                Charts & Maps
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-chart'></i></span>
                    <span class="menu-title">Charts</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="apex-charts.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Apex Charts</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="chartjs.html" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Chartjs</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="maps.html" class="nav-link">
                    <span class="icon"><i class='bx bx-world'></i></span>
                    <span class="menu-title">Maps</span>
                </a>
            </li>

            <li class="nav-item-title">
                Others
            </li>

            <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-menu'></i></span>
                    <span class="menu-title">Menu Levels</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">First Level</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                            <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                            <span class="menu-title">Second Level</span>
                        </a>

                        <ul class="sidemenu-nav-third-level">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                                    <span class="menu-title">Second Level 2.1</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                                    <span class="menu-title">Second Level 2.2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link disabled">
                    <span class="icon"><i class='bx bx-unlink'></i></span>
                    <span class="menu-title">Disable Menu</span>
                </a>
            </li>

            <li class="nav-item-title">
                Support
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="icon"><i class='bx bx-file'></i></span>
                    <span class="menu-title">Documentation</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="mailto:hello@envytheme.com" class="nav-link">
                    <span class="icon"><i class='bx bx-support'></i></span>
                    <span class="menu-title">Support</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->