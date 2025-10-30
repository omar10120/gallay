@extends('layouts.app')

@section('title', 'FastMenu - Beautiful Images Gallery')

@section('content')
<div id="gallery" class="py-12">
    @include('partials.categories', ['categories' => $categories ?? []])
    <div class="h-6"></div>
    @if($products->count() > 0)
        @include('partials.carousel', ['products' => $products])
        <div class="h-8"></div>
    @endif
   

    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="rounded-2xl border-2" style="border-color: var(--color-accent); background: rgba(0,0,0,0.06);">
                    <div class="relative m-2 rounded-xl overflow-hidden" style="background: rgba(0,0,0,0.08);">
                        <!-- <a href="{{ route('products.show', $product) }}" class="block"> -->
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-[460px] object-cover" />
                            @else
                                <div class="w-full h-[460px] bg-[color:var(--color-primary)]/30 flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-[color:var(--color-secondaryDark)]"></i>
                                </div>
                            @endif
                        <!-- </a> -->

                        <div class="absolute left-4 -bottom-6 flex items-center gap-4">
                            <a href="tel:#" class="w-12 h-12 rounded-full bg-white shadow flex items-center justify-center text-[color:var(--color-primaryDark)] hover:scale-105 transition">
                                <i class="fa-solid fa-phone"></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-white shadow flex items-center justify-center text-green-600 hover:scale-105 transition">
                                <i class="fa-brands fa-whatsapp"></i>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-white shadow flex items-center justify-center text-[color:var(--color-primaryDark)] hover:scale-105 transition">
                                <i class="fa-regular fa-share-from-square"></i>
                            </a>
                        </div>
                    </div>

                    <div class="px-4 pb-4 ">
                        <div class="rounded-lg mb-2 flex justify-around items-center h-full p-2" style="background-color: var(--color-primaryDark);">
                            <div class="  text-[color:var(--color-creamDark)] font-semibold flex items-center">
                                <div class="uppercase tracking-wide">{{ number_format($product->price, 0) }} AED</div>
                                <div class="opacity-90 text-sm">&nbsp;</div>
                            </div>
                             <div class=" text-[color:var(--color-creamDark)] font-semibol flex items-center">
                                    <div class="uppercase tracking-wide">{{ $product->name }}</div>
                                    <div class="opacity-90 text-sm">&nbsp;</div>
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
        <div class="text-center py-16">
            <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-images text-gray-400 text-2xl sm:text-3xl"></i>
            </div>
            <h3 class="text-lg sm:text-xl font-semibold text-gray-800 mb-2">No Images Yet</h3>
            <p class="text-gray-600 mb-6 text-sm sm:text-base">Check back soon for our beautiful image collection!</p>
        
        </div>
    @endif
</div>

@endsection
