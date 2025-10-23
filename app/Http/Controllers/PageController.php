<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController
{

    public function showLogin()
    {
        return view('login');
    }


    public function processLogin(Request $request)
    {

        $username = $request->input('username');
        $password = $request->input('password');


        if ($username && $password) {
            return redirect()->route('dashboard', ['username' => $username]);
        }

        return redirect()->route('login')->with('error', 'Username dan Password harus diisi!');
    }

    public function showDashboard(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        return view('dashboard', ['username' => $username]);
    }

    public function showPengelolaan(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
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
            'username' => $username,
            'beritaList' => $beritaList
        ]);
    }

    public function showProfile(Request $request)
    {
        $username = $request->query('username');

        if (!$username) {
            return redirect()->route('login');
        }

        return view('profile', ['username' => $username]);
    }

    public function logout()
    {
        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
