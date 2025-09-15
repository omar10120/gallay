@extends('layouts.admin')

@section('title', 'Edit Product - Geally Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
    <a href="{{ route('admin.products.index') }}" 
       class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fas fa-arrow-left mr-2"></i>Back to Products
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name', $product->name) }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror"
                       placeholder="Enter product name"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                <input type="number" 
                       id="price" 
                       name="price" 
                       value="{{ old('price', $product->price) }}"
                       step="0.01"
                       min="0"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror"
                       placeholder="0.00"
                       required>
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Primary Image</label>
            @if($product->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="h-32 w-32 rounded-lg object-cover">
                    <p class="text-sm text-gray-500 mt-1">Current primary image</p>
                </div>
            @endif
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
            <p class="mt-1 text-sm text-gray-500">Leave empty to keep current image</p>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Additional Images</label>
            @if($product->images && count($product->images) > 0)
                <div class="mb-4">
                    <div class="grid grid-cols-4 gap-4">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="h-24 w-24 rounded-lg object-cover">
                        @endforeach
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Current additional images</p>
                </div>
            @endif
            <input type="file" 
                   id="images" 
                   name="images[]" 
                   accept="image/*"
                   multiple
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('images.*') border-red-500 @enderror">
            <p class="mt-1 text-sm text-gray-500">Select new images to replace current ones</p>
            @error('images.*')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.products.index') }}" 
               class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                <i class="fas fa-save mr-2"></i>Update Product
            </button>
        </div>
    </form>
</div>
@endsection
