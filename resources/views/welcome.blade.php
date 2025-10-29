<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Berita Indonesia - Beranda</title>


    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            min-height: 100vh;
            color: #1f2937;
            overflow-x: hidden;
        }

        .background-pattern {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            pointer-events: none;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            position: relative;
            z-index: 1;
        }


        .header {
            padding: 2rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .logo i {
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            gap: 1rem;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 0.625rem 1.25rem;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }


        .hero {
            text-align: center;
            padding: 4rem 0;
            color: white;
        }

        .hero-icon {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .hero p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            color: rgba(255, 255, 255, 0.9);
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .settings-section {
            margin-top: 3rem;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .settings-title {
            color: white;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .setting-item {
            text-align: center;
        }

        .setting-label {
            display: block;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .setting-select {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            color: #1f2937;
            width: 100%;
        }

        .setting-select:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .btn {
            padding: 1rem 2rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary {
            background: white;
            color: #1e3a8a;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
        }


        .features {
            padding: 3rem 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .feature-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: white;
            margin-bottom: 1.25rem;
        }

        .feature-card h3 {
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.75rem;
        }

        .feature-card p {
            color: #6b7280;
            line-height: 1.6;
            font-size: 0.95rem;
        }


        .stats {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            margin: 3rem 0;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #6b7280;
            font-weight: 500;
        }


        .categories {
            padding: 3rem 0;
        }

        .section-title {
            text-align: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
        }

        .category-badge {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
            border: 2px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-badge:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .category-badge i {
            display: block;
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }


        .footer {
            text-align: center;
            padding: 2rem 0;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.875rem;
        }


        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 1rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
                justify-content: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .categories-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <div class="background-pattern"></div>

    <div class="container">

        <header class="header">
            <div class="logo">
                <i class="bi bi-newspaper"></i>
                <span>Portal Berita</span>
            </div>

            @if (Route::has('login'))
                <nav class="nav-links">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    @endauth
                </nav>
            @endif
        </header>


        <section class="hero">
            <div class="hero-icon">
                <i class="bi bi-newspaper"></i>
            </div>
            <h1>Portal Berita Indonesia</h1>
            <p>Sumber Berita Terpercaya & Terkini untuk Anda</p>
            <div class="hero-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Mulai Sekarang
                </a>
                <a href="{{ route('berita') }}" class="btn btn-secondary">
                    <i class="bi bi-newspaper"></i>
                    Lihat Berita
                </a>
            </div>

            <div class="settings-section">
                <h5 class="settings-title">Pengaturan Preferensi</h5>
                <div class="settings-grid">
                    <div class="setting-item">
                        <label for="theme-select" class="setting-label">
                            <i class="bi bi-palette"></i> Tema
                        </label>
                        <select id="theme-select" class="form-select setting-select">
                            <option value="light">Terang</option>
                            <option value="dark">Gelap</option>
                        </select>
                    </div>
                    <div class="setting-item">
                        <label for="language-select" class="setting-label">
                            <i class="bi bi-translate"></i> Bahasa
                        </label>
                        <select id="language-select" class="form-select setting-select">
                            <option value="id">Indonesia</option>
                            <option value="en">English</option>
                        </select>
                    </div>
                </div>
                <button id="save-settings" class="btn btn-secondary">
                    <i class="bi bi-check-circle me-1"></i>Simpan Pengaturan
                </button>
            </div>
        </section>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeSelect = document.getElementById('theme-select');
            const languageSelect = document.getElementById('language-select');
            const saveButton = document.getElementById('save-settings');


            const savedTheme = getCookie('theme') || 'light';
            const savedLanguage = getCookie('language') || 'id';

            themeSelect.value = savedTheme;
            languageSelect.value = savedLanguage;


            applyTheme(savedTheme);

            saveButton.addEventListener('click', function() {
                const theme = themeSelect.value;
                const language = languageSelect.value;


                setCookie('theme', theme, 30);
                setCookie('language', language, 30);

                applyTheme(theme);


                saveButton.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Tersimpan!';
                saveButton.classList.remove('btn-secondary');
                saveButton.classList.add('btn-success');

                setTimeout(() => {
                    saveButton.innerHTML = '<i class="bi bi-check-circle me-1"></i>Simpan Pengaturan';
                    saveButton.classList.remove('btn-success');
                    saveButton.classList.add('btn-secondary');
                }, 2000);
            });

            function applyTheme(theme) {
                document.documentElement.setAttribute('data-theme', theme);
            }

            function setCookie(name, value, days) {
                const expires = new Date();
                expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
                document.cookie = name + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
            }

            function getCookie(name) {
                const nameEQ = name + '=';
                const ca = document.cookie.split(';');
                for(let i = 0; i < ca.length; i++) {
                    let c = ca[i];
                    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                }
                return null;
            }
        });
        </script>

        <section class="stats">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">150+</div>
                    <div class="stat-label">Artikel Berita</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">6</div>
                    <div class="stat-label">Kategori</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1.2K</div>
                    <div class="stat-label">Pembaca Aktif</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Penulis</div>
                </div>
            </div>
        </section>


        <section class="features" id="features">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-lightning-charge-fill"></i>
                    </div>
                    <h3>Berita Cepat & Akurat</h3>
                    <p>Dapatkan informasi terkini dengan cepat dan akurat dari berbagai sumber terpercaya.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-tags-fill"></i>
                    </div>
                    <h3>Beragam Kategori</h3>
                    <p>Teknologi, Olahraga, Ekonomi, Politik, Hiburan, dan Pendidikan dalam satu platform.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person-check-fill"></i>
                    </div>
                    <h3>Mudah Diakses</h3>
                    <p>Interface yang user-friendly dan responsive untuk pengalaman membaca yang optimal.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>Terpercaya</h3>
                    <p>Setiap berita telah melalui proses verifikasi dan editorial yang ketat.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h3>Update Real-time</h3>
                    <p>Berita diperbarui secara real-time untuk memastikan Anda selalu mendapat info terbaru.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3>Pencarian Mudah</h3>
                    <p>Temukan berita yang Anda cari dengan sistem pencarian dan filter yang canggih.</p>
                </div>
            </div>
        </section>


        <section class="categories">
            <h2 class="section-title">Kategori Berita</h2>
            <div class="categories-grid">
                <div class="category-badge">
                    <i class="bi bi-cpu-fill"></i>
                    <div>Teknologi</div>
                </div>
                <div class="category-badge">
                    <i class="bi bi-trophy-fill"></i>
                    <div>Olahraga</div>
                </div>
                <div class="category-badge">
                    <i class="bi bi-currency-dollar"></i>
                    <div>Ekonomi</div>
                </div>
                <div class="category-badge">
                    <i class="bi bi-bank2"></i>
                    <div>Politik</div>
                </div>
                <div class="category-badge">
                    <i class="bi bi-film"></i>
                    <div>Hiburan</div>
                </div>
                <div class="category-badge">
                    <i class="bi bi-book-fill"></i>
                    <div>Pendidikan</div>
                </div>
            </div>
        </section>


        <footer class="footer">
            <p>&copy; 2025 Portal Berita Indonesia - UTS Pemrograman Web</p>
            <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        </footer>
    </div>
</body>
</html>
