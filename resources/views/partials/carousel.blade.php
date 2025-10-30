<div class="relative">
    <style>
        #products-swiper .swiper-button-next,
        #products-swiper .swiper-button-prev {
            background: rgba(71, 80, 72, 0.95);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            color: var(--color-creamDark) !important;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 2px solid var(--color-accent);
        }
        #products-swiper .swiper-button-next:hover,
        #products-swiper .swiper-button-prev:hover {
            background: var(--color-accent);
            transform: scale(1.15);
            box-shadow: 0 6px 20px rgba(189, 144, 111, 0.6);
        }
        #products-swiper .swiper-button-next:after,
        #products-swiper .swiper-button-prev:after {
            font-size: 22px;
            font-weight: bold;
        }
        #products-swiper .swiper-button-next {
            right: 10px;
        }
        #products-swiper .swiper-button-prev {
            left: 10px;
        }
        #products-swiper .swiper-button-next.swiper-button-disabled,
        #products-swiper .swiper-button-prev.swiper-button-disabled {
            opacity: 0.3;
        }
    </style>
    <div class="swiper group" id="products-swiper">
        <div class="swiper-wrapper">
            @foreach(($products ?? []) as $product)
                <div class="swiper-slide">
                    <!-- <a href="{{ route('products.show', $product) }}" class="block"> -->
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-[400px] object-fit rounded-xl shadow" />
                        @else
                            <div class="w-full h-[400px] bg-[color:var(--color-primary)]/30 rounded-xl flex items-center justify-center">
                                <i class="fas fa-image text-3xl text-[color:var(--color-secondaryDark)]"></i>
                            </div>
                        @endif
                        
                    <!-- </a> -->
                </div>
            @endforeach
        </div>

        <div class="swiper-button-next !hidden md:!flex"></div>
        <div class="swiper-button-prev !hidden md:!flex"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>

<script>
    (function(){
        const container = document.getElementById('products-swiper');
        if (!container) return;
        
        const initSwiper = function() {
            if (container.swiper) return; // Already initialized
            
            if (typeof Swiper === 'undefined') {
                setTimeout(initSwiper, 100);
                return;
            }
            
            const productCount = {{ count($products ?? []) }};
            
            new Swiper('#products-swiper', {
                loop: true,
                loopedSlides: productCount > 3 ? Math.ceil(productCount / 3) * 3 : productCount,
                speed: 600,
                spaceBetween: 20,
                slidesPerView: 1,
                slidesPerGroup: 1,
                autoplay: { 
                    delay: 3000, 
                    disableOnInteraction: false,
                    pauseOnMouseEnter: true
                },
                breakpoints: {
                    640: { 
                        slidesPerView: 2, 
                        slidesPerGroup: 2,
                        spaceBetween: 20
                    },
                    1024: { 
                        slidesPerView: 3, 
                        slidesPerGroup: 3,
                        spaceBetween: 20
                    },
                },
                navigation: { 
                    nextEl: container.querySelector('.swiper-button-next'), 
                    prevEl: container.querySelector('.swiper-button-prev') 
                },
                pagination: { 
                    el: container.querySelector('.swiper-pagination'), 
                    clickable: true,
                    dynamicBullets: true
                },
                grabCursor: true,
            });
        };
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initSwiper);
        } else {
            setTimeout(initSwiper, 50);
        }
        
        // Fallback: try after window load
        window.addEventListener('load', function() {
            if (!container.swiper && typeof Swiper !== 'undefined') {
                initSwiper();
            }
        });
    })();
</script>
