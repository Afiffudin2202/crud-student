<!-- sidebar -->
<div class="container-fluid navbar-expand-lg ">
    <div class="row">
        <nav id="sidebarMenu"
            class="sidebar offcanvas-lg offcanvas-start d-lg-block col-lg-2 col-md-3 col-sm-12 bg-body-tertiary "
            tabindex="-1">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Judul</h5>
                <button class="btn btn-close" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-label="Close">

                </button>
            </div>
            <div class="position-sticky pt-3 sidebar-sticky ">
                @auth
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == '' || request()->segment('1') == 'dashboard' ? 'active' : '' }} "
                                aria-current="page" href="{{ url('dashboard') }}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                <i class="fa-solid fa-house"></i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>DATA</span>
                    </h6>
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == 'students' ? 'active ' : '' }}"
                                href="{{ url('students') }}">
                                <span data-feather="grid" class="align-text-bottom"></span>
                                <i class="fa-solid fa-user"></i>
                                Student
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == 'subjects' ? 'active ' : '' }}"
                                href="{{ url('subjects') }}">
                                <span data-feather="grid" class="align-text-bottom"></span>
                                <i class="fa-solid fa-user"></i>
                                Subject
                            </a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->segment('1') == '' || request()->segment('1') == 'dashboard' ? 'active' : '' }} "
                                aria-current="page" href="{{ url('dashboard') }}">
                                <span data-feather="home" class="align-text-bottom"></span>
                                <i class="fa-solid fa-house"></i>
                                Dashboard
                            </a>
                        </li>
                    </ul>
                @endauth

                <ul class="navbar-nav flex-column login-dashboard ">
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>USER</span>
                    </h6>
                    @auth
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu border-0">
                                <li>
                                    <form action="{{ url('logout') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/login">
                                <span data-feather="home" class="align-text-bottom"></span>
                                <i class="fa-solid fa-right-to-bracket"></i>
                                Login
                            </a>
                        </li>
                    @endauth

                </ul>

            </div>
        </nav>
