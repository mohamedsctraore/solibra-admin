<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="{{url('index')}}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-qualite-solibra.png') }}" alt="" height="60">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-qualite-solibra.png') }}" alt="" height="60">
            </span>
        </a>

        <a href="{{url('index')}}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('/assets/images/logo-qualite-solibra.png') }}" alt="" height="60">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('/assets/images/logo-qualite-solibra.png') }}" alt="" height="60">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">TABLEAU DE BORD</li>

                <li>
                    <a href="{{url('index')}}">
                        <i class="uil-home-alt"></i>
                        <span>Accueil</span>
                    </a>
                </li>

                <li class="menu-title">CAMPAGNES</li>

                <li>
                    <a href="{{route ('campagnes.index')}}" class="waves-effect">
                        <i class="uil-book-alt"></i>
                        <span>Nouvelle Campagne</span>
                    </a>
                </li>

                <li>
                    <a href="{{route ('clients.index')}}" class="waves-effect">
                        <i class="uil-store"></i>
                        <span>Clients</span>
                    </a>
                </li>

                <li>
                    <a href="{{route ('categories.index')}}" class="waves-effect">
                        <i class="uil-calender"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li>
                    <a href="{{route ('stats.index')}}" class="waves-effect">
                        <i class="uil-chart"></i>
                        <span>Statistiques</span>
                    </a>
                </li>

                <li class="menu-title">Utilisateurs</li>

                <li>
                    <a href="{{route ('utilisateurs.index')}}" class="waves-effect">
                        <i class="uil-user-circle"></i>
                        <span>Nouveau</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->