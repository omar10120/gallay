@extends('layouts.admin')

@section('title', 'View Product - Geally Admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Product Details</h2>
    <div class="flex space-x-2">
        <a href="{{ route('admin.products.edit', $product) }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
            <i class="fas fa-edit mr-2"></i>Edit Product
        </a>
        <a href="{{ route('admin.products.index') }}" 
           class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
            <i class="fas fa-arrow-left mr-2"></i>Back to Products
        </a>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg p-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Product Images -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-4">Images</h3>
            
            @if($product->image)
                <div class="mb-6">
                    <h4 class="text-md font-medium text-gray-700 mb-2">Primary Image</h4>
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-64 rounded-lg object-cover">
                </div>
            @endif

            @if($product->images && count($product->images) > 0)
                <div>
                    <h4 class="text-md font-medium text-gray-700 mb-2">Additional Images ({{ count($product->images) }})</h4>
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
                <div class="text-center py-8 text-gray-500">
                    <i class="fas fa-image text-4xl mb-2"></i>
                    <p>No images uploaded</p>
                </div>
            @endif
        </div>

        <!-- Product Details -->
        <div>
            <h3 class="text-lg font-medium text-gray-800 mb-4">Product Information</h3>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Product Name</label>
                    <p class="mt-1 text-lg text-gray-900">{{ $product->name }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <p class="mt-1 text-2xl font-bold text-green-600">AUE {{ number_format($product->price, 2) }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Created</label>
                    <p class="mt-1 text-gray-900">{{ $product->created_at->format('M d, Y \a\t g:i A') }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                    <p class="mt-1 text-gray-900">{{ $product->updated_at->format('M d, Y \a\t g:i A') }}</p>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Total Images</label>
                    <p class="mt-1 text-gray-900">
                        {{ ($product->image ? 1 : 0) + count($product->images ?? []) }} image(s)
                    </p>
                </div>
            </div>

            <div class="mt-8 flex space-x-4">
                <a href="{{ route('admin.products.edit', $product) }}" 
                   class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                    <i class="fas fa-edit mr-2"></i>Edit Product
                </a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}" 
                      class="inline" 
                      onsubmit="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-md hover:bg-red-700">
                        <i class="fas fa-trash mr-2"></i>Delete Product
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
