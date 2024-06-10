<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use DateTime;

class NewsController extends Controller
{
    public function index()
    {
        return $this->fetchNews();
    }

    public function fetchNews()
    {
        // Ambil berita dari database terlebih dahulu
        $newsFromDB = News::all();

        // Render berita yang diambil dari database
        if ($newsFromDB->isNotEmpty()) {
            return view('news', ['news' => $newsFromDB]);
        }

        // Jika tidak ada berita di database, gunakan Http untuk mengambil data dari API
        $url = 'https://api-sahamin-puh-final.vercel.app/news';
        $response = Http::get($url);

        // Mengubah response menjadi array asosiatif
        $newsData = $response->json();

        // Cek apakah tabel 'news' ada di database
        if (Schema::hasTable('news')) {
            // Simpan berita yang diambil dari API ke database
            foreach ($newsData as $newsItem) {
                // Cek apakah berita sudah ada di database berdasarkan judul atau kriteria unik lainnya
                $existingNews = News::where('title', $newsItem['title'])->first();
                if (!$existingNews) {
                    // Format tanggal
                    $dateString = $newsItem['date']; // Contoh: "Senin,10Juni2024|14:36"
                    $dateTime = DateTime::createFromFormat('l,dF Y|H:i', $dateString);

                    if ($dateTime) {
                        $formattedDate = $dateTime->format('Y-m-d H:i:s');
                    } else {
                        // Jika format tanggal tidak sesuai, gunakan tanggal saat ini sebagai fallback
                        $formattedDate = now();
                    }

                    News::create([
                        'title' => $newsItem['title'],
                        'date' => $formattedDate,
                        'image' => $newsItem['imageUrl'],
                        'content' => $newsItem['content'],
                        'views' => 0 // Asumsikan views diinisialisasi dengan 0
                    ]);
                }
            }
        }

        // Render berita yang diambil dari API
        return view('news', ['news' => $newsData]);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
}
