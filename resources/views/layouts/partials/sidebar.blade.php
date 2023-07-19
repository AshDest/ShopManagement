<div class="leftside-menu">
    <!-- LOGO -->
    <a href="{{route('home')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-light1.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm_dark1.png') }}" alt="" height="16">
        </span>
    </a>
    <!-- LOGO -->
    <a href="{{route('home')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-light1.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm_dark1.png') }}" alt="" height="16">
        </span>
    </a>
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href="{{route('home')}}" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    {{-- <span class="badge bg-success float-end">4</span> --}}
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProduits" aria-expanded="false"
                    aria-controls="sidebarProduits" class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span> Produits </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProduits">
                    <ul class="side-nav-second-level">

                        <li>
                            <a href="{{ route('categorie') }}">Categorie Produit</a>
                        </li>
                        <li>
                            <a href="{{ route('produit') }}">Ajouter Produits</a>
                        </li>
                        <li>
                            <a href="{{ route('listProduits') }}">Liste Produits</a>
                        </li>
                        <li>
                            <a href="{{ route('mesures') }}">Mesures des Produits</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebaraprov" aria-expanded="false" aria-controls="sidebaraprov"
                    class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span> Aprovisionnement </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebaraprov">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('listapprovisionnement') }}">Approvisionnements</a>
                        </li>
                        <li>
                            <a href="{{ route('listconversion') }}">Conversion</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarParametre" aria-expanded="false"
                    aria-controls="sidebarParametre" class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span> Parametre </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarParametre">
                    <ul class="side-nav-second-level">

                        <li>
                            <a href="{{ route('shopinformations') }}">Parametre entreprise</a>
                        </li>
                        <li>
                            <a href="{{ route('compteuser') }}">Compte utilisateur</a>
                        </li>
                        <li>
                            <a href="{{ route('taux') }}">Taux de change</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarRapport" aria-expanded="false" aria-controls="sidebarRapport"
                    class="side-nav-link">
                    <i class="uil-chart"></i>
                    <span> Rapport </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarRapport">
                    <ul class="side-nav-second-level">

                        <li>
                            <a href="{{ route('synthetic') }}">Les rapport</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>

        <!-- Help Box -->

        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
