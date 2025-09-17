@extends('layouts.app')

@section('title', 'Geally - Beautiful Images Gallery')

@section('content')
<div id="gallery" class="py-12">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Ready-to-Deliver Products</h2>
     
    </div>

    @if($products->count() > 0)
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                    <div class="relative">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-64 object-cover cursor-pointer"
                                 onclick="openImageModal('{{ asset('storage/' . $product->image) }}', '{{ $product->name }}')">
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
                    
                    <div class="p-4">
                        <h3 class="text-sm font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
                        <p class="text-gray-600 text-xs mb-3">
                            {{ count($product->images ?? []) + ($product->image ? 1 : 0) }} image(s)
                        </p>
                        <a href="{{ route('products.show', $product) }}" 
                           class="inline-flex items-center text-blue-600 hover:text-blue-800 text-xs font-medium">
                            View Details
                            <i class="fas fa-arrow-right ml-1 text-xs"></i>
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

<!-- Image Modal Script -->
<script>
    function openImageModal(imageSrc, imageAlt) {
        // Create modal overlay
        const modal = document.createElement('div');
        modal.className = 'fixed inset-0 bg-black/90 flex items-center justify-center z-50 p-4';
        modal.style.backdropFilter = 'blur(4px)';
        
        // Create modal content
        modal.innerHTML = `
            <div class="relative max-w-7xl max-h-full w-full h-full flex items-center justify-center">
                <img src="${imageSrc}" 
                     alt="${imageAlt}" 
                     class="max-w-full max-h-full object-contain rounded-lg shadow-2xl"
                     style="max-height: 90vh; max-width: 90vw;">
                
                <!-- Close button -->
                <button class="absolute top-4 right-4 text-white text-3xl hover:text-gray-300 transition-colors bg-black/50 rounded-full w-12 h-12 flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>
                
                <!-- Image info -->
                <div class="absolute bottom-4 left-4 bg-black/50 text-white px-4 py-2 rounded-lg">
                    <p class="text-sm">${imageAlt}</p>
                </div>
            </div>
        `;
        
        // Add to body
        document.body.appendChild(modal);
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
        
        // Close modal function
        function closeModal() {
            document.body.removeChild(modal);
            document.body.style.overflow = 'auto'; // Restore scrolling
        }
        
        // Close on overlay click
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
        
        // Close on button click
        modal.querySelector('button').addEventListener('click', closeModal);
        
        // Close on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {w
                closeModal();
            }
        });
        
        // Add fade-in animation
        modal.style.opacity = '0';
        modal.style.transition = 'opacity 0.3s ease';
        setTimeout(() => {
            modal.style.opacity = '1';
        }, 10);
    }
</script>
@endsection
