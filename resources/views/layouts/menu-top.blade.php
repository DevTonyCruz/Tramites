
<header class="header">
    <nav class="navbar fixed-top">
        <!-- Begin Topbar -->
        <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
            <!-- Begin Logo -->
            <div class="navbar-header">
                <a href="db-default.html" class="navbar-brand">
                    <div class="brand-image brand-big">
                        <img src="assets/img/logo-big.png" alt="logo" class="logo-big">
                    </div>
                    <div class="brand-image brand-small">
                        <img src="assets/img/logo.png" alt="logo" class="logo-small">
                    </div>
                </a>
                <!-- Toggle Button -->
                <a id="toggle-btn" href="#" class="menu-btn active">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
                <!-- End Toggle -->
            </div>
            <!-- End Logo -->
            <!-- Begin Navbar Menu -->
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                <!-- User -->
                <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle"></a>
                    <ul aria-labelledby="user" class="user-size dropdown-menu">
                        <li class="welcome">
                            <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                            <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                        </li>
                        <li>
                            <a href="pages-profile.html" class="dropdown-item">
                                Profile
                            </a>
                        </li>
                        <li>
                            <a href="app-mail.html" class="dropdown-item">
                                Messages
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dropdown-item no-padding-bottom">
                                Settings
                            </a>
                        </li>
                        <li class="separator"></li>
                        <li>
                            <a href="pages-faq.html" class="dropdown-item no-padding-top">
                                Faq
                            </a>
                        </li>
                        <li><a rel="nofollow" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" class="dropdown-item logout text-center">
                                            <i class="ti-power-off"></i></a
                                            ></li>
                    </ul>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                <!-- End User -->
            </ul>
            <!-- End Navbar Menu -->
        </div>
        <!-- End Topbar -->
    </nav>
</header>
