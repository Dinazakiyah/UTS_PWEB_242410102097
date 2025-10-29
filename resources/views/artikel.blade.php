@extends('layouts.app')

@section('title', '{{ $artikel["judul"] }} - Portal Berita')

@section('content')
<div class="artikel-wrapper">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <article class="artikel-content">

                    <header class="artikel-header">
                        <div class="artikel-category">
                            <span class="badge bg-{{ $artikel['kategori'] == 'Teknologi' ? 'primary' : ($artikel['kategori'] == 'Olahraga' ? 'success' : ($artikel['kategori'] == 'Ekonomi' ? 'warning' : ($artikel['kategori'] == 'Politik' ? 'danger' : ($artikel['kategori'] == 'Hiburan' ? 'info' : 'secondary')))) }}">
                                {{ $artikel['kategori'] }}
                            </span>
                        </div>
                        <h1 class="artikel-title">{{ $artikel['judul'] }}</h1>
                        <div class="artikel-meta">
                            <div class="meta-item">
                                <i class="bi bi-person"></i>
                                <span>{{ $artikel['penulis'] }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="bi bi-calendar-event"></i>
                                <span>{{ $artikel['tanggal'] }}</span>
                            </div>
                        </div>
                    </header>


                    <div class="artikel-image">
                        <img src="{{ $artikel['gambar'] }}" alt="{{ $artikel['judul'] }}" class="img-fluid rounded">
                    </div>


                    <div class="artikel-body">
                        @php
                            $paragraphs = explode("\n\n", trim($artikel['isi']));
                        @endphp

                        @foreach($paragraphs as $paragraph)
                            @if(trim($paragraph))
                                <p class="artikel-paragraph">{{ trim($paragraph) }}</p>
                            @endif
                        @endforeach
                    </div>


                    <footer class="artikel-footer">
                        <div class="artikel-actions">
                            <a href="{{ route('berita') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali ke Berita
                            </a>
                            <div class="share-buttons">
                                <span class="share-label">Bagikan:</span>
                                <button class="btn btn-outline-secondary btn-sm" onclick="shareArticle()">
                                    <i class="bi bi-share"></i>
                                </button>
                            </div>
                        </div>


                        <div class="reading-progress">
                            <div class="progress-bar">
                                <div class="progress-fill" id="progressFill"></div>
                            </div>
                            <span class="progress-text" id="progressText">0%</span>
                        </div>
                    </footer>
                </article>


                <div class="related-articles">
                    <h3 class="related-title">
                        <i class="bi bi-lightbulb me-2"></i>Artikel Terkait
                    </h3>
                    <div class="related-grid">
                        @php
                            $relatedArticles = [
                                ['id' => 1, 'judul' => 'AI di Indonesia', 'kategori' => 'Teknologi'],
                                ['id' => 2, 'judul' => 'Timnas Indonesia', 'kategori' => 'Olahraga'],
                                ['id' => 3, 'judul' => 'Ekonomi Digital', 'kategori' => 'Ekonomi']
                            ];
                        @endphp

                        @foreach($relatedArticles as $related)
                            @if($related['id'] != $artikel['id'])
                            <div class="related-item">
                                <div class="related-category">
                                    <span class="badge bg-secondary">{{ $related['kategori'] }}</span>
                                </div>
                                <h6 class="related-title-item">
                                    <a href="{{ route('artikel', $related['id']) }}" class="text-decoration-none">
                                        {{ $related['judul'] }}
                                    </a>
                                </h6>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {

    const artikelContent = document.querySelector('.artikel-body');
    const progressFill = document.getElementById('progressFill');
    const progressText = document.getElementById('progressText');

    function updateReadingProgress() {
        const scrollTop = window.pageYOffset;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const scrollPercent = (scrollTop / docHeight) * 100;

        if (progressFill && progressText) {
            progressFill.style.width = scrollPercent + '%';
            progressText.textContent = Math.round(scrollPercent) + '%';
        }
    }

    window.addEventListener('scroll', updateReadingProgress);
    updateReadingProgress();


    let readTimer = setTimeout(function() {
        console.log('Article marked as read');
    }, 30000);
});

function shareArticle() {
    if (navigator.share) {
        navigator.share({
            title: '{{ $artikel["judul"] }}',
            text: 'Baca artikel menarik di Portal Berita Indonesia',
            url: window.location.href
        });
    } else {

        navigator.clipboard.writeText(window.location.href).then(function() {
            alert('Link artikel berhasil disalin!');
        });
    }
}
</script>

<style>
    .artikel-wrapper {
        min-height: 100vh;
        background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
        padding-top: 2rem;
        padding-bottom: 4rem;
    }

    .artikel-content {
        background: white;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .artikel-header {
        padding: 2rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .artikel-category {
        margin-bottom: 1rem;
    }

    .artikel-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1f2937;
        line-height: 1.2;
        margin-bottom: 1.5rem;
    }

    .artikel-meta {
        display: flex;
        gap: 2rem;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .artikel-image {
        padding: 0 2rem;
        margin-bottom: 2rem;
    }

    .artikel-image img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 12px;
    }

    .artikel-body {
        padding: 0 2rem 2rem;
    }

    .artikel-paragraph {
        font-size: 1.125rem;
        line-height: 1.8;
        color: #374151;
        margin-bottom: 1.5rem;
        text-align: justify;
    }

    .artikel-footer {
        padding: 2rem;
        border-top: 1px solid #e5e7eb;
        background: #f9fafb;
    }

    .artikel-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .share-buttons {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .share-label {
        font-size: 0.875rem;
        color: #6b7280;
        font-weight: 500;
    }

    .reading-progress {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .progress-bar {
        flex-grow: 1;
        height: 8px;
        background: #e5e7eb;
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #3b82f6, #1d4ed8);
        width: 0%;
        transition: width 0.3s ease;
    }

    .progress-text {
        font-size: 0.875rem;
        font-weight: 600;
        color: #3b82f6;
        min-width: 3rem;
        text-align: right;
    }

    .related-articles {
        margin-top: 3rem;
        background: white;
        border-radius: 16px;
        padding: 2rem;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .related-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 1.5rem;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .related-item {
        padding: 1.5rem;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .related-item:hover {
        border-color: #3b82f6;
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
    }

    .related-category {
        margin-bottom: 0.75rem;
    }

    .related-title-item {
        font-size: 1rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0;
    }

    .related-title-item a {
        color: inherit;
        text-decoration: none;
    }

    .related-title-item a:hover {
        color: #3b82f6;
    }

    @media (max-width: 768px) {
        .artikel-wrapper {
            padding-top: 1rem;
            padding-bottom: 2rem;
        }

        .artikel-header {
            padding: 1.5rem;
        }

        .artikel-title {
            font-size: 1.5rem;
        }

        .artikel-meta {
            flex-direction: column;
            gap: 0.75rem;
        }

        .artikel-image {
            padding: 0 1.5rem;
        }

        .artikel-body {
            padding: 0 1.5rem 1.5rem;
        }

        .artikel-footer {
            padding: 1.5rem;
        }

        .artikel-actions {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .related-articles {
            padding: 1.5rem;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

