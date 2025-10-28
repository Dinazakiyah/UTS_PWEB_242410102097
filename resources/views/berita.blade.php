@extends('layouts.app')

@section('title', 'Berita - Portal Berita')

@section('content')
<div class="berita-wrapper">
    <div class="container py-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white mb-2">
                            <i class="bi bi-newspaper me-2"></i>Berita Terkini
                        </h2>
                        <p class="text-white-50 mb-0">
                            Temukan berita terkini dan terpercaya dari Portal Berita Indonesia
                        </p>
                    </div>
                    <div class="d-none d-lg-block">
                        <i class="bi bi-newspaper welcome-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach($beritaList as $berita)
            <div class="col-lg-4 col-md-6">
                <div class="news-card {{ $berita['sudah_dibaca'] ? 'read' : '' }}">
                    <div class="news-image">
                        <img src="{{ $berita['gambar'] }}" alt="{{ $berita['judul'] }}" class="img-fluid">
                        @if($berita['sudah_dibaca'])
                        <div class="read-badge">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Sudah Dibaca</span>
                        </div>
                        @endif
                    </div>
                    <div class="news-content">
                        <div class="news-category">
                            <span class="badge bg-{{ $berita['kategori'] == 'Teknologi' ? 'primary' : ($berita['kategori'] == 'Olahraga' ? 'success' : ($berita['kategori'] == 'Ekonomi' ? 'warning' : ($berita['kategori'] == 'Politik' ? 'danger' : ($berita['kategori'] == 'Hiburan' ? 'info' : 'secondary')))) }}">
                                {{ $berita['kategori'] }}
                            </span>
                        </div>
                        <h5 class="news-title">
                            <a href="{{ route('artikel', $berita['id']) }}" class="text-decoration-none">
                                {{ $berita['judul'] }}
                            </a>
                        </h5>
                        <p class="news-excerpt">{{ $berita['isi'] }}</p>
                        <div class="news-meta">
                            <span class="news-date">
                                <i class="bi bi-calendar-event"></i>
                                {{ $berita['tanggal'] }}
                            </span>
                            <span class="news-author">
                                <i class="bi bi-person"></i>
                                {{ $berita['penulis'] }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Reading History Section -->
        @if(session('read_articles') && count(session('read_articles')) > 0)
        <div class="row mt-5">
            <div class="col-12">
                <div class="reading-history">
                    <h4 class="text-white mb-3">
                        <i class="bi bi-clock-history me-2"></i>Riwayat Membaca
                    </h4>
                    <div class="history-list">
                        @foreach(array_reverse(session('read_articles')) as $articleId)
                            @php
                                $article = collect($beritaList)->firstWhere('id', $articleId);
                            @endphp
                            @if($article)
                            <div class="history-item">
                                <div class="history-content">
                                    <h6 class="history-title">
                                        <a href="{{ route('artikel', $article['id']) }}" class="text-decoration-none">
                                            {{ $article['judul'] }}
                                        </a>
                                    </h6>
                                    <span class="history-date">{{ $article['tanggal'] }}</span>
                                </div>
                                <div class="history-category">
                                    <span class="badge bg-secondary">{{ $article['kategori'] }}</span>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

<style>
    .berita-wrapper {
        min-height: 100vh;
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        padding-top: 2rem;
        padding-bottom: 4rem;
    }

    .welcome-icon {
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.3);
    }

    .news-card {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        position: relative;
        border: 2px solid transparent;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.2);
    }

    .news-card.read {
        border-color: #10b981;
    }

    .news-card.read .news-image::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(16, 185, 129, 0.1);
        pointer-events: none;
    }

    .news-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-image img {
        transform: scale(1.05);
    }

    .read-badge {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #10b981;
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.375rem;
        box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
    }

    .news-content {
        padding: 1.5rem;
    }

    .news-category {
        margin-bottom: 0.75rem;
    }

    .news-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .news-title a {
        color: inherit;
        transition: color 0.3s ease;
    }

    .news-title a:hover {
        color: #3b82f6;
    }

    .news-excerpt {
        color: #6b7280;
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.75rem;
        color: #9ca3af;
    }

    .news-date,
    .news-author {
        display: flex;
        align-items: center;
        gap: 0.375rem;
    }

    .reading-history {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    }

    .history-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .history-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        background: #f9fafb;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }

    .history-item:hover {
        background: #f3f4f6;
        transform: translateX(8px);
    }

    .history-content {
        flex-grow: 1;
    }

    .history-title {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .history-title a {
        color: inherit;
        text-decoration: none;
    }

    .history-title a:hover {
        color: #3b82f6;
    }

    .history-date {
        font-size: 0.75rem;
        color: #9ca3af;
    }

    .history-category {
        flex-shrink: 0;
    }

    @media (max-width: 768px) {
        .berita-wrapper {
            padding-top: 1rem;
            padding-bottom: 2rem;
        }

        .news-card {
            margin-bottom: 1.5rem;
        }

        .news-content {
            padding: 1rem;
        }

        .news-meta {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .reading-history {
            padding: 1.5rem;
        }

        .history-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
        }
    }
</style>

