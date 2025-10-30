<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products for public viewing
     */
    public function index()
    {
        $query = Product::query()->latest();
        $categories = \App\Models\Category::orderBy('name')->pluck('name', 'slug')->toArray();

        if (request('category')) {
            $categoryParam = request('category');
            $category = \App\Models\Category::where('slug', $categoryParam)
                ->orWhere('name', $categoryParam)
                ->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        $products = $query->paginate(12)->withQueryString();
        $categoryNames = \App\Models\Category::orderBy('name')->pluck('name')->toArray();

        $sliderItems = \App\Models\Slider::with(['product' => function($q){ $q->latest(); }])
            ->where('is_active', true)
            ->orderBy('position')
            ->get()
            ->pluck('product')
            ->filter();

        return view('products.index', [
            'products' => $products,
            'categories' => $categoryNames,
            'sliderProducts' => $sliderItems,
        ]);
    }

    /**
     * Display the specified product
     */
    public function show(Product $product)
    {
        $relatedProducts = Product::where('id', '!=', $product->id)
            ->latest()
            ->limit(4)
            ->get();
            
        return view('products.show', compact('product', 'relatedProducts'));
    }
}