<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
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
        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <img src="{{ asset('assets/images/flags/us.jpg') }}" alt="user-image" class="me-0 me-sm-1"
                    height="12">
                <span class="align-middle d-none d-sm-inline-block">English</span> <i
                    class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span
                        class="align-middle">German</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span
                        class="align-middle">Italian</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span
                        class="align-middle">Spanish</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <img src="{{ asset('assets/images/flags/russia.jpg') }}" alt="user-image" class="me-1"
                        height="12"> <span class="align-middle">Russian</span>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-bell noti-icon"></i>
                <span class="noti-icon-badge"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title px-3">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="javascript: void(0);" class="text-dark">
                                <small>Clear All</small>
                            </a>
                        </span>Notification
                    </h5>
                </div>

                <div class="px-3" style="max-height: 300px;" data-simplebar>

                    <h5 class="text-muted font-13 fw-normal mt-0">Today</h5>
                    <!-- item-->
                    <a href="javascript:void(0);"
                        class="dropdown-item p-0 notify-item card unread-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp <small
                                            class="fw-normal text-muted ms-1">1 min ago</small></h5>
                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar
                                        commented on Admin</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon bg-info">
                                        <i class="mdi mdi-account-plus"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Admin <small
                                            class="fw-normal text-muted ms-1">1 hours ago</small></h5>
                                    <small class="noti-item-subtitle text-muted">New user
                                        registered</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <h5 class="text-muted font-13 fw-normal mt-0">Yesterday</h5>

                    <!-- item-->
                    <a href="javascript:void(0);"
                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon">
                                        <img src="{{ asset('assets/images/users/avatar-2.jpg') }}"
                                            class="img-fluid rounded-circle" alt="" />
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Cristina Pride
                                        <small class="fw-normal text-muted ms-1">1 day ago</small>
                                    </h5>
                                    <small class="noti-item-subtitle text-muted">Hi, How are you? What
                                        about our next meeting</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <h5 class="text-muted font-13 fw-normal mt-0">30 Dec 2021</h5>

                    <!-- item-->
                    <a href="javascript:void(0);"
                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon bg-primary">
                                        <i class="mdi mdi-comment-account-outline"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Datacorp</h5>
                                    <small class="noti-item-subtitle text-muted">Caleb Flakelar
                                        commented on Admin</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);"
                        class="dropdown-item p-0 notify-item card read-noti shadow-none mb-2">
                        <div class="card-body">
                            <span class="float-end noti-close-btn text-muted"><i class="mdi mdi-close"></i></span>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="notify-icon">
                                        <img src="{{ asset('assets/images/users/avatar-4.jpg') }}"
                                            class="img-fluid rounded-circle" alt="" />
                                    </div>
                                </div>
                                <div class="flex-grow-1 text-truncate ms-2">
                                    <h5 class="noti-item-title fw-semibold font-14">Karen Robinson</h5>
                                    <small class="noti-item-subtitle text-muted">Wow ! this admin looks
                                        good and awesome design</small>
                                </div>
                            </div>
                        </div>
                    </a>

                    <div class="text-center">
                        <i class="mdi mdi-dots-circle mdi-spin text-muted h3 mt-0"></i>
                    </div>
                </div>

                <!-- All-->
                <a href="javascript:void(0);"
                    class="dropdown-item text-center text-primary notify-item border-top border-light py-2">
                    View All
                </a>

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
                                <img src="{{ asset('assets/images/brands/slack.png') }}" alt="slack">
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
                    </div> <!-- end row-->
                </div>

            </div>
        </li>

        <li class="notification-list">
            <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                <i class="dripicons-gear noti-icon"></i>
            </a>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    @if (Auth::user()->avatar)
                    <img src="{{ asset('assets/images/avatar/'.Auth::user()->avatar.'') }}" alt="user-image"
                    class="rounded-circle">
                    @else
                    <img src="{{ asset('assets/images/avatar/avatar.jpg') }}" alt="user-image"
                    class="rounded-circle">
                    @endif
                </span>
                <span>
                    <span class="account-user-name">{{ Auth::user()->name }}</span>
                    <span class="account-position">{{Auth::user()->role}}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
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
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>

</div>
