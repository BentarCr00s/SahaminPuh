<?php

namespace App\Http\Controllers;

use App\Models\News;

class StockNewsController extends Controller
{
    public function fetchAndStoreStockNews()
    {
        News::fetchAndStoreStockNews();

        return response()->json(['message' => 'Stock news fetched and stored successfully']);
    }
}
