<!-- Topbar Start -->
<div class="navbar-custom topnav-navbar">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="#" class="topnav-logo">
            <span class="topnav-logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="16">
            </span>
            <span class="topnav-logo-sm">
                <img src="assets/images/logo_sm_dark.png" alt="" height="16">
            </span>
        </a>

        <ul class="list-unstyled topbar-menu float-end mb-0">

            <li class="dropdown notification-list d-xl-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..."
                            aria-label="Recipient's username">
                    </form>
                </div>
            </li>
            <li class="dropdown notification-list d-none d-sm-inline-block">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                    aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-view-apps noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/slack.png" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/github.png" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                    <span>G Suite</span>
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
