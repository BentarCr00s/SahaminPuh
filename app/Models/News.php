<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['id','image', 'title', 'description', 'category_id', 'views'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
