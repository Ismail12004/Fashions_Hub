<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get men's and women's categories
        $categories = Category::whereIn('name', ['Men\'s Clothing', 'Women\'s Clothing'])->get();
        
        // Get featured products for each category
        $products = Product::with('category')
            ->whereIn('category_id', $categories->pluck('id'))
            ->where('stock', '>', 0)
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('categories', 'products'));
    }
}
