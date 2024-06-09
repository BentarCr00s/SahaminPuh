<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::with('category')->get();
        $categories = Category::all();
        return view('news', compact('newsItems', 'categories'));
    }
}
