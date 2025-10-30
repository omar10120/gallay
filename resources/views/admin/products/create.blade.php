@extends('layouts.admin')

@section('title', 'Create Product - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-secondary)]">{{ __('admin.createNewProduct') }}</h2>
    <a href="{{ route('admin.products.index') }}" 
       class="bg-[color:var(--color-primary)] text-[color:var(--color-secondary)] px-4 py-2 rounded-md hover:bg-[color:var(--color-accent)]">
        <i class="fas fa-arrow-left mr-2"></i>{{ __('admin.backToProducts') }}
    </a>
</div>

<div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-6 border border-[color:var(--color-secondaryDark)]/40">
    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-[color:var(--color-secondary)] mb-2">{{ __('admin.productName') }} *</label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)]"
                       placeholder="{{ __('admin.enterProductName') }}"
                       required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-[color:var(--color-secondary)] mb-2">{{ __('admin.price') }} *</label>
                <input type="number" 
                       id="price" 
                       name="price" 
                       value="{{ old('price') }}"
                       step="0.01"
                       min="0"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('price') border-red-500 @enderror bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)]"
                       placeholder="{{ __('admin.enterPrice') }}"
                       required>
                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category_id" class="block text-sm font-medium text-[color:var(--color-secondary)] mb-2">{{ __('admin.category') }}</label>
                <select id="category_id" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)]">
                    <option value="">{{ __('admin.none') }}</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id')==$cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <label for="image" class="block text-sm font-medium text-[color:var(--color-secondary)] mb-2">{{ __('admin.primaryImage') }}</label>
            <input type="file" 
                   id="image" 
                   name="image" 
                   accept="image/*"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('image') border-red-500 @enderror bg-[color:var(--color-primaryDark)] text-[color:var(--color-secondary)]">
            @error('image')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        

        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('admin.products.index') }}" 
               class="bg-[color:var(--color-primary)] text-[color:var(--color-secondary)] px-6 py-2 rounded-md hover:bg-[color:var(--color-accent)]">
                {{ __('admin.cancel') }}
            </a>
            <button type="submit" 
                    id="submit-btn"
                    class="bg-[color:var(--color-accent)] text-[color:var(--color-primaryDark)] px-6 py-2 rounded-md hover:bg-[color:var(--color-accentDark)] disabled:opacity-50 disabled:cursor-not-allowed">
                <i class="fas fa-save mr-2" id="save-icon"></i>
                    <span id="submit-text">{{ __('admin.createProduct') }}</span>
                <span id="loading-text" class="hidden">{{ __('admin.creating') }}...</span>
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
