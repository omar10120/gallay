@extends('layouts.app')

@section('title', 'Geally - Beautiful Images Gallery')

@section('content')
<div id="gallery" class="py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Our Image Collection</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Discover our curated selection of beautiful images. Each piece is carefully selected to inspire and captivate.
        </p>
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                <i class="fas fa-image text-gray-400 text-4xl"></i>
                            </div>
                        @endif
                        
                        <!-- Image count badge -->
                        @if($product->images && count($product->images) > 0)
                            <div class="absolute top-3 right-3 bg-black/70 text-white px-2 py-1 rounded-full text-xs">
                                <i class="fas fa-images mr-1"></i>{{ count($product->images) + 1 }}
                            </div>
                        @endif
                        
                        <!-- Price badge -->
                        <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">
                            UAE{{ number_format($product->price, 2) }}
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            {{ count($product->images ?? []) + ($product->image ? 1 : 0) }} beautiful image(s)
                        </p>
                        <a href="{{ route('products.show', $product) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                            View Details
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($products->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>
        @endif
    @else
        <!-- Empty state -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-images text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-800 mb-2">No Images Yet</h3>
            <p class="text-gray-600 mb-6">Check back soon for our beautiful image collection!</p>
            <a href="/admin/login" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-cog mr-2"></i>Admin Panel
            </a>
        </div>
    @endif
</div>
@endsection
