<nav class="app-header navbar navbar-expand text-light custom-gradient-navbar">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list text-light"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block"><a href="/" class="nav-link text-light">Home</a></li>
            <li class="nav-item d-none d-md-block"><a href="#" class="nav-link text-light">Contact Us</a></li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-chat-text"></i>
                    <span class="navbar-badge badge text-bg-danger">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <a href="#" class="dropdown-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('/') }}adminlte/dist/assets/img/user1-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3" />
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Mr. Lim
                                    <span class="float-end fs-7 text-danger"><i class="bi bi-star-fill"></i></span>
                                </h3>
                                <p class="fs-7">SIMRS Management</p>
                                <p class="fs-7 text-secondary">
                                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('/') }}adminlte/dist/assets/img/user8-128x128.jpg"
                                    alt="User Avatar" class="img-size-50 rounded-circle me-3" />
                            </div>
                            <div class="flex-grow-1">
                                <h3 class="dropdown-item-title">
                                    Test User
                                    <span class="float-end fs-7 text-secondary">
                                        <i class="bi bi-star-fill"></i>
                                    </span>
                                </h3>
                                <p class="fs-7">I got your message bro</p>
                                <p class="fs-7 text-secondary">
                                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                                </p>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell-fill"></i>
                    <span class="navbar-badge badge text-bg-warning">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="bi bi-envelope me-2"></i> 4 new messages
                        <span class="float-end text-secondary fs-7">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="bi bi-people-fill me-2"></i> 8 friend requests
                        <span class="float-end text-secondary fs-7">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
                        <span class="float-end text-secondary fs-7">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="{{ Auth::user()->photo ?: asset('/images/user-icon.jpg') }}"
                        class="user-image rounded-circle shadow object-fit-cover" alt="User Image" width="40"
                        height="40">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-secondary">
                        <img src="{{ Auth::user()->photo ?: asset('/images/user-icon.jpg') }}"
                            class="rounded-circle object-fit-cover shadow" alt="User Image" />
                        <p>
                            {{ Auth::user()->name }}
                            <small>Bergabung sejak {{ Auth::user()->created_at->format('Y-m-d') }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="/profile" class="btn btn-primary">Profile</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline float-end">
                            @csrf
                            <button type="submit" class="btn btn-danger">Log out</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<style>
    .navbar {
        border-bottom: none !important;
        box-shadow: none !important;
    }

    .custom-gradient-navbar {
        background: linear-gradient(to right, #0047b3, #00c3ff);
        color: white;
    }
</style>
