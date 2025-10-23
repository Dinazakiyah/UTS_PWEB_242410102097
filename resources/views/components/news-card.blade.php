<div class="news-card-wrapper">
    <div class="news-card">
        <div class="news-image-wrapper">
            <img src="{{ $berita['gambar'] }}" class="news-image" alt="{{ $berita['judul'] }}">
            <div class="news-overlay"></div>
        </div>

        <div class="news-body">
            <div class="news-meta">
                @if($berita['kategori'] == 'Teknologi')
                    <span class="news-badge badge-teknologi">
                        <i class="bi bi-cpu-fill"></i> {{ $berita['kategori'] }}
                    </span>
                @elseif($berita['kategori'] == 'Olahraga')
                    <span class="news-badge badge-olahraga">
                        <i class="bi bi-trophy-fill"></i> {{ $berita['kategori'] }}
                    </span>
                @elseif($berita['kategori'] == 'Ekonomi')
                    <span class="news-badge badge-ekonomi">
                        <i class="bi bi-currency-dollar"></i> {{ $berita['kategori'] }}
                    </span>
                @elseif($berita['kategori'] == 'Politik')
                    <span class="news-badge badge-politik">
                        <i class="bi bi-bank2"></i> {{ $berita['kategori'] }}
                    </span>
                @elseif($berita['kategori'] == 'Hiburan')
                    <span class="news-badge badge-hiburan">
                        <i class="bi bi-film"></i> {{ $berita['kategori'] }}
                    </span>
                @else
                    <span class="news-badge badge-pendidikan">
                        <i class="bi bi-book-fill"></i> {{ $berita['kategori'] }}
                    </span>
                @endif

                <span class="news-date">
                    <i class="bi bi-calendar3"></i> {{ date('d M Y', strtotime($berita['tanggal'])) }}
                </span>
            </div>

            <h5 class="news-title">{{ $berita['judul'] }}</h5>

            <div class="news-footer">
                <div class="news-author">
                    <i class="bi bi-person-fill"></i>
                    <span>{{ $berita['penulis'] }}</span>
                </div>
                <a href="#" class="news-btn">
                    Baca <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .news-card-wrapper {
        height: 100%;
    }

    .news-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #e5e7eb;
    }

    .news-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 28px rgba(30, 58, 138, 0.2);
    }

    .news-image-wrapper {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-image {
        transform: scale(1.1);
    }

    .news-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.3) 100%);
    }

    .news-body {
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .news-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 1rem;
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .news-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.35rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .badge-teknologi {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: white;
    }

    .badge-olahraga {
        background: linear-gradient(135deg, #065f46 0%, #10b981 100%);
        color: white;
    }

    .badge-ekonomi {
        background: linear-gradient(135deg, #d97706 0%, #f59e0b 100%);
        color: white;
    }

    .badge-politik {
        background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
        color: white;
    }

    .badge-hiburan {
        background: linear-gradient(135deg, #7c3aed 0%, #a78bfa 100%);
        color: white;
    }

    .badge-pendidikan {
        background: linear-gradient(135deg, #4b5563 0%, #6b7280 100%);
        color: white;
    }

    .news-date {
        font-size: 0.8rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.35rem;
    }

    .news-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 1rem;
        border-top: 1px solid #e5e7eb;
    }

    .news-author {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.85rem;
        color: #6b7280;
    }

    .news-author i {
        color: #9ca3af;
    }

    .news-btn {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .news-btn:hover {
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
        color: white;
    }

    @media (max-width: 768px) {
        .news-image-wrapper {
            height: 180px;
        }

        .news-title {
            font-size: 1rem;
        }
    }
</style>
