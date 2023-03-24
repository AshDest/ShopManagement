<!-- Topbar Start -->
@php
use App\Models\Caisse;
$montantcaisse = Caisse::where('user_id', Auth::user()->id)->first();
@endphp
<div class="navbar-custom topnav-navbar">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="/seller/vente" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="{{ asset('assets/images/logo-light1.png') }}" alt="" height="16">
            </span>
            <span class="topnav-logo-sm">
                <img src="{{ asset('assets/images/logo_sm_dark1.png') }}" alt="" height="16">
            </span>
        </a>
        <ul class="list-unstyled topbar-menu float-end mb-0">
            <li class="dropdown notification-list d-none d-sm-inline-block">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-view-apps noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="/seller/vente">
                                    <img src="{{ asset('assets/images/brands/bucketvente.png') }}" alt="vente">
                                    <span>Vente</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="/seller/listevente">
                                    <img src="{{ asset('assets/images/brands/list_vente.png') }}" alt="listevente">
                                    <span>Liste de vente</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('depenses') }}">
                                    <img src="{{ asset('assets/images/brands/depense.png') }}" alt="paiment">
                                    <span>Depense</span>
                                </a>
                            </div>
                        </div>
                        @if (Auth::user()->role=="Gerant")
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('home') }}">
                                    <img src="{{ asset('assets/images/brands/admin.png') }}" alt="admin">
                                    <span>Adminstration</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('paiements') }}">
                                    <img src="{{ asset('assets/images/brands/paiment.png') }}" alt="paiment">
                                    <span>Paiement</span>
                                </a>
                            </div>
                        </div>
                        @endif
                        <div class="row g-0" style="background-color: rgba(120, 80, 173, 0.192)">
                            <div class="col">
                                <a class="dropdown-icon-item" href="{{ route('paiements') }}">
                                    <img src="{{ asset('assets/images/brands/caisse.png') }}" alt="paiment">
                                    <span>Caisse: <strong style="color: yellowgreen">@if ($montantcaisse)
                                            @php
                                            echo number_format($montantcaisse->solde) . ' CDF';
                                            @endphp
                                            @else
                                            0
                                            @endif</strong></span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        @if (Auth::user()->avatar)
                        <img src="{{ asset('assets/images/avatar/' . Auth::user()->avatar . '') }}" alt="user-image"
                            class="rounded-circle">
                        @else
                        <img src="{{ asset('assets/images/avatar/avatar.jpg') }}" alt="user-image"
                            class="rounded-circle">
                        @endif
                    </span>
                    <span>
                        <span class="account-user-name">{{ Auth::user()->name }}</span>
                        <span class="account-position">{{ Auth::user()->role }}</span>
                    </span>
                </a>
                <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                    <!-- item-->
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ Auth::user()->name }}</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>Mon compte</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-edit me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lifebuoy me-1"></i>
                        <span>Support</span>
                    </a>


                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Deconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>

        </ul>
        <a class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
    </div>
</div>
<!-- end Topbar -->
