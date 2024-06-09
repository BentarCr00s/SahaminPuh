<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'title', 'description', 'category_id', 'views', 'url'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function fetchAndStoreStockNews()
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer a4b5d848-6af1-5e9f-3860-90f71504'
            ])->get('https://api.goapi.io/stock/idx/news');

            if ($response->successful()) {
                $news = $response->json();

                foreach ($news as $item) {
                    $categories = [];
                    $titleWords = explode(' ', $item['title']); // Split title into words
                    $descriptionWords = explode(' ', $item['description']); // Split description into words

                    $allWords = array_merge($titleWords, $descriptionWords); // Combine title and description words

                    foreach ($allWords as $word) {
                        $category = Category::where('name', 'like', '%' . $word . '%')->first(); // Find category based on word
                        if ($category) {
                            $categories[] = $category->id;
                        }
                    }

                    foreach ($categories as $categoryId) {
                        self::create([
                            'image' => $item['image'],
                            'title' => $item['title'],
                            'description' => $item['description'],
                            'category_id' => $categoryId,
                            'views' => 0, // Set views to 0
                            'url' => $item['url'], // Tambah value URL dari API
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error('Error fetching and storing stock news: ' . $e->getMessage());
        }
    }
}
