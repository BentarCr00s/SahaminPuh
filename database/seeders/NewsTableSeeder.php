<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            [
                'image' => 'https://example.com/image1.jpg',
                'title' => 'Tech News 1',
                'description' => 'Description for tech news 1',
                'category_id' => 1, // Assuming Technology category has ID 1
                'url' => 'https://example.com/news1', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image2.jpg',
                'title' => 'Tech News 2',
                'description' => 'Description for tech news 2',
                'category_id' => 1, // Assuming Technology category has ID 1
                'url' => 'https://example.com/news2', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image3.jpg',
                'title' => 'Tech News 3',
                'description' => 'Description for tech news 3',
                'category_id' => 1, // Assuming Technology category has ID 1
                'url' => 'https://example.com/news3', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image4.jpg',
                'title' => 'FnB News 1',
                'description' => 'Description for FnB news 1',
                'category_id' => 2, // Assuming FnB category has ID 2
                'url' => 'https://example.com/news4', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image5.jpg',
                'title' => 'FnB News 2',
                'description' => 'Description for FnB news 2',
                'category_id' => 2, // Assuming FnB category has ID 2
                'url' => 'https://example.com/news5', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image6.jpg',
                'title' => 'FnB News 3',
                'description' => 'Description for FnB news 3',
                'category_id' => 2, // Assuming FnB category has ID 2
                'url' => 'https://example.com/news6', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image7.jpg',
                'title' => 'Banking News 1',
                'description' => 'Description for banking news 1',
                'category_id' => 3, // Assuming Banking category has ID 3
                'url' => 'https://example.com/news7', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image8.jpg',
                'title' => 'Banking News 2',
                'description' => 'Description for banking news 2',
                'category_id' => 3, // Assuming Banking category has ID 3
                'url' => 'https://example.com/news8', // Tambah value URL
                'created_at' => now()
            ],
            [
                'image' => 'https://example.com/image9.jpg',
                'title' => 'Banking News 3',
                'description' => 'Description for banking news 3',
                'category_id' => 3, // Assuming Banking category has ID 3
                'url' => 'https://example.com/news9', // Tambah value URL
                'created_at' => now()
            ],
        ]);
    }
}
