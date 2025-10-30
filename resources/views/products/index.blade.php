@extends('layouts.app')

@section('title', 'FastMenu - Beautiful Images Gallery')

@section('content')
<div id="gallery" class="py-12">
    @include('partials.categories', ['categories' => $categories ?? []])
    <div class="h-6"></div>
    @if(isset($sliderProducts) && $sliderProducts->count() > 0)
        @include('partials.carousel', ['products' => $sliderProducts])
        <div class="h-6"></div>
    @endif
   

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="" style=" ">
                    <div class="relative group m-2 rounded-xl overflow-hidden" style="background: rgba(0,0,0,0.08);">
                        <!-- <a href="{{ route('products.show', $product) }}" class="block"> -->
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-[520px] object-fit" />
                            @else
                                <div class="w-full h-[460px] bg-[color:var(--color-primary)]/30 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-[color:var(--color-secondaryDark)]"></i>
                                </div>
                            @endif
                        <!-- </a> -->

                        <div class="absolute inset-0 bg-black/30 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300 flex items-center gap-3">
                            <a href="tel:#" class="w-11 h-11 rounded-full bg-white/90 backdrop-blur ring-2 ring-[color:var(--color-accent)]/50 shadow flex items-center justify-center text-[color:var(--color-primaryDark)] hover:scale-105 transition">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                            <a href="https://wa.me/+8613610009048" target="_blank" class="w-11 h-11 rounded-full bg-white/90 backdrop-blur ring-2 ring-[color:var(--color-accent)]/50 shadow flex items-center justify-center text-green-600 hover:scale-105 transition">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="#" class="w-11 h-11 rounded-full bg-white/90 backdrop-blur ring-2 ring-[color:var(--color-accent)]/50 shadow flex items-center justify-center text-[color:var(--color-primaryDark)] hover:scale-105 transition">
                                <i class="fa-regular fa-share-from-square"></i>
                            </a>
                        </div>
                    </div>

                    <div class="px-4 pb-4 ">
                      <div class="flex justify-between items-cente gap-2 bg-[color:var(--color-primaryDark)] rounded-lg p-2">
                        <div class="text-xs sm:text-sm text-[color:var(--color-creamDark)]  w-2/3 overflow-hidden text-ellipsis whitespace-nowrap">
                            {{ $product->name }}
                        </div>
                        <div class="text-xs sm:text-sm text-[color:var(--color-creamDark)]">
                            {{ number_format($product->price, 0) }} AED
                        </div>
                      </div>
                      
                        
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
        <div class="text-center py-16 text-[color:var(--color-creamDark)]">
            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-[color:var(--color-primary)] rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-images text-[color:var(--color-creamDark)] text-2xl sm:text-3xl"></i>
            </div>
            <h3 class="text-lg sm:text-xl font-semibold text-[color:var(--color-creamDark)] mb-2">{{ __('common.noImagesYet') }}</h3>
            <p class="text-[color:var(--color-creamDark)] mb-6 text-xs sm:text-sm">{{ __('common.checkBackSoon') }}</p>
        
        </div>
    @endif
</div>

@endsection
