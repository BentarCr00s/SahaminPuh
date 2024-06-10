<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('news')) {
            Schema::create('news', function (Blueprint $table) {
                $table->id();
                $table->string('image');
                $table->string('title');
                $table->text('description');
                $table->string('url'); // Tambah kolom url untuk link berita
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
                $table->unsignedInteger('views')->default(0); // Tambah kolom views untuk jumlah pengunjung dari berita
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
