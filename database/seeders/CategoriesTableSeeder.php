<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Teknologi', 'description' => 'Semua tentang teknologi'],
            ['name' => 'FnB', 'description' => 'Berita terkait makanan dan minuman'],
            ['name' => 'Banking', 'description' => 'Informasi terbaru seputar perbankan'],
            ['name' => 'IPO', 'description' => 'Berita terkait Initial Public Offering'],
            ['name' => 'Investasi', 'description' => 'Informasi seputar investasi'],
            ['name' => 'Obligasi', 'description' => 'Berita terkait pasar obligasi'],
            ['name' => 'Saham', 'description' => 'Semua tentang saham'],
        ]);
    }
}
