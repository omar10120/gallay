<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $items = Slider::with('product')->orderBy('position')->get();
        return view('admin.sliders.index', compact('items'));
    }

    public function create()
    {
        $usedProductIds = Slider::pluck('product_id')->all();
        $products = Product::whereNotIn('id', $usedProductIds)->orderByDesc('id')->get();
        return view('admin.sliders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:product_gallery,id|unique:sliders,product_id',
            'position' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);
        $data['position'] = $data['position'] ?? 0;
        $data['is_active'] = (bool)($data['is_active'] ?? true);
        Slider::create($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Slider item added.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider item removed.');
    }
}


