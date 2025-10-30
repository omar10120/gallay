@extends('layouts.admin')

@section('title', 'Edit Product - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">Edit Product</h2>
    <a href="{{ route('admin.products.index') }}" 
       class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:bg-[color:var(--color-accent)]">
        <i class="fas fa-arrow-left mr-2"></i>Back to Products
    </a>
</div>

<div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-6 border border-[color:var(--color-secondaryDark)]/40">
    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-[color:var(--color-creamDark)] mb-2">Product Name *</label>
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
                <label for="price" class="block text-sm font-medium text-[color:var(--color-creamDark)] mb-2">Price *</label>
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

            <div>
                <label for="category_id" class="block text-sm font-medium text-[color:var(--color-creamDark)] mb-2">Category</label>
                <select id="category_id" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">-- None --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $product->category_id)==$cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-[color:var(--color-creamDark)] mb-2">Primary Image</label>
            @if($product->image)
                <div class="mb-4">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="h-32 w-32 rounded-lg object-cover">
                    <p class="text-sm text-[color:var(--color-creamDark)]/70 mt-1">Current primary image</p>
                </div>
            @endif
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
            <p class="mt-1 text-sm text-[color:var(--color-creamDark)]/70">Leave empty to keep current image</p>
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.products.index') }}" 
               class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-6 py-2 rounded-md hover:bg-[color:var(--color-accent)]">
                Cancel
            </a>
            <button type="submit" 
                    class="bg-[color:var(--color-accent)] text-[color:var(--color-primaryDark)] px-6 py-2 rounded-md hover:bg-[color:var(--color-accentDark)]">
                <i class="fas fa-save mr-2"></i>Update Product
            </button>
        </div>
    </form>
</div>
@endsection
