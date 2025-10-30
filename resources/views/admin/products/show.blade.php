@extends('layouts.admin')

@section('title', 'View Product - FastMenu Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-[color:var(--color-creamDark)]">{{ __('admin.productDetails') }}</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.products.edit', $product) }}" 
           class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:bg-[color:var(--color-accent)]">
            <i class="fas fa-edit mr-2"></i>{{ __('admin.editProduct') }}
        </a>
        <a href="{{ route('admin.products.index') }}" 
           class="bg-[color:var(--color-primary)] text-[color:var(--color-creamDark)] px-4 py-2 rounded-md hover:bg-[color:var(--color-accent)]">
            <i class="fas fa-arrow-left mr-2"></i>{{ __('admin.backToProducts') }}
        </a>
    </div>
</div>

<div class="bg-[color:var(--color-primaryDark)] shadow-md rounded-lg p-6 border border-[color:var(--color-secondaryDark)]/40">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Product Images -->
        <div>
            <h3 class="text-lg font-medium text-[color:var(--color-creamDark)] mb-4">{{ __('admin.images') }}</h3>
            
            @if($product->image)
                <div class="mb-6">
                    <h4 class="text-md font-medium text-[color:var(--color-creamDark)] mb-2">{{ __('admin.primaryImage') }}</h4>
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-64 rounded-lg object-cover">
                </div>
            @endif

            @if($product->images && count($product->images) > 0)
                <div>
                    <h4 class="text-md font-medium text-[color:var(--color-creamDark)] mb-2">{{ __('admin.additionalImages') }} ({{ count($product->images) }})</h4>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-32 rounded-lg object-cover">
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!$product->image && (!$product->images || count($product->images) == 0))
                <div class="text-center py-8 text-[color:var(--color-creamDark)]/70">
                    <i class="fas fa-image text-4xl mb-2"></i>
                    <p>{{ __('admin.noImagesUploaded') }}</p>
                </div>
            @endif
        </div>

        <!-- Product Details -->
        <div>
            <h3 class="text-lg font-medium text-[color:var(--color-creamDark)] mb-4">{{ __('admin.productInformation') }}</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-[color:var(--color-creamDark)]">{{ __('admin.productName') }}</label>
                    <p class="mt-1 text-lg text-gray-900">{{ $product->name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[color:var(--color-creamDark)]">{{ __('admin.price') }}</label>
                    <p class="mt-1 text-2xl font-bold text-green-600">AUE {{ number_format($product->price, 2) }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-[color:var(--color-creamDark)]">{{ __('admin.created') }}</label>
                    <p class="mt-1 text-gray-900">{{ $product->created_at->format('M d, Y \a\t g:i A') }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('admin.lastUpdated') }}</label>
                    <p class="mt-1 text-gray-900">{{ $product->updated_at->format('M d, Y \a\t g:i A') }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">{{ __('admin.totalImages') }}</label>
                    <p class="mt-1 text-gray-900">
                        {{ ($product->image ? 1 : 0) + count($product->images ?? []) }} image(s)
                    </p>
                </div>
            </div>

            <div class="mt-8 flex space-x-4">
                <a href="{{ route('admin.products.edit', $product) }}" 
                   class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                    <i class="fas fa-edit mr-2"></i>{{ __('admin.editProduct') }}
                </a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" 
                      class="inline" 
                      onsubmit="return confirm('{{ __('admin.confirmDeleteProduct') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i>{{ __('admin.deleteProduct') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
