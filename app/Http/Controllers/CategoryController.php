<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $products = $category->products()
            ->where('stock', '>', 0)
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'products'));
    }
} 