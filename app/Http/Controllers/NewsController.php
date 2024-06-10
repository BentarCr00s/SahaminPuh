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

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.show', compact('news'));
    }
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
}
