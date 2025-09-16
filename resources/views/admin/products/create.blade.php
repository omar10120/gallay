@extends('layouts.admin')

@section('title', 'Create Product - Geally Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Create New Product</h2>
    <a href="{{ route('admin.products.index') }}" 
       class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
        <i class="fas fa-arrow-left mr-2"></i>Back to Products
    </a>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name *</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
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
                       value="{{ old('price') }}"
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
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror">
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-6">
            <label for="images" class="block text-sm font-medium text-gray-700 mb-2">Additional Images</label>
            <input type="file" 
                   id="images" 
                   name="images[]" 
                   accept="image/*"
                   multiple
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('images.*') border-red-500 @enderror">
            <p class="mt-1 text-sm text-gray-500">You can select multiple images at once</p>
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
                    id="submit-btn"
                    class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-save mr-2" id="save-icon"></i>
                <span id="submit-text">Create Product</span>
                <span id="loading-text" class="hidden">Creating...</span>
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submit-btn');
    const saveIcon = document.getElementById('save-icon');
    const submitText = document.getElementById('submit-text');
    const loadingText = document.getElementById('loading-text');
    
    form.addEventListener('submit', function() {
        // Disable the submit button
        submitBtn.disabled = true;
        
        // Change icon to loading spinner
        saveIcon.className = 'fas fa-spinner fa-spin mr-2';
        
        // Hide submit text and show loading text
        submitText.classList.add('hidden');
        loadingText.classList.remove('hidden');
        
        // Optional: Disable all form inputs to prevent changes
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.disabled = true;
        });
    });
});
</script>
@endsection
