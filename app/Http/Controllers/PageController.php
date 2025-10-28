<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController
{

    public function showLogin()
    {
        return view('login');
    }


    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return redirect()->route('login')->with('error', 'Email atau password salah!');
    }

    public function showDashboard(Request $request)
    {
        // Set theme and language preferences from cookies
        $theme = $request->cookie('theme', 'light');
        $language = $request->cookie('language', 'id');

        return view('dashboard', [
            'theme' => $theme,
            'language' => $language
        ]);
    }

    public function showPengelolaan(Request $request)
    {
        // Store last read article in session if provided
        if ($request->has('article_id')) {
            $request->session()->put('last_read_article', $request->article_id);
        }

        $beritaList = [
            [
                'id' => 1,
                'judul' => 'Teknologi AI Semakin Berkembang Pesat di Indonesia',
                'kategori' => 'Teknologi',
                'tanggal' => '2025-10-20',
                'penulis' => 'Admin Portal',
                'gambar' => 'https://jatismobile.com/wp-content/uploads/2023/01/futuristic-robot-artificial-intelligence-concept-1024x621.jpg'
            ],
            [
                'id' => 2,
                'judul' => 'Timnas Indonesia Raih Kemenangan Gemilang',
                'kategori' => 'Olahraga',
                'tanggal' => '2025-10-19',
                'penulis' => 'Redaksi Olahraga',
                'gambar' => 'https://cdn1-production-images-kly.akamaized.net/4ZCvDNVwmF9OCTjhwcmnR05bnPE=/800x450/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/5378193/original/050455500_1760219906-TIMNAS_INDONESIA.jpg'
            ],
            [
                'id' => 3,
                'judul' => 'Ekonomi Indonesia Tumbuh 5.2 Persen di Kuartal III',
                'kategori' => 'Ekonomi',
                'tanggal' => '2025-10-18',
                'penulis' => 'Tim Ekonomi',
                'gambar' => 'https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/01/pertumbuhan-ekonomi-indonesia.jpg'
            ],
            [
                'id' => 4,
                'judul' => 'Pemerintah Luncurkan Program Kesehatan Gratis',
                'kategori' => 'Politik',
                'tanggal' => '2025-10-17',
                'penulis' => 'Redaksi Politik',
                'gambar' => 'https://kabarsdgs.com/wp-content/uploads/2025/02/kesehatan-gratis2.jpg'
            ],
            [
                'id' => 5,
                'judul' => 'Festival Film Indonesia 2025 Digelar Meriah',
                'kategori' => 'Hiburan',
                'tanggal' => '2025-10-16',
                'penulis' => 'Tim Hiburan',
                'gambar' => 'https://img.okezone.com/content/2025/07/01/206/3151839/festival_film_indonesia-5UCk_large.jpeg'
            ],
            [
                'id' => 6,
                'judul' => 'Pendidikan Digital Menjadi Fokus Utama Kemendikbud',
                'kategori' => 'Pendidikan',
                'tanggal' => '2025-10-15',
                'penulis' => 'Redaksi Pendidikan',
                'gambar' => 'https://ldiitrenggalek.or.id/wp-content/uploads/2025/05/digitalisasi-pendidikan-1024x585.jpeg'
            ]
        ];

        return view('pengelolaan', [
            'beritaList' => $beritaList
        ]);
    }

    public function showProfile(Request $request)
    {
        return view('profile');
    }

    public function showBerita(Request $request)
    {
        // Get theme and language from cookies
        $theme = $request->cookie('theme', 'light');
        $language = $request->cookie('language', 'id');

        // Get read articles history from session
        $readArticles = $request->session()->get('read_articles', []);

        $beritaList = [
            [
                'id' => 1,
                'judul' => 'Teknologi AI Semakin Berkembang Pesat di Indonesia',
                'kategori' => 'Teknologi',
                'tanggal' => '2025-10-20',
                'penulis' => 'Admin Portal',
                'gambar' => 'https://jatismobile.com/wp-content/uploads/2023/01/futuristic-robot-artificial-intelligence-concept-1024x621.jpg',
                'isi' => 'Teknologi Artificial Intelligence (AI) di Indonesia mengalami perkembangan yang sangat pesat dalam beberapa tahun terakhir...',
                'sudah_dibaca' => in_array(1, $readArticles)
            ],
            [
                'id' => 2,
                'judul' => 'Timnas Indonesia Raih Kemenangan Gemilang',
                'kategori' => 'Olahraga',
                'tanggal' => '2025-10-19',
                'penulis' => 'Redaksi Olahraga',
                'gambar' => 'https://cdn1-production-images-kly.akamaized.net/4ZCvDNVwmF9OCTjhwcmnR05bnPE=/800x450/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/5378193/original/050455500_1760219906-TIMNAS_INDONESIA.jpg',
                'isi' => 'Tim Nasional Indonesia berhasil meraih kemenangan gemilang dalam pertandingan internasional...',
                'sudah_dibaca' => in_array(2, $readArticles)
            ],
            [
                'id' => 3,
                'judul' => 'Ekonomi Indonesia Tumbuh 5.2 Persen di Kuartal III',
                'kategori' => 'Ekonomi',
                'tanggal' => '2025-10-18',
                'penulis' => 'Tim Ekonomi',
                'gambar' => 'https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/01/pertumbuhan-ekonomi-indonesia.jpg',
                'isi' => 'Ekonomi Indonesia menunjukkan pertumbuhan yang positif dengan mencapai 5.2% di kuartal III...',
                'sudah_dibaca' => in_array(3, $readArticles)
            ],
            [
                'id' => 4,
                'judul' => 'Pemerintah Luncurkan Program Kesehatan Gratis',
                'kategori' => 'Politik',
                'tanggal' => '2025-10-17',
                'penulis' => 'Redaksi Politik',
                'gambar' => 'https://kabarsdgs.com/wp-content/uploads/2025/02/kesehatan-gratis2.jpg',
                'isi' => 'Pemerintah Indonesia meluncurkan program kesehatan gratis untuk masyarakat...',
                'sudah_dibaca' => in_array(4, $readArticles)
            ],
            [
                'id' => 5,
                'judul' => 'Festival Film Indonesia 2025 Digelar Meriah',
                'kategori' => 'Hiburan',
                'tanggal' => '2025-10-16',
                'penulis' => 'Tim Hiburan',
                'gambar' => 'https://img.okezone.com/content/2025/07/01/206/3151839/festival_film_indonesia-5UCk_large.jpeg',
                'isi' => 'Festival Film Indonesia 2025 digelar dengan meriah di Jakarta...',
                'sudah_dibaca' => in_array(5, $readArticles)
            ],
            [
                'id' => 6,
                'judul' => 'Pendidikan Digital Menjadi Fokus Utama Kemendikbud',
                'kategori' => 'Pendidikan',
                'tanggal' => '2025-10-15',
                'penulis' => 'Redaksi Pendidikan',
                'gambar' => 'https://ldiitrenggalek.or.id/wp-content/uploads/2025/05/digitalisasi-pendidikan-1024x585.jpeg',
                'isi' => 'Kementerian Pendidikan dan Kebudayaan menjadikan pendidikan digital sebagai fokus utama...',
                'sudah_dibaca' => in_array(6, $readArticles)
            ]
        ];

        return view('berita', [
            'beritaList' => $beritaList,
            'theme' => $theme,
            'language' => $language
        ]);
    }

    public function showArtikel(Request $request, $id)
    {
        // Get theme and language from cookies
        $theme = $request->cookie('theme', 'light');
        $language = $request->cookie('language', 'id');

        // Mark article as read in session
        $readArticles = $request->session()->get('read_articles', []);
        if (!in_array($id, $readArticles)) {
            $readArticles[] = $id;
            $request->session()->put('read_articles', $readArticles);
        }

        $artikel = [
            1 => [
                'id' => 1,
                'judul' => 'Teknologi AI Semakin Berkembang Pesat di Indonesia',
                'kategori' => 'Teknologi',
                'tanggal' => '2025-10-20',
                'penulis' => 'Admin Portal',
                'gambar' => 'https://jatismobile.com/wp-content/uploads/2023/01/futuristic-robot-artificial-intelligence-concept-1024x621.jpg',
                'isi' => 'Teknologi Artificial Intelligence (AI) di Indonesia mengalami perkembangan yang sangat pesat dalam beberapa tahun terakhir. Dengan dukungan pemerintah dan investasi dari berbagai perusahaan teknologi, ekosistem AI di tanah air semakin matang dan kompetitif di tingkat global.

                Perkembangan ini terlihat dari meningkatnya jumlah startup AI lokal, penelitian di universitas-universitas ternama, serta implementasi AI di berbagai sektor industri. Pemerintah melalui Kementerian Komunikasi dan Informatika telah meluncurkan berbagai program untuk mendorong inovasi AI, termasuk pembentukan pusat-pusat AI di beberapa kota besar.

                Para ahli memperkirakan bahwa dalam 5 tahun ke depan, Indonesia akan menjadi salah satu pemain utama di bidang AI di Asia Tenggara, dengan kontribusi signifikan terhadap perekonomian digital nasional.'
            ],
            2 => [
                'id' => 2,
                'judul' => 'Timnas Indonesia Raih Kemenangan Gemilang',
                'kategori' => 'Olahraga',
                'tanggal' => '2025-10-19',
                'penulis' => 'Redaksi Olahraga',
                'gambar' => 'https://cdn1-production-images-kly.akamaized.net/4ZCvDNVwmF9OCTjhwcmnR05bnPE=/800x450/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/5378193/original/050455500_1760219906-TIMNAS_INDONESIA.jpg',
                'isi' => 'Tim Nasional Indonesia berhasil meraih kemenangan gemilang dalam pertandingan internasional melawan Thailand dengan skor 3-1. Kemenangan ini menjadi modal berharga bagi tim Merah Putih menjelang ajang SEA Games 2025.

                Gol-gol Indonesia dicetak oleh Egy Maulana Vikri di menit 23, Dimas Drajad di menit 67, dan Rafael Struick di menit 89. Pelatih Shin Tae-yong mengaku puas dengan penampilan para pemain yang menunjukkan permainan solid dan efektif.

                "Para pemain telah bekerja keras selama persiapan dan hasilnya terlihat di lapangan. Kami akan terus berlatih untuk menghadapi tantangan berikutnya," ujar Shin Tae-yong dalam konferensi pers pasca pertandingan.'
            ],
            3 => [
                'id' => 3,
                'judul' => 'Ekonomi Indonesia Tumbuh 5.2 Persen di Kuartal III',
                'kategori' => 'Ekonomi',
                'tanggal' => '2025-10-18',
                'penulis' => 'Tim Ekonomi',
                'gambar' => 'https://storage.googleapis.com/storage-ajaib-prd-platform-wp-artifact/2020/01/pertumbuhan-ekonomi-indonesia.jpg',
                'isi' => 'Ekonomi Indonesia menunjukkan pertumbuhan yang positif dengan mencapai 5.2% di kuartal III tahun 2025. Angka ini melampaui target pemerintah yang sebesar 5.0% dan menunjukkan resiliensi ekonomi nasional di tengah kondisi global yang penuh tantangan.

                Menteri Keuangan menyatakan bahwa pertumbuhan ini didorong oleh sektor manufaktur, perdagangan, dan jasa keuangan. "Kami optimis dapat mempertahankan momentum pertumbuhan ini hingga akhir tahun," kata Menteri Keuangan dalam keterangan resmi.

                Namun, para ekonom mengingatkan pentingnya menjaga stabilitas makroekonomi dan melanjutkan reformasi struktural untuk mendukung pertumbuhan berkelanjutan.'
            ],
            4 => [
                'id' => 4,
                'judul' => 'Pemerintah Luncurkan Program Kesehatan Gratis',
                'kategori' => 'Politik',
                'tanggal' => '2025-10-17',
                'penulis' => 'Redaksi Politik',
                'gambar' => 'https://kabarsdgs.com/wp-content/uploads/2025/02/kesehatan-gratis2.jpg',
                'isi' => 'Pemerintah Indonesia meluncurkan program kesehatan gratis untuk masyarakat berpenghasilan rendah. Program ini merupakan bagian dari komitmen pemerintah untuk mewujudkan Universal Health Coverage (UHC) di Indonesia.

                Program kesehatan gratis ini mencakup pelayanan kesehatan dasar, rawat inap, dan beberapa jenis obat-obatan. Menteri Kesehatan menjelaskan bahwa program ini akan menjangkau sekitar 50 juta penduduk Indonesia yang masuk dalam kategori masyarakat berpenghasilan rendah.

                "Program ini akan sangat membantu masyarakat yang selama ini kesulitan mengakses layanan kesehatan berkualitas," ujar Menteri Kesehatan dalam acara peluncuran.'
            ],
            5 => [
                'id' => 5,
                'judul' => 'Festival Film Indonesia 2025 Digelar Meriah',
                'kategori' => 'Hiburan',
                'tanggal' => '2025-10-16',
                'penulis' => 'Tim Hiburan',
                'gambar' => 'https://img.okezone.com/content/2025/07/01/206/3151839/festival_film_indonesia-5UCk_large.jpeg',
                'isi' => 'Festival Film Indonesia 2025 digelar dengan meriah di Jakarta Convention Center. Acara yang berlangsung selama 5 hari ini dihadiri oleh ratusan sineas tanah air dan mancanegara.

                Festival tahun ini menghadirkan lebih dari 100 film dari berbagai genre, mulai dari drama, komedi, hingga dokumenter. Beberapa film yang menjadi sorotan adalah karya-karya sutradara muda yang berhasil meraih penghargaan internasional.

                Ketua panitia festival menyatakan bahwa FFI 2025 menjadi ajang untuk mempromosikan industri film Indonesia ke dunia internasional.'
            ],
            6 => [
                'id' => 6,
                'judul' => 'Pendidikan Digital Menjadi Fokus Utama Kemendikbud',
                'kategori' => 'Pendidikan',
                'tanggal' => '2025-10-15',
                'penulis' => 'Redaksi Pendidikan',
                'gambar' => 'https://ldiitrenggalek.or.id/wp-content/uploads/2025/05/digitalisasi-pendidikan-1024x585.jpeg',
                'isi' => 'Kementerian Pendidikan dan Kebudayaan menjadikan pendidikan digital sebagai fokus utama dalam program tahun 2025. Hal ini sejalan dengan perkembangan teknologi informasi yang semakin pesat.

                Menteri Pendidikan dan Kebudayaan menyatakan bahwa transformasi digital di bidang pendidikan akan mencakup pengembangan platform pembelajaran online, pelatihan guru dalam teknologi digital, dan pengadaan perangkat teknologi untuk sekolah-sekolah.

                "Pendidikan digital bukan hanya tentang penggunaan teknologi, tetapi juga tentang mengembangkan kemampuan siswa untuk beradaptasi dengan era digital," kata Menteri dalam rapat koordinasi nasional.'
            ]
        ];

        if (!isset($artikel[$id])) {
            abort(404, 'Artikel tidak ditemukan');
        }

        return view('artikel', [
            'artikel' => $artikel[$id],
            'theme' => $theme,
            'language' => $language
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
