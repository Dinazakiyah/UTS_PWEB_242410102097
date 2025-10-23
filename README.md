📰 Portal Berita Indonesia

Portal Berita Indonesia adalah sebuah website berbasis Laravel yang dirancang untuk menampilkan berbagai berita terkini, terpercaya, dan informatif dari berbagai kategori. Website ini memiliki tampilan modern, interaktif, dan responsive untuk memberikan pengalaman terbaik bagi pengguna.

🚀 Fitur Utama

Landing Page Interaktif
Menampilkan tampilan depan yang elegan dengan animasi, ikon Bootstrap, dan desain modern berbasis gradient biru.

Autentikasi Pengguna
Pengguna dapat melakukan login dan diarahkan ke dashboard setelah berhasil masuk.

Navigasi Dinamis
Tautan menu berubah otomatis berdasarkan status login pengguna (guest atau user terautentikasi).

Statistik dan Informasi Umum
Menampilkan jumlah artikel, kategori berita, pembaca aktif, dan jumlah penulis.

Beragam Kategori Berita
Tersedia berbagai kategori seperti Teknologi, Olahraga, Ekonomi, Politik, Hiburan, dan Pendidikan.

Desain Responsif
Menggunakan kombinasi CSS murni dan Bootstrap Icons agar tampilan menyesuaikan dengan perangkat (desktop maupun mobile).

🧩 Teknologi yang Digunakan
Komponen	Deskripsi
Framework	Laravel (PHP Framework versi terbaru)
Bahasa Pemrograman	PHP 8+, HTML5, CSS3
Frontend Library	Bootstrap Icons, Google Fonts (Inter)
Database	MySQL / PostgreSQL (tergantung konfigurasi Laravel)
Server Requirement	PHP ≥ 8.1, Composer, Apache/Nginx
🏗️ Struktur Halaman Utama

Header
Menampilkan logo website dan menu navigasi (Login, Dashboard).

Hero Section
Bagian pembuka dengan nama situs, slogan, dan tombol aksi ("Mulai Sekarang" & "Pelajari Lebih Lanjut").

Statistik
Informasi singkat jumlah artikel, kategori, pembaca, dan penulis.

Fitur Utama
Enam keunggulan website ditampilkan dalam bentuk kartu dengan ikon dan deskripsi.

Kategori Berita
Daftar kategori berita populer dengan ikon visual.

Footer
Informasi hak cipta dan versi Laravel & PHP yang digunakan.

🧑‍💻 Cara Menjalankan Proyek

Clone repository

git clone https://github.com/username/portal-berita.git
cd portal-berita


Install dependencies

composer install
npm install && npm run dev


Konfigurasi environment
Salin file .env.example menjadi .env, lalu sesuaikan koneksi database:

cp .env.example .env
php artisan key:generate


Migrasi database (jika ada)

php artisan migrate


Jalankan server

php artisan serve


Akses melalui browser

http://127.0.0.1:8000

🧠 Tentang Proyek

Website ini dikembangkan sebagai bagian dari UTS Mata Kuliah Pemrograman Web, dengan tujuan:

Melatih kemampuan pengembangan aplikasi berbasis Laravel.

Menerapkan konsep frontend responsive design dan autentikasi pengguna.

Menyajikan tampilan informatif dengan struktur konten yang jelas dan mudah diakses.
