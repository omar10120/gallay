@php
    $defaultCategories = ['All'];
    $list = isset($categories) && is_array($categories) && count($categories) ? array_merge($defaultCategories, $categories) : $defaultCategories;
    $active = request('category', 'All');
    $slugify = function($text){
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $text)));
    };
@endphp

<div class="w-full overflow-hidden">
    <div class="flex md:flex-wrap gap-2 sm:gap-3 items-center overflow-x-auto scrollbar-hide px-2 md:px-0 md:justify-center pb-2 md:pb-0">
        @foreach($list as $cat)
            @php($isActive = ($cat === 'All' && ($active==='All' || !$active)) || ($slugify($cat) === strtolower($active)))
            @php($param = $cat === 'All' ? null : $slugify($cat))
            <a href="{{ $param ? url()->current() . '?category=' . $param : url()->current() }}"
               class="relative px-3 sm:px-4 py-1.5 sm:py-2 rounded-lg border font-medium transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:ring-2 hover:ring-[color:var(--color-accent)]/80 backdrop-blur-sm whitespace-nowrap flex-shrink-0"
               style="
                    border-color: var(--color-accent);
                    color: {{ $isActive ? 'var(--color-creamDark)' : 'var(--color-creamDark)' }};
                    background: {{ $isActive ? 'var(--color-accent)' : 'rgba(0,0,0,0.08)' }};
                    box-shadow: {{ $isActive ? '0 4px 12px rgba(189, 144, 111, 0.3)' : 'none' }};
               "
            >
                {{ $cat }}
            </a>
        @endforeach
    </div>
</div>
<style>
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
</style>

