<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-newspaper"></i>
            <span class="brand-text">Portal Berita</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto ms-lg-4">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                           href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door-fill"></i> Dashboard
                        </a>
                    </li>
                    @if(Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin') ? 'active' : '' }}"
                           href="{{ route('admin') }}">
                            <i class="bi bi-card-list"></i> Admin Panel
                        </a>
                    </li>
                    @elseif(Auth::user()->role === 'journalist')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}"
                           href="{{ route('pengelolaan') }}">
                            <i class="bi bi-card-list"></i> Kelola Berita
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('berita') ? 'active' : '' }}"
                           href="{{ route('berita') }}">
                            <i class="bi bi-newspaper"></i> Berita
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-tags-fill"></i> Kategori
                        </a>
                        <ul class="dropdown-menu dropdown-menu-custom">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-cpu-fill text-primary"></i> Teknologi</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-trophy-fill text-success"></i> Olahraga</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-currency-dollar text-warning"></i> Ekonomi</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-bank2 text-danger"></i> Politik</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-film text-info"></i> Hiburan</a></li>
                            <li><a class="dropdown-item" href="#"><i class="bi bi-book-fill text-secondary"></i> Pendidikan</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <ul class="navbar-nav">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link nav-profile {{ request()->routeIs('profile') ? 'active' : '' }}"
                           href="{{ route('profile') }}">
                            <i class="bi bi-person-circle"></i>
                            <span class="username-text">{{ Auth::user()->name }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-logout" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<style>
    .navbar-custom {
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        box-shadow: 0 2px 15px rgba(30, 58, 138, 0.3);
        padding: 1rem 0;
    }

    .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
        color: white !important;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
    }

    .navbar-brand i {
        font-size: 1.75rem;
    }

    .brand-text {
        font-weight: 700;
        letter-spacing: 0.5px;
    }

    .navbar-custom .nav-link {
        color: rgba(255, 255, 255, 0.9) !important;
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .navbar-custom .nav-link:hover {
        background: rgba(255, 255, 255, 0.15);
        color: white !important;
        transform: translateY(-2px);
    }

    .navbar-custom .nav-link.active {
        background: rgba(255, 255, 255, 0.2);
        color: white !important;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .navbar-custom .nav-link i {
        font-size: 1.1rem;
    }

    .nav-profile {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .username-text {
        font-weight: 600;
    }

    .nav-logout {
        color: #fca5a5 !important;
    }

    .nav-logout:hover {
        background: rgba(220, 38, 38, 0.2) !important;
        color: #fee2e2 !important;
    }

    .dropdown-menu-custom {
        background: white;
        border: none;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        padding: 0.5rem;
        margin-top: 0.5rem;
    }

    .dropdown-menu-custom .dropdown-item {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #1f2937;
        font-weight: 500;
    }

    .dropdown-menu-custom .dropdown-item:hover {
        background: #f3f4f6;
        transform: translateX(5px);
    }

    .dropdown-menu-custom .dropdown-item i {
        font-size: 1.1rem;
    }

    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 1)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    @media (max-width: 991px) {
        .navbar-custom .navbar-collapse {
            background: rgba(30, 58, 138, 0.95);
            margin-top: 1rem;
            padding: 1rem;
            border-radius: 12px;
        }

        .navbar-custom .nav-link {
            margin-bottom: 0.5rem;
        }
    }
</style>
