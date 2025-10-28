@extends('layouts.app')

@section('title', 'Profil - Portal Berita')

@section('content')
<div class="profile-wrapper">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="avatar-wrapper">
                            <div class="avatar-circle">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="status-badge">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                        </div>
                        <h4 class="profile-name">{{ Auth::user()->name }}</h4>
                        <p class="profile-role">
                            <i class="bi bi-shield-check"></i> Administrator
                        </p>
                    </div>


                    <div class="profile-stats">
                        <div class="stat-item">
                            <div class="stat-value">24</div>
                            <div class="stat-label">Artikel</div>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <div class="stat-value">1.2K</div>
                            <div class="stat-label">Views</div>
                        </div>
                        <div class="stat-divider"></div>
                        <div class="stat-item">
                            <div class="stat-value">89</div>
                            <div class="stat-label">Likes</div>
                        </div>
                    </div>


                    <div class="profile-actions">
                        <button class="btn btn-primary-custom">
                            <i class="bi bi-pencil-fill"></i> Edit Profil
                        </button>
                        <a href="{{ route('logout') }}" class="btn btn-logout-custom">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a>
                    </div>
                </div>


                <div class="social-card">
                    <h6 class="social-title">
                        <i class="bi bi-share-fill"></i> Media Sosial
                    </h6>
                    <div class="social-links">
                        <a href="#" class="social-link facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-link twitter">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="social-link instagram">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-link linkedin">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="content-card welcome-card">
                    <div class="card-icon">
                        <i class="bi bi-person-badge-fill"></i>
                    </div>
                    <div class="card-content">
                        <h5 class="card-title">Selamat datang, {{ Auth::user()->name }}!</h5>
                        <p class="card-text">
                            Anda telah login sebagai administrator Portal Berita Indonesia.
                            Kelola berita, pantau statistik, dan berikan informasi terbaik untuk pembaca.
                        </p>
                    </div>
                </div>


                <div class="content-card info-card">
                    <div class="info-header">
                        <h5 class="info-title">
                            <i class="bi bi-info-circle-fill"></i> Informasi Pribadi
                        </h5>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Username</div>
                            <div class="info-value">{{ Auth::user()->name }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ Auth::user()->email }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Role</div>
                            <div class="info-value">
                                <span class="badge bg-primary">Administrator</span>
                            </div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Bergabung Sejak</div>
                            <div class="info-value">21 Oktober 2025</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Telepon</div>
                            <div class="info-value">+62 812-3456-7890</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label">Lokasi</div>
                            <div class="info-value">
                                <i class="bi bi-geo-alt-fill text-danger"></i> Jember, Jawa Timur
                            </div>
                        </div>
                    </div>
                </div>


                <div class="content-card activity-card">
                    <div class="activity-header">
                        <h5 class="activity-title">
                            <i class="bi bi-clock-history"></i> Aktivitas Terkini
                        </h5>
                    </div>
                    <div class="activity-list">
                        <div class="activity-item">
                            <div class="activity-icon bg-primary">
                                <i class="bi bi-pencil-square"></i>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text">Membuat artikel baru</p>
                                <span class="activity-time">
                                    <i class="bi bi-clock"></i> 2 jam yang lalu
                                </span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-success">
                                <i class="bi bi-check-circle-fill"></i>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text">Mempublikasikan berita</p>
                                <span class="activity-time">
                                    <i class="bi bi-clock"></i> 5 jam yang lalu
                                </span>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon bg-warning">
                                <i class="bi bi-pencil-fill"></i>
                            </div>
                            <div class="activity-content">
                                <p class="activity-text">Mengupdate profil</p>
                                <span class="activity-time">
                                    <i class="bi bi-clock"></i> 1 hari yang lalu
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-css')
<style>
    .profile-wrapper {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        min-height: calc(100vh - 56px);
    }


    .profile-card {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
        margin-bottom: 1.5rem;
    }

    .profile-header {
        text-align: center;
        margin-bottom: 1.5rem;
    }

    .avatar-wrapper {
        position: relative;
        display: inline-block;
        margin-bottom: 1rem;
    }

    .avatar-circle {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        color: white;
        box-shadow: 0 8px 20px rgba(30, 58, 138, 0.3);
    }

    .status-badge {
        position: absolute;
        bottom: 5px;
        right: 5px;
        width: 32px;
        height: 32px;
        background: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .status-badge i {
        color: #10b981;
        font-size: 1.25rem;
    }

    .profile-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .profile-role {
        color: #6b7280;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        margin-bottom: 0;
    }

    .profile-role i {
        color: #10b981;
    }


    .profile-stats {
        display: flex;
        align-items: center;
        justify-content: space-around;
        padding: 1.5rem 0;
        margin-bottom: 1.5rem;
        border-top: 1px solid #e5e7eb;
        border-bottom: 1px solid #e5e7eb;
    }

    .stat-item {
        text-align: center;
    }

    .stat-value {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.85rem;
        color: #6b7280;
    }

    .stat-divider {
        width: 1px;
        height: 40px;
        background: #e5e7eb;
    }


    .profile-actions {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: white;
        border: none;
        padding: 0.875rem;
        border-radius: 10px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(30, 58, 138, 0.2);
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
    }

    .btn-logout-custom {
        background: white;
        color: #dc2626;
        border: 2px solid #fee2e2;
        padding: 0.875rem;
        border-radius: 10px;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .btn-logout-custom:hover {
        background: #fee2e2;
        border-color: #dc2626;
        color: #dc2626;
    }


    .social-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
    }

    .social-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .social-links {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
    }

    .social-link {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
        transition: all 0.3s ease;
        text-decoration: none;
    }

    .social-link.facebook {
        background: #1877f2;
    }

    .social-link.twitter {
        background: #1da1f2;
    }

    .social-link.instagram {
        background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
    }

    .social-link.linkedin {
        background: #0077b5;
    }

    .social-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }


    .content-card {
        background: white;
        border-radius: 16px;
        padding: 1.75rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
        margin-bottom: 1.5rem;
    }


    .welcome-card {
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
        border: 2px solid #bfdbfe;
        display: flex;
        gap: 1.25rem;
        align-items: start;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
    }

    .card-icon i {
        font-size: 1.75rem;
        color: white;
    }

    .card-content {
        flex-grow: 1;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 0.75rem;
    }

    .card-text {
        color: #1e3a8a;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 0;
    }


    .info-header {
        margin-bottom: 1.5rem;
    }

    .info-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0;
    }

    .info-title i {
        color: #3b82f6;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }

    .info-item {
        background: #f9fafb;
        padding: 1.25rem;
        border-radius: 12px;
        border-left: 3px solid #3b82f6;
    }

    .info-label {
        font-size: 0.85rem;
        color: #6b7280;
        font-weight: 500;
        margin-bottom: 0.5rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 1rem;
        color: #1f2937;
        font-weight: 600;
    }


    .activity-header {
        margin-bottom: 1.5rem;
    }

    .activity-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0;
    }

    .activity-title i {
        color: #3b82f6;
    }

    .activity-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .activity-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem;
        background: #f9fafb;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .activity-item:hover {
        background: white;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transform: translateX(5px);
    }

    .activity-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        flex-shrink: 0;
    }

    .activity-icon.bg-primary {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    }

    .activity-icon.bg-success {
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
    }

    .activity-icon.bg-warning {
        background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
    }

    .activity-content {
        flex-grow: 1;
    }

    .activity-text {
        font-size: 0.95rem;
        color: #1f2937;
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .activity-time {
        font-size: 0.8rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }


    @media (max-width: 991px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .welcome-card {
            flex-direction: column;
        }
    }

    @media (max-width: 768px) {
        .profile-card {
            padding: 1.5rem;
        }

        .avatar-circle {
            width: 100px;
            height: 100px;
            font-size: 3rem;
        }

        .profile-name {
            font-size: 1.25rem;
        }

        .stat-value {
            font-size: 1.25rem;
        }

        .content-card {
            padding: 1.25rem;
        }

        .card-icon {
            width: 50px;
            height: 50px;
        }

        .card-icon i {
            font-size: 1.5rem;
        }
    }
</style>
@endsection
