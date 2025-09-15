@extends('layouts.app')

@section('title', $product->name . ' - Geally')

@section('content')
<div class="py-8">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('home') }}" class="hover:text-gray-900">Gallery</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        <!-- Image Gallery -->
        <div class="space-y-4">
            <!-- Primary Image -->
            @if($product->image)
                <div class="relative group">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-96 object-cover rounded-xl shadow-lg">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300 rounded-xl"></div>
                </div>
            @else
                <div class="w-full h-96 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl shadow-lg flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-6xl"></i>
                </div>
            @endif

            <!-- Additional Images -->
            @if($product->images && count($product->images) > 0)
                <div class="grid grid-cols-3 gap-4">
                    @foreach($product->images as $image)
                        <div class="relative group">
                            <img src="{{ asset('storage/' . $image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-24 object-cover rounded-lg shadow-md">
                            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 rounded-lg"></div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Product Information -->
        <div class="space-y-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                <div class="flex items-center space-x-4 mb-6">
                    <span class="text-3xl font-bold text-green-600">UAE{{ number_format($product->price, 2) }}</span>
                    <div class="flex items-center text-gray-600">
                        <i class="fas fa-images mr-2"></i>
                        <span>{{ count($product->images ?? []) + ($product->image ? 1 : 0) }} image(s)</span>
                    </div>
                </div>
            </div>

            <!-- Image Details -->
            <div class="bg-gray-50 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Image Details</h3>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Total Images:</span>
                        <span class="font-medium">{{ count($product->images ?? []) + ($product->image ? 1 : 0) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Added:</span>
                        <span class="font-medium">{{ $product->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Last Updated:</span>
                        <span class="font-medium">{{ $product->updated_at->format('M d, Y') }}</span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <!-- <div class="space-y-4">
                <button class="w-full bg-blue-600 text-white py-3 px-6 rounded-xl font-semibold hover:bg-blue-700 transition-colors">
                    <i class="fas fa-download mr-2"></i>Download Images
                </button>
                <button class="w-full bg-gray-100 text-gray-800 py-3 px-6 rounded-xl font-semibold hover:bg-gray-200 transition-colors">
                    <i class="fas fa-share mr-2"></i>Share Collection
                </button>
            </div> -->

            <!-- Back to Gallery -->
            <div class="pt-6 border-t border-gray-200">
                <a href="{{ route('home') }}" 
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Gallery
                </a>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-800 mb-8">More Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($relatedProducts as $relatedProduct)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                        <div class="relative">
                            @if($relatedProduct->image)
                                <img src="{{ asset('storage/' . $relatedProduct->image) }}" 
                                     alt="{{ $relatedProduct->name }}" 
                                     class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-400 text-2xl"></i>
                                </div>
                            @endif
                            
                            <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">
                                ${{ number_format($relatedProduct->price, 2) }}
                            </div>
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-800 mb-2">{{ $relatedProduct->name }}</h3>
                            <a href="{{ route('products.show', $relatedProduct) }}" 
                               class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- Image Modal Script -->
<script>
    // Simple image modal functionality
    document.addEventListener('DOMContentLoaded', function() {
        const images = document.querySelectorAll('img[src*="storage"]');
        images.forEach(img => {
            img.style.cursor = 'pointer';
            img.addEventListener('click', function() {
                // Create modal
                const modal = document.createElement('div');
                modal.className = 'fixed inset-0 bg-black/80 flex items-center justify-center z-50';
                modal.innerHTML = `
                    <div class="relative max-w-4xl max-h-full p-4">
                        <img src="${this.src}" alt="${this.alt}" class="max-w-full max-h-full object-contain rounded-lg">
                        <button class="absolute top-2 right-2 text-white text-2xl hover:text-gray-300">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                `;
                
                document.body.appendChild(modal);
                
                // Close modal
                modal.addEventListener('click', function(e) {
                    if (e.target === modal || e.target.closest('button')) {
                        document.body.removeChild(modal);
                    }
                });
            });
        });
    });
</script>
@endsection
