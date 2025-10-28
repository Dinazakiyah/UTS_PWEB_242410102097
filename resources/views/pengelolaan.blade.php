@extends('layouts.app')

@section('title', 'Kelola Berita - Portal Berita')

@section('content')
<div class="pengelolaan-wrapper">
    <div class="container py-5">

        <div class="page-header">
            <div class="header-content">
                <div class="header-text">
                    <h2 class="header-title">
                        <i class="bi bi-card-list"></i> Kelola Berita
                    </h2>
                    <p class="header-subtitle">Selamat datang, {{ Auth::user()->name }}! Daftar semua berita yang tersedia di portal</p>
                </div>
                <div class="header-badge">
                    <span class="badge-count">{{ count($beritaList) }}</span>
                    <span class="badge-label">Total Berita</span>
                </div>
            </div>
        </div>

        <div class="filter-section">
            <div class="filter-card">
                <div class="filter-header">
                    <i class="bi bi-funnel-fill"></i>
                    <span>Filter Kategori</span>
                </div>
                <div class="filter-buttons">
                    <button class="filter-btn active">
                        <i class="bi bi-grid-fill"></i> Semua
                    </button>
                    <button class="filter-btn">
                        <i class="bi bi-cpu-fill"></i> Teknologi
                    </button>
                    <button class="filter-btn">
                        <i class="bi bi-trophy-fill"></i> Olahraga
                    </button>
                    <button class="filter-btn">
                        <i class="bi bi-currency-dollar"></i> Ekonomi
                    </button>
                    <button class="filter-btn">
                        <i class="bi bi-bank2"></i> Politik
                    </button>
                    <button class="filter-btn">
                        <i class="bi bi-film"></i> Hiburan
                    </button>
                    <button class="filter-btn">
                        <i class="bi bi-book-fill"></i> Pendidikan
                    </button>
                </div>
            </div>
        </div>

        <div class="table-section">
            <div class="table-card">
                <div class="table-header">
                    <h5 class="table-title">
                        <i class="bi bi-table"></i> Tampilan Tabel
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th width="60">No</th>
                                <th width="100">Gambar</th>
                                <th>Judul Berita</th>
                                <th width="150">Kategori</th>
                                <th width="130">Tanggal</th>
                                <th width="180">Penulis</th>
                                <th width="140" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($beritaList as $index => $berita)
                            <tr>
                                <td class="td-number">{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{ $berita['gambar'] }}"
                                         alt="{{ $berita['judul'] }}"
                                         class="table-image">
                                </td>
                                <td>
                                    <div class="table-title-text">{{ $berita['judul'] }}</div>
                                </td>
                                <td>
                                    @if($berita['kategori'] == 'Teknologi')
                                        <span class="table-badge badge-teknologi">
                                            <i class="bi bi-cpu-fill"></i> {{ $berita['kategori'] }}
                                        </span>
                                    @elseif($berita['kategori'] == 'Olahraga')
                                        <span class="table-badge badge-olahraga">
                                            <i class="bi bi-trophy-fill"></i> {{ $berita['kategori'] }}
                                        </span>
                                    @elseif($berita['kategori'] == 'Ekonomi')
                                        <span class="table-badge badge-ekonomi">
                                            <i class="bi bi-currency-dollar"></i> {{ $berita['kategori'] }}
                                        </span>
                                    @elseif($berita['kategori'] == 'Politik')
                                        <span class="table-badge badge-politik">
                                            <i class="bi bi-bank2"></i> {{ $berita['kategori'] }}
                                        </span>
                                    @elseif($berita['kategori'] == 'Hiburan')
                                        <span class="table-badge badge-hiburan">
                                            <i class="bi bi-film"></i> {{ $berita['kategori'] }}
                                        </span>
                                    @else
                                        <span class="table-badge badge-pendidikan">
                                            <i class="bi bi-book-fill"></i> {{ $berita['kategori'] }}
                                        </span>
                                    @endif
                                </td>
                                <td class="td-date">
                                    <i class="bi bi-calendar3"></i>
                                    {{ date('d/m/Y', strtotime($berita['tanggal'])) }}
                                </td>
                                <td class="td-author">
                                    <i class="bi bi-person-fill"></i> {{ $berita['penulis'] }}
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="action-btn btn-view" title="Lihat">
                                            <i class="bi bi-eye-fill"></i>
                                        </button>
                                        <button class="action-btn btn-edit" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </button>
                                        <button class="action-btn btn-delete" title="Hapus">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-view-section">
            <div class="section-header-custom">
                <h4 class="section-title-custom">
                    <i class="bi bi-grid-3x3-gap-fill"></i> Tampilan Card
                </h4>
                <p class="section-subtitle-custom">Visualisasi berita dalam bentuk card</p>
            </div>

            <div class="row g-4">
                @foreach($beritaList as $berita)
                <div class="col-lg-4 col-md-6">
                    <x-news-card :berita="$berita" />
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-css')
<style>
    .pengelolaan-wrapper {
        background: linear-gradient(135deg, #f5f7fa 0%, #e8eef5 100%);
        min-height: calc(100vh - 56px);
    }


    .page-header {
        background: white;
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
    }

    .header-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .header-title i {
        color: #3b82f6;
    }

    .header-subtitle {
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .header-badge {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        padding: 1rem 1.5rem;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
    }

    .badge-count {
        display: block;
        font-size: 1.75rem;
        font-weight: 700;
        color: white;
        line-height: 1;
    }

    .badge-label {
        display: block;
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.9);
        margin-top: 0.25rem;
    }


    .filter-section {
        margin-bottom: 1.5rem;
    }

    .filter-card {
        background: white;
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
    }

    .filter-header {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 1rem;
    }

    .filter-header i {
        color: #3b82f6;
        font-size: 1.1rem;
    }

    .filter-buttons {
        display: flex;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .filter-btn {
        background: #f9fafb;
        border: 2px solid #e5e7eb;
        color: #6b7280;
        padding: 0.625rem 1.25rem;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .filter-btn:hover {
        background: white;
        border-color: #3b82f6;
        color: #3b82f6;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
        border-color: #3b82f6;
        color: white;
        box-shadow: 0 4px 12px rgba(30, 58, 138, 0.3);
    }


    .table-section {
        margin-bottom: 3rem;
    }

    .table-card {
        background: white;
        border-radius: 16px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        border: 1px solid #e5e7eb;
        overflow: hidden;
    }

    .table-header {
        padding: 1.5rem;
        border-bottom: 2px solid #e5e7eb;
        background: #f9fafb;
    }

    .table-title {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .table-title i {
        color: #3b82f6;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table-custom {
        width: 100%;
        margin-bottom: 0;
    }

    .table-custom thead {
        background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
    }

    .table-custom thead th {
        padding: 1rem 1.25rem;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: white;
        border: none;
    }

    .table-custom tbody tr {
        border-bottom: 1px solid #e5e7eb;
        transition: all 0.2s ease;
    }

    .table-custom tbody tr:hover {
        background: #f9fafb;
    }

    .table-custom tbody td {
        padding: 1rem 1.25rem;
        vertical-align: middle;
        color: #374151;
    }

    .td-number {
        font-weight: 600;
        color: #6b7280;
    }

    .table-image {
        width: 80px;
        height: 50px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .table-title-text {
        font-weight: 600;
        color: #1f2937;
        line-height: 1.4;
    }

    .table-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.4rem 0.75rem;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .badge-teknologi {
        background: #dbeafe;
        color: #1e3a8a;
    }

    .badge-olahraga {
        background: #d1fae5;
        color: #065f46;
    }

    .badge-ekonomi {
        background: #fef3c7;
        color: #d97706;
    }

    .badge-politik {
        background: #fee2e2;
        color: #dc2626;
    }

    .badge-hiburan {
        background: #ede9fe;
        color: #7c3aed;
    }

    .badge-pendidikan {
        background: #f3f4f6;
        color: #4b5563;
    }

    .td-date {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .td-date i {
        color: #9ca3af;
    }

    .td-author {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .td-author i {
        color: #9ca3af;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: center;
    }

    .action-btn {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-view {
        background: #dbeafe;
        color: #1e40af;
    }

    .btn-view:hover {
        background: #3b82f6;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
    }

    .btn-edit {
        background: #fef3c7;
        color: #d97706;
    }

    .btn-edit:hover {
        background: #f59e0b;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(245, 158, 11, 0.3);
    }

    .btn-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .btn-delete:hover {
        background: #dc2626;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 38, 38, 0.3);
    }


    .card-view-section {
        margin-top: 3rem;
    }

    .section-header-custom {
        margin-bottom: 1.5rem;
    }

    .section-title-custom {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title-custom i {
        color: #3b82f6;
    }

    .section-subtitle-custom {
        color: #6b7280;
        font-size: 0.95rem;
        margin-bottom: 0;
    }


    @media (max-width: 991px) {
        .header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-badge {
            align-self: stretch;
        }
    }

    @media (max-width: 768px) {
        .page-header {
            padding: 1.5rem;
        }

        .header-title {
            font-size: 1.5rem;
        }

        .filter-card {
            padding: 1.25rem;
        }

        .table-header {
            padding: 1.25rem;
        }
    }
</style>
@endsection
