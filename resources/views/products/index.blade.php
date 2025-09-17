@extends('layouts.app')

@section('title', 'Geally - Beautiful Images Gallery')

@section('content')
<div id="gallery" class="py-12">
   

    @if($products->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        @if($product->image)
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-full h-64 object-cover cursor-pointer">
                            </a>
                        @else
                            <a href="{{ route('products.show', $product) }}">
                                <div class="w-full h-64 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center cursor-pointer">
                                    <i class="fas fa-image text-gray-400 text-4xl"></i>
                                </div>
                            </a>
                        @endif
                        
                        <!-- Image count badge -->
                        @if($product->images && count($product->images) > 0)
                            <div class="absolute top-3 right-3 bg-black/70 text-white px-2 py-1 rounded-full text-xs">
                                <i class="fas fa-images mr-1"></i>{{ count($product->images) + 1 }}
                            </div>
                        @endif
                        
                        <!-- Price badge -->
                        <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">
                            AED{{ number_format($product->price, 2) }}
                        </div>
                    </div>
                    
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
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
