@extends('layouts.app')

@section('title', 'Dashboard - Portal Berita')

@section('content')
<div class="dashboard-wrapper">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="welcome-banner">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h2 class="text-white mb-2">
                                Selamat datang, {{ $username }}!
                            </h2>
                            <p class="text-white-50 mb-0">
                                Temukan berita terkini dan terpercaya di Portal Berita Indonesia
                            </p>
                        </div>
                        <div class="d-none d-lg-block">
                            <i class="bi bi-newspaper welcome-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-primary">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">150+</h3>
                        <p class="stat-label">Total Berita</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-success">
                        <i class="bi bi-tags-fill"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">6</h3>
                        <p class="stat-label">Kategori</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-warning">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">1.2K</h3>
                        <p class="stat-label">Pembaca</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon bg-danger">
                        <i class="bi bi-pencil-square"></i>
                    </div>
                    <div class="stat-content">
                        <h3 class="stat-number">12</h3>
                        <p class="stat-label">Penulis</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="section-header mb-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h4 class="section-title">
                        <i class="bi bi-fire text-danger"></i> Berita Terpopuler Hari Ini
                    </h4>
                    <p class="section-subtitle">Berita yang paling banyak dibaca hari ini</p>
                </div>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn btn-outline-primary btn-sm">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <x-news-card :berita="[
                    'judul' => 'Teknologi AI Semakin Berkembang Pesat di Indonesia',
                    'kategori' => 'Teknologi',
                    'tanggal' => '2025-10-20',
                    'penulis' => 'Admin Portal',
                    'gambar' => 'https://jatismobile.com/wp-content/uploads/2023/01/futuristic-robot-artificial-intelligence-concept-1024x621.jpg'
                ]" />
            </div>

            <div class="col-lg-4 col-md-6">
                <x-news-card :berita="[
                    'judul' => 'Timnas Indonesia Raih Kemenangan Gemilang',
                    'kategori' => 'Olahraga',
                    'tanggal' => '2025-10-19',
                    'penulis' => 'Redaksi Olahraga',
                    'gambar' => 'https://cdn1-production-images-kly.akamaized.net/4ZCvDNVwmF9OCTjhwcmnR05bnPE=/800x450/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/5378193/original/050455500_1760219906-TIMNAS_INDONESIA.jpg'
                ]" />
            </div>

            <div class="col-lg-4 col-md-6">
                <x-news-card :berita="[
                    'judul' => 'Ekonomi Indonesia Tumbuh 5.2 Persen di Kuartal III',
                    'kategori' => 'Ekonomi',
                    'tanggal' => '2025-10-18',
                    'penulis' => 'Tim Ekonomi',
                    'gambar' => 'https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/01/pertumbuhan-ekonomi-indonesia.jpg'
                ]" />
            </div>
        </div>

        <div class="section-header mb-4">
            <h4 class="section-title">
                <i class="bi bi-lightning-charge-fill text-warning"></i> Aksi Cepat
            </h4>
            <p class="section-subtitle">Akses fitur penting dengan cepat</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-6">
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="quick-action-card">
                    <div class="quick-action-icon bg-primary">
                        <i class="bi bi-card-list"></i>
                    </div>
                    <div class="quick-action-content">
                        <h5 class="quick-action-title">Kelola Berita</h5>
                        <p class="quick-action-desc">Lihat dan kelola semua berita yang tersedia</p>
                    </div>
                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>
            </div>

            <div class="col-lg-6">
                <a href="{{ route('profile', ['username' => $username]) }}" class="quick-action-card">
                    <div class="quick-action-icon bg-success">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="quick-action-content">
                        <h5 class="quick-action-title">Profil Saya</h5>
                        <p class="quick-action-desc">Lihat dan edit informasi profil Anda</p>
                    </div>
                    <i class="bi bi-chevron-right quick-action-arrow"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-css')
<style>
    .dashboard-wrapper {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        min-height: calc(100vh - 56px);
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        padding: 2.5rem;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(30, 58, 138, 0.3);
    }

    .welcome-icon {
        font-size: 5rem;
        color: rgba(255, 255, 255, 0.2);
    }

    /* Stat Cards */
    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1.25rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        flex-shrink: 0;
    }

    .stat-icon.bg-primary {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    }

    .stat-icon.bg-success {
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
    }

    .stat-icon.bg-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);
    }

    .stat-icon.bg-danger {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
    }

    .stat-content {
        flex-grow: 1;
    }

    .stat-number {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .stat-label {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0;
        font-weight: 500;
    }

    /* Section Header */
    .section-header {
        margin-top: 1rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .section-subtitle {
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 0;
    }


    .quick-action-card {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        background: white;
        padding: 1.75rem;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 1px solid #e5e7eb;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .quick-action-card:hover {
        transform: translateX(8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        border-color: #3b82f6;
    }

    .quick-action-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: white;
        flex-shrink: 0;
    }

    .quick-action-icon.bg-primary {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    }

    .quick-action-icon.bg-success {
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
    }

    .quick-action-content {
        flex-grow: 1;
    }

    .quick-action-title {
        font-size: 1.125rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .quick-action-desc {
        font-size: 0.875rem;
        color: #6b7280;
        margin-bottom: 0;
    }

    .quick-action-arrow {
        font-size: 1.5rem;
        color: #9ca3af;
        transition: color 0.3s ease;
    }

    .quick-action-card:hover .quick-action-arrow {
        color: #3b82f6;
    }


    @media (max-width: 768px) {
        .welcome-banner {
            padding: 1.5rem;
        }

        .welcome-icon {
            display: none;
        }

        .stat-card {
            padding: 1.25rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 1.5rem;
        }

        .quick-action-card {
            padding: 1.25rem;
        }

        .quick-action-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }
    }
</style>
@endsection
