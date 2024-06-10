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

        // Check if the response is successful and contains data
        if ($response->successful() && $response->json()) {
            $newsData = $response->json();

            // Prepare the data for insertion
            $newsToInsert = [];
            foreach ($newsData as $news) {
                $newsToInsert[] = [
                    'image' => $news['imgSrc'],
                    'title' => $news['title'],
                    'description' => $news['content'],
                    'category_id' => $this->determineCategoryId($news['title']),
                    'url' => $news['link'],
                    'created_at' => now()
                ];
            }

            // Insert data into the database
            DB::table('news')->insert($newsToInsert);
        } else {
            // Handle the case where the API request fails or returns no data
            $this->command->error('Failed to fetch data from the API or no data returned.');
        }
    }

    private function determineCategoryId($title)
    {
        // Simple example to determine category based on title keywords
        if (stripos($title, 'Tech') !== false) {
            return 1; // Technology category
        } elseif (stripos($title, 'FnB') !== false) {
            return 2; // FnB category
        } elseif (stripos($title, 'Banking') !== false) {
            return 3; // Banking category
        } else {
            return 4; // Default category
        }
    }
}

// <?php

// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

// class NewsTableSeeder extends Seeder
// {
//     public function run()
//     {
//         DB::table('news')->insert([
//             [
//                 'image' => 'https://example.com/image1.jpg',
//                 'title' => 'Tech News 1',
//                 'description' => 'Description for tech news 1',
//                 'category_id' => 1, // Assuming Technology category has ID 1
//                 'url' => 'https://example.com/news1', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image2.jpg',
//                 'title' => 'Tech News 2',
//                 'description' => 'Description for tech news 2',
//                 'category_id' => 1, // Assuming Technology category has ID 1
//                 'url' => 'https://example.com/news2', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image3.jpg',
//                 'title' => 'Tech News 3',
//                 'description' => 'Description for tech news 3',
//                 'category_id' => 1, // Assuming Technology category has ID 1
//                 'url' => 'https://example.com/news3', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image4.jpg',
//                 'title' => 'FnB News 1',
//                 'description' => 'Description for FnB news 1',
//                 'category_id' => 2, // Assuming FnB category has ID 2
//                 'url' => 'https://example.com/news4', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image5.jpg',
//                 'title' => 'FnB News 2',
//                 'description' => 'Description for FnB news 2',
//                 'category_id' => 2, // Assuming FnB category has ID 2
//                 'url' => 'https://example.com/news5', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image6.jpg',
//                 'title' => 'FnB News 3',
//                 'description' => 'Description for FnB news 3',
//                 'category_id' => 2, // Assuming FnB category has ID 2
//                 'url' => 'https://example.com/news6', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image7.jpg',
//                 'title' => 'Banking News 1',
//                 'description' => 'Description for banking news 1',
//                 'category_id' => 3, // Assuming Banking category has ID 3
//                 'url' => 'https://example.com/news7', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image8.jpg',
//                 'title' => 'Banking News 2',
//                 'description' => 'Description for banking news 2',
//                 'category_id' => 3, // Assuming Banking category has ID 3
//                 'url' => 'https://example.com/news8', // Tambah value URL
//                 'created_at' => now()
//             ],
//             [
//                 'image' => 'https://example.com/image9.jpg',
//                 'title' => 'Banking News 3',
//                 'description' => 'Description for banking news 3',
//                 'category_id' => 3, // Assuming Banking category has ID 3
//                 'url' => 'https://example.com/news9', // Tambah value URL
//                 'created_at' => now()
//             ],
//         ]);
//     }
// }
