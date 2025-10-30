@extends('layouts.app')

@section('title', $product->name . ' - FastMenu')

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
                <div class="relative group cursor-pointer" onclick="openImageModal('{{ asset('storage/' . $product->image) }}', '{{ $product->name }}')">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="w-full h-96 object-fit rounded-xl shadow-lg">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all duration-300 rounded-xl flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <i class="fas fa-expand text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            @else
                <div class="w-full h-96 bg-gradient-to-br from-gray-200 to-gray-300 rounded-xl shadow-lg flex items-center justify-center">
                    <i class="fas fa-image text-gray-400 text-6xl"></i>
                </div>
            @endif

            <!-- Additional Images -->
            @if($product->images && count($product->images) > 0)
                <div class="relative">
                    <!-- Gallery Navigation Buttons -->
                    <button id="galleryPrevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-2 bg-white shadow-lg rounded-full w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-300 z-10">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    
                    <button id="galleryNextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-2 bg-white shadow-lg rounded-full w-8 h-8 flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-300 z-10">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </button>
                    
                    <!-- Gallery Slider Track -->
                    <div class="overflow-hidden">
                        <div id="gallerySliderTrack" class="flex transition-transform duration-500 ease-in-out">
                            @foreach($product->images as $image)
                                <div class="flex-shrink-0 w-1/3 px-1">
                                    <div class="relative group cursor-pointer" onclick="openImageModal('{{ asset('storage/' . $image) }}', '{{ $product->name }}')">
                                        <img src="{{ asset('storage/' . $image) }}" 
                                             alt="{{ $product->name }}" 
                                             class="w-full h-24 object-fit rounded-lg shadow-md">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 rounded-lg flex items-center justify-center">
                                            <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                                <i class="fas fa-expand text-white text-lg"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <!-- Gallery Dots Indicator -->
                    <div class="flex justify-center mt-3 space-x-1">
                        @for($i = 0; $i < ceil(count($product->images) / 3); $i++)
                            <button class="gallery-slider-dot w-2 h-2 rounded-full {{ $i === 0 ? 'bg-blue-600' : 'bg-gray-300' }} transition-colors duration-300" 
                                    data-gallery-slide="{{ $i }}"></button>
                        @endfor
                    </div>
                </div>
            @endif
        </div>

        <!-- Product Information -->
        <div class="space-y-6">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                <div class="flex flex-col sm:flex-row sm:items-center space-y-2 sm:space-y-0 sm:space-x-4 mb-6">
                    <span class="text-xl sm:text-2xl lg:text-3xl font-bold text-green-600">AED{{ number_format($product->price, 2) }}</span>
                    <div class="flex items-center text-gray-600 text-sm sm:text-base">
                        <i class="fas fa-images mr-2"></i>
                        <span>{{ count($product->images ?? []) + ($product->image ? 1 : 0) }} image(s)</span>
                    </div>
                </div>
            </div>

            <!-- Image Details -->
            <!-- <div class="bg-gray-50 rounded-xl p-6">
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
            </div> -->

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
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm sm:text-base">
                    <i class="fas fa-arrow-left mr-2"></i>Back to Gallery
                </a>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    @if($relatedProducts->count() > 0)
        <div class="mt-16">
            <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-800 mb-8">More Images</h2>
            
            <!-- Slider Container -->
            <div class="relative">
                <!-- Navigation Buttons -->
                <button id="prevBtn" class="absolute left-0 top-1/2 transform -translate-y-1/2 -translate-x-4 bg-white shadow-lg rounded-full w-12 h-12 flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-300 z-10">
                    <i class="fas fa-chevron-left"></i>
                </button>
                
                <button id="nextBtn" class="absolute right-0 top-1/2 transform -translate-y-1/2 translate-x-4 bg-white shadow-lg rounded-full w-12 h-12 flex items-center justify-center text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-all duration-300 z-10">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <!-- Slider Track -->
                <div class="overflow-hidden">
                    <div id="sliderTrack" class="flex transition-transform duration-500 ease-in-out">
                        @foreach($relatedProducts as $relatedProduct)
                            <div class="flex-shrink-0 w-full sm:w-1/2 lg:w-1/3 px-3">
                                <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
                                    <div class="relative">
                                        @if($relatedProduct->image)
                                            <img src="{{ asset('storage/' . $relatedProduct->image) }}" 
                                                 alt="{{ $relatedProduct->name }}" 
                                                 class="w-full h-48 object-fit cursor-pointer"
                                                 onclick="openImageModal('{{ asset('storage/' . $relatedProduct->image) }}', '{{ $relatedProduct->name }}')">
                                        @else
                                            <div class="w-full h-48 bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center">
                                                <i class="fas fa-image text-gray-400 text-2xl"></i>
                                            </div>
                                        @endif
                                        
                                        <div class="absolute bottom-3 left-3 bg-white/90 backdrop-blur-sm text-gray-800 px-3 py-1 rounded-full text-sm font-semibold">
                                            AED{{ number_format($relatedProduct->price, 2) }}
                                        </div>
                                    </div>
                                    
                                    <div class="p-3 sm:p-4">
                                        <h3 class="font-semibold text-gray-800 mb-2 text-xs sm:text-sm">{{ $relatedProduct->name }}</h3>
                                        <a href="{{ route('products.show', $relatedProduct) }}" 
                                           class="text-blue-600 hover:text-blue-800 text-xs sm:text-sm font-medium">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Dots Indicator -->
                <div class="flex justify-center mt-6 space-x-2">
                    @for($i = 0; $i < ceil($relatedProducts->count() / 3); $i++)
                        <button class="slider-dot w-3 h-3 rounded-full {{ $i === 0 ? 'bg-blue-600' : 'bg-gray-300' }} transition-colors duration-300" 
                                data-slide="{{ $i }}"></button>
                    @endfor
                </div>
            </div>
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
            if (e.key === 'Escape') {
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

    // Related Products Slider
    document.addEventListener('DOMContentLoaded', function() {
        const sliderTrack = document.getElementById('sliderTrack');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const dots = document.querySelectorAll('.slider-dot');
        
        if (!sliderTrack || !prevBtn || !nextBtn) return;
        
        let currentSlide = 0;
        const totalSlides = Math.ceil({{ $relatedProducts->count() }} / 3);
        const slideWidth = 100; // Percentage
        
        function updateSlider() {
            const translateX = -currentSlide * slideWidth;
            sliderTrack.style.transform = `translateX(${translateX}%)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('bg-blue-600', index === currentSlide);
                dot.classList.toggle('bg-gray-300', index !== currentSlide);
            });
            
            // Update button states
            prevBtn.style.opacity = currentSlide === 0 ? '0.5' : '1';
            nextBtn.style.opacity = currentSlide === totalSlides - 1 ? '0.5' : '1';
        }
        
        // Previous button
        prevBtn.addEventListener('click', function() {
            if (currentSlide > 0) {
                currentSlide--;
                updateSlider();
            }
        });
        
        // Next button
        nextBtn.addEventListener('click', function() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
                updateSlider();
            }
        });
        
        // Dot navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                currentSlide = index;
                updateSlider();
            });
        });
        
        // Initialize slider
        updateSlider();
        
        // Auto-play (optional)
        setInterval(function() {
            if (currentSlide < totalSlides - 1) {
                currentSlide++;
            } else {
                currentSlide = 0;
            }
            updateSlider();
        }, 5000); // Change slide every 5 seconds
    });

    // Gallery Images Slider
    document.addEventListener('DOMContentLoaded', function() {
        const gallerySliderTrack = document.getElementById('gallerySliderTrack');
        const galleryPrevBtn = document.getElementById('galleryPrevBtn');
        const galleryNextBtn = document.getElementById('galleryNextBtn');
        const galleryDots = document.querySelectorAll('.gallery-slider-dot');
        
        if (!gallerySliderTrack || !galleryPrevBtn || !galleryNextBtn) return;
        
        let currentGallerySlide = 0;
        const totalGalleryImages = {{ count($product->images ?? []) }};
        const totalGallerySlides = Math.ceil(totalGalleryImages / 3);
        const gallerySlideWidth = 100; // Percentage
        
        function updateGallerySlider() {
            const translateX = -currentGallerySlide * gallerySlideWidth;
            gallerySliderTrack.style.transform = `translateX(${translateX}%)`;
            
            // Update gallery dots
            galleryDots.forEach((dot, index) => {
                dot.classList.toggle('bg-blue-600', index === currentGallerySlide);
                dot.classList.toggle('bg-gray-300', index !== currentGallerySlide);
            });
            
            // Update gallery button states
            galleryPrevBtn.style.opacity = currentGallerySlide === 0 ? '0.5' : '1';
            galleryNextBtn.style.opacity = currentGallerySlide === totalGallerySlides - 1 ? '0.5' : '1';
        }
        
        // Gallery Previous button
        galleryPrevBtn.addEventListener('click', function() {
            if (currentGallerySlide > 0) {
                currentGallerySlide--;
                updateGallerySlider();
            }
        });
        
        // Gallery Next button
        galleryNextBtn.addEventListener('click', function() {
            if (currentGallerySlide < totalGallerySlides - 1) {
                currentGallerySlide++;
                updateGallerySlider();
            }
        });
        
        // Gallery Dot navigation
        galleryDots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                currentGallerySlide = index;
                updateGallerySlider();
            });
        });
        
        // Initialize gallery slider
        updateGallerySlider();
    });
</script>
@endsection
