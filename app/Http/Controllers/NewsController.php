<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        // $this->fetchNews();

        $newsItems = News::with('category')->get();
        $categories = Category::all();
        return view('news', compact('newsItems', 'categories'));
    }
    // News Card Category
    // public function store(Request $request)
    // {
    //     // Validasi data yang diterima dari formulir
    //     $validatedData = $request->validate([
    //         'category_id' => 'required',
    //         // tambahkan validasi lainnya sesuai kebutuhan
    //     ]);

    //     // Simpan data ke dalam database
    //     $news = new News();
    //     $news->category_id = $validatedData['category_id'];
    //     // tambahkan atribut lainnya sesuai kebutuhan
    //     $news->save();

    //     // Redirect atau berikan respons sesuai kebutuhan
    // }
    // public function fetchNews()
    // {
    //     try {
    //         $response = Http::get('https://api-sahamin-puh-final.vercel.app/news');
    //         $newsData = $response->json();

    //         if ($response->successful()) {
    //             $news = $response->json();

    //             foreach ($news as $item) {
    //                 $categories = [];
    //                 $titleWords = explode(' ', $item['title']); // Split title into words

    //                 $descriptionWords = explode(' ', $item['content']); // Split description into words

    //                 $allWords = array_merge($titleWords, $descriptionWords); // Combine title and description words

    //                 foreach ($allWords as $word) {
    //                     $category = Category::where('name', 'like', '%' . $word . '%')->first(); // Find category based on word
    //                     if ($category) {
    //                         $categories[] = $category->id;
    //                     }
    //                 }
    //                 $newsToInsert = [];
    //                 foreach ($categories as $categoryId) {
    //                     $newsToInsert[] = [
    //                         'image' => $item['imageUrl'],
    //                         'title' => $item['title'],
    //                         'description' => $item['content'],
    //                         'category_id' => $categoryId,
    //                         'views' => 0, // Set views to 0
    //                         'created_at' => $item['date'],
    //                     ];
    //                 }
    //                 DB::table('news')->insert($newsToInsert);
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         Log::error('Error fetching and storing stock news: ' . $e->getMessage());
    //     }

    // }
    // public function fetchNews()
    // {
    //     try {
    //         // Fetch data from the API
    //         $response = Http::get('https://api-sahamin-puh-final.vercel.app/news');
    //         $newsData = $response->json();

    //         // Prepare the data for insertion
    //         $newsToInsert = [];
    //         foreach ($newsData as $news) {
    //             $newsToInsert[] = [
    //                 'image' => $news['imgSrc'],
    //                 'title' => $news['title'],
    //                 'description' => $news['content'],
    //                 'category_id' => $this->determineCategoryId($news['title']),
    //                 'url' => null,
    //                 'created_at' => $news['date'],
    //             ];
    //         }

    //         // Insert data into the database
    //         DB::table('news')->insert($newsToInsert);
    //     }
    //     catch (\Exception $e) {
    //         Log::error('Error fetching and storing stock news: ' . $e->getMessage());
    //     }

    // }
}
