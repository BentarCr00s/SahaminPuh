<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        // Fetch data from the API
        $response = Http::get('https://api-sahamin-puh-final.vercel.app/news');
        $newsData = $response->json();

        // Prepare the data for insertion
        $newsToInsert = [];
        foreach ($newsData as $news) {
            $newsToInsert[] = [
                'image' => $news['imageUrl'],
                'title' => $news['title'],
                'description' => $news['content'],
                'category_id' => $this->determineCategoryId($news['title']),
                'url' => $news['link'],
                'created_at' => now()
            ];
        }

        // Insert data into the database
        DB::table('news')->insert($newsToInsert);
    }
}
