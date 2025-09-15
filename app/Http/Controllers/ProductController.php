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
        $products = Product::latest()->paginate(12);
        return view('products.index', compact('products'));
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